<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\GroupmemberModel;
use App\Models\UserdetailsModel;
use App\Models\Thrifttwowin;
use App\Models\Thrifttwowinmember;
use App\Models\Thrifttwowinreferralamount;
use App\Models\Settings;
use App\Models\EmailTemplate;
use CodeIgniter\HTTP\Response;
use CodeIgniter\HTTP\ResponseInterface;

use Exception;
use ReflectionException;
use CodeIgniter\Events\Events;
use DateTime;



class ThriftController extends BaseController
{
    /**
     * This will return details of a single thrift
     * @Params thrift id
     * @return Response
     */


    public function singleThriftInfo($id)
    {
        $this->thriftCompleteCheck();

        $nbuilder = $this->db->table('thrift_two_win tw');
        $nbuilder->join('users u', 'tw.created_member = u.id');
        $nbuilder->select('tw.*, u.first_name, u.last_name, u.email, u.user_profile_image, u.user_gender');
        $nbuilder->where('tw.id', $id);
        $query = $nbuilder->get();
        $thrift_group = $query->getrow();

        if ($thrift_group) {
            // For now it's fixed, 
            $thrift_group->interest_rate = 5;
         

            if($thrift_group->thrift_group_open == 1){
                $start_date =  new DateTime($thrift_group->thrift_group_start_date);
                $start_date_timestamp = $start_date->getTimestamp();
                if(time()>$start_date_timestamp){
                    $end_date =  new DateTime($thrift_group->thrift_group_end_date);
                    $end_date_timestamp = $end_date->getTimestamp();                    
                    $thrift_group->status='Ongoing';
                    $thrift_group->expire_remaining_time=$end_date_timestamp-time();
                }else{
                    $thrift_group->status='Pending';
                    $thrift_group->start_remaining_time=$start_date_timestamp-time();
                }

            }else{
                $thrift_group->status='Completed';
                //GET THE WINNER DETAILS
                $winner = $this->getThriftWinner($thrift_group->id);
                if($winner){
                    $thrift_group->winner = $winner;
                }
              }

            $tbuilder = $this->db->table('thrift_two_win_member');
            $tbuilder->select('users.id,users.first_name,users.last_name,users.phone, users.user_profile_image, users.user_gender');
            $tbuilder->join('users', 'thrift_two_win_member.thrift_group_member_id = users.id');
            $tbuilder->where('thrift_two_win_member.thrift_group_id', $id);
            $query = $tbuilder->get();
            $allMember = $query->getResultArray();
            $thrift_group->members = $allMember;

            $thrift_group->potential_winnings = 0.00;
            
            if($allMember){
                $total_thrift_members = count($allMember);
                $amount_total = $total_thrift_members *  $thrift_group->thrift_group_product_price * ($thrift_group->interest_rate / 100) * ($thrift_group->thrift_group_term_duration/12); 
                $thrift_group->potential_winnings = round($amount_total,2 );
            }  

            //Check if user alredy joined thrift
            $tbuilder = $this->db->table('thrift_two_win_member');
            $tbuilder->where('thrift_two_win_member.thrift_group_id', $id);
            $tbuilder->where('thrift_two_win_member.thrift_group_member_id', CURRENT_USER['id']);
            $query = $tbuilder->get();
            $isMember = $query->getResultArray();
            if(is_array($isMember) && count($isMember)){
                $thrift_group->joined = true;
            }else{
                $thrift_group->joined = false;
            }

            $sucess = $this->generateSuccess(lang('Thrift.single_thrift_info'), $thrift_group);
            return $this
                ->getResponse(
                    $sucess
                );
        } else {
            $error = $this->generateError(lang('Thrift.thrift_not_found'));
            return $this
                ->getResponse(
                    $error,
                    ResponseInterface::HTTP_OK
                );
        }
    }

    /**
     * This will create a thrift for logged in user
     * Bearer Token required
     * @return Response
     */

    public function createThrift()
    {

        if (!defined('CURRENT_USER')) {
            $error = $this->generateError(lang('Thrift.user_not_login'));
            return $this
                ->getResponse(
                    $error,
                    ResponseInterface::HTTP_OK
                );
        }

        $input = $this->getRequestInput($this->request);
        $rules = [
            'thrift_name' => 'required',
            'amount_to_thift' => 'required|numeric',
            'duration' => 'required|integer',
            'start_date' => 'required|valid_date[Y-m-d]',
            'end_date' => 'required|valid_date[Y-m-d]',
        ];

        if (!$this->validateRequest($input, $rules)) {
            $error = $this->generateError($this->validator->getErrors());
            return $this
                ->getResponse(
                    $error,
                    ResponseInterface::HTTP_OK
                );
        }


        $time = strtotime($input['start_date']);
        $input['end_date'] = date("Y-m-d", strtotime("+" . $input['duration'] . " month", $time));

        $thrifttwowin = new Thrifttwowin();
        $ins_data['thrift_group_number'] = $this->generateThriftGroupNumber();
        $ins_data['thrift_group_product_price'] = $input['amount_to_thift'];
        $ins_data['thrift_group_term_duration'] = $input['duration'];
        $ins_data['created_member'] = CURRENT_USER['id'];
        $ins_data['thrift_group_member_count'] = 0;
        $ins_data['thrift_name'] = $input['thrift_name'];
        $ins_data['thrift_description'] = (isset($input['description']) ? $input['description'] : '');
        $ins_data['thrift_group_open'] = 1;
        $ins_data['thrift_group_creation_date'] = date('Y-m-d H:i:s');
        $ins_data['thrift_group_start_date'] =  $input['start_date'];
        $ins_data['thrift_group_end_date'] =  $input['end_date'];

        if ($thrifttwowin->insert($ins_data)) {
            $id = $thrifttwowin->getInsertID();
            $ins_data['id'] = $id;
            $sucess = $this->generateSuccess(lang('Thrift.thrift_create_success'), $ins_data);
            return $this
                ->getResponse(
                    $sucess
                );
        } else {

            $error = $this->generateError(lang('Thrift.thrift_create_error'));
            return $this
                ->getResponse(
                    $error,
                    ResponseInterface::HTTP_OK
                );
        }
    }


    /**
     * Join a thrift
     * Must provide id of the thrift
     * @return Response
     */

    public function joinThrift()
    {
        
        $input = $this->getRequestInput($this->request);
        $rules = [
            'thrift_id' => 'required|numeric',
        ];

        if (!$this->validateRequest($input, $rules)) {
            $error = $this->generateError($this->validator->getErrors());
            return $this
                ->getResponse(
                    $error,
                    ResponseInterface::HTTP_OK
                );
        }
        
        $thrift_group_id =   $input['thrift_id'];
        $thrift_group_member_count = 0;

        $nbuilder = $this->db->table('thrift_two_win');
        $nbuilder->where('id', $thrift_group_id);
        $query = $nbuilder->get();
        $thrift_group = $query->getrow();

        if ($thrift_group) {
            /*
            * 
            * Thrift date is over
            *
            */

            if (date('Y-m-d') > $thrift_group->thrift_group_end_date) {
                $error = $this->generateError(lang('Thrift.thrift_date_end'));
                return $this
                    ->getResponse(
                        $error,
                        ResponseInterface::HTTP_OK
                    );
            }

            if (is_numeric($thrift_group->thrift_group_member_count)) {
                $thrift_group_member_count = $thrift_group->thrift_group_member_count;
            }
        } else {

            /*
             *
             * Thrift not found
             *
             */

            $error = $this->generateError(lang('Thrift.thrift_not_found'));
            return $this
                ->getResponse(
                    $error,
                    ResponseInterface::HTTP_OK
                );
        }


        $tbuilder = $this->db->table('thrift_two_win_member');
        $tbuilder->where('thrift_group_id', $thrift_group_id);
        $tbuilder->where('thrift_group_member_id', CURRENT_USER['id']);
        $query = $tbuilder->get();
        $check_thrift_group = $query->getrow();


        if ($check_thrift_group) {
            $error = $this->generateError(lang('Thrift.already_joined_thrift'));
            return $this
                ->getResponse(
                    $error,
                    ResponseInterface::HTTP_OK
                );
        }

        if ($thrift_group->thrift_group_open == 1) {

            /*insert in pg_thrift_group_members */
            $ins_data['thrift_group_id'] = $thrift_group_id;
            $ins_data['thrift_group_member_id'] = CURRENT_USER['id'];
            $ins_data['thrift_group_member_number'] = $thrift_group_member_count + 1;
            $ins_data['thrift_group_member_join_date'] = time();

            /*
             * here a thrift group is complete
             * should be true only once
             *
             * update pg_thrift_group
             */

            $upd_data['thrift_group_member_count'] = $thrift_group_member_count + 1;

            $inserted = false;
            $id = false;

            $pgthriftgroupmember = new Thrifttwowinmember();
            $pgthriftgroupmember->insert($ins_data);
            $id = $pgthriftgroupmember->getInsertID();


            if ($id) {
                $model = new Thrifttwowin();
                $model->where('id', $thrift_group_id)->set($upd_data)->update();
            }

            $this->addReferralBonus($thrift_group);
            $this->checkInvitation($thrift_group_id);

            $sucess = $this->generateSuccess(lang('Thrift.thrift_join_sucess'), $thrift_group);
            return $this
                ->getResponse(
                    $sucess
                );
        } else {
            $error = $this->generateError(lang('Thrift.thrift_close'));
            return $this
                ->getResponse(
                    $error,
                    ResponseInterface::HTTP_OK
                );
        }
    }


    public function addReferralBonus($thrift_group){
       
        $referral_amount_model= new Thrifttwowinreferralamount();


        if(CURRENT_USER['referred_by']>0){
            $setting_model = new Settings();
            $get_referral_setting= $setting_model->where('settings_key','referral_setting')->first();
            $referral_setting = json_decode($get_referral_setting['settings_value'],true);
            if($referral_setting['referral_enabled']=='yes'){
            $amount = ($thrift_group->thrift_group_product_price * $referral_setting['referral_percentage'])/100;

            $data_insert['user_id']= CURRENT_USER['referred_by'];
            $data_insert['referral_amount']=round($amount,2);
            $data_insert['purpose']='Referral bonus-userid: '.CURRENT_USER['id'];
        
            $referral_amount_model->save($data_insert);
            }
        }

    }

    public function checkInvitation($thrift_group){
        $email= CURRENT_USER['email'];
        $builder = $this->db->table('thrift_two_win_invited_member');

        $builder->set('is_join',1)
        ->where('invited_email',$email)
        ->where('thrift_id', $thrift_group);

        $builder->update();

    }    


    /**
     * List Thrifts I have joined or created
     * @return Response
     */


    public function listThrifts()
    {
        $data = [];
        $builder = $this->db->table('thrift_two_win_member t1');
        $builder->select('t2.*, t1.thrift_group_id, t1.thrift_group_member_join_date, CONCAT(t3.first_name, " ", t3.last_name) AS created_member_name, t3.user_profile_image as created_member_avatar');
        $builder->join('thrift_two_win t2', 't1.thrift_group_id = t2.id');
        $builder->join('users t3', 't2.created_member = t3.id');
        $builder->where('t1.thrift_group_member_id', CURRENT_USER['id']);
        $query = $builder->get();
        $results = $query->getResultArray();


        $otherGroup = [];
        $joined_ids = array_column($results, 'thrift_group_id');

        $others = $this->db->table('thrift_two_win t2');
        $others->select('t2.*, CONCAT(t3.first_name, " ", t3.last_name) AS created_member_name, t3.user_profile_image as created_member_avatar');
        $others->join('users t3', 't2.created_member = t3.id');

        if (count($results) > 0) {
            $others->whereNotIn('t2.id', $joined_ids);
        }
        $others = $others->get();
        $otherGroup = $others->getResultArray();
        $data['joined'] = $results;
        $data['others'] = $otherGroup;






        $sucess = $this->generateSuccess(lang('Thrift.all_thrift'), $data);
        return $this->getResponse($sucess);
    }

    /**
     * Internal use
     * Generate unique thrift group number
     */

    public function generateThriftGroupNumber()
    {

        $nbuilder = $this->db->table('thrift_two_win');
        $nbuilder->select('id');
        $nbuilder->limit(1);
        $nbuilder->orderBy('id', 'desc');
        $query = $nbuilder->get();
        $result = $query->getRow();

        $nid = 1;
        if ($result) {
            $nid = $result->id + 1;
        }
        $addZero = 5 - strlen($nid);
        $str = '';
        for ($i = 0; $i < $addZero; $i++) {
            $str .= 0;
        }
        $str = 'T2W' . $str . '' . $nid;
        return $str;
    }


    /**
     * Send invitations for a thrift
     * Emails are sent as comma sepearted.
     * Script adds all invitations in mail queue
     * Queue is processed via Cron Controller
     * @return Response
     */

    public function sendThriftInvitations()
    {
        if (!defined('CURRENT_USER')) {
            $error = $this->generateError(lang('Thrift.user_not_login'));
            return $this
                ->getResponse(
                    $error,
                    ResponseInterface::HTTP_OK
                );
        }
        $input = $this->getRequestInput($this->request);
 
        $rules = [
            'send_invitation_emails' => 'required',
            'thrift_id'=> 'required|numeric'
        ];

        if (!$this->validateRequest($input, $rules)) {
            return $this
                ->getResponse(
                    ['error' => $this->validator->getErrors()],
                    ResponseInterface::HTTP_OK
                );
        }
        $id = $input['thrift_id']; 
        
        $emails =  $input['send_invitation_emails'];
 
        $totalEmail =  count($emails);
        $invalidEmailFormat = 0;
        $alreadySent = 0;
        $mailSent = 0;
        foreach ($emails as $email) {
            $email = trim($email);
            $regex = '/^[_a-z0-9-+]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
            //if (preg_match($regex, $email)) {
                //FOR LATER USE
                $builder = $this->db->table('thrift_two_win_invited_member');
                $builder->where('invited_email', $email);
                $builder->where('thrift_id', $id);
                $query = $builder->get();
                $emailExit = $query->getRow();
                if ($emailExit == null) {
                    $data = [
                        'invited_by_user' => CURRENT_USER['id'],
                        'thrift_id' => $id,
                        'invited_email' => $email,
                        'invited_date' => date('Y-m-d H:i:s')
                    ];
                    
                    $in_builder = $this->db->table('thrift_two_win_invited_member');
                    $in_builder->insert($data);
                    $mailSent =   $mailSent + 1;
                    } 
                // else {
                //     $alreadySent = $alreadySent + 1;
                // }
            //} else {
               // $invalidEmailFormat = $invalidEmailFormat + 1;
            //}
        }
        if ($mailSent != 0) {
            $data = [
                'sent' => $mailSent,
                //'alreadysent' => $alreadySent,
                //'invaildFormat' => $invalidEmailFormat
            ];
            $sucess = $this->generateSuccess(lang('Thrift.thrift_invitation_sucess', [$mailSent]), $data);
            return $this
                ->getResponse(
                    $sucess
                );
        } else {
            $error = $this->generateError(lang('Thrift.thrift_invitation_error'));
            return $this
                ->getResponse(
                    $error,
                    ResponseInterface::HTTP_OK
                );
        }
    }


    /**
     * List all users currently logged in users created thrifts and invited users
     * @return Response
     */

    public function currentUserlistThrifts()
    {

        $builder = $this->db->table('thrift_two_win');
        $builder->select('id,thrift_group_number,thrift_name,thrift_description');
        $builder->where('created_member', CURRENT_USER['id']);
        $query = $builder->get();
        $results = $query->getResultArray();



        if (count($results) > 0) {

            for ($i = 0; $i < count($results); $i++) {
                $builder = $this->db->table('thrift_two_win_invited_member');
                $builder->select('id,invited_email,status');
                $builder->where('invited_by_user', CURRENT_USER['id']);
                $builder->where('thrift_id',  $results[$i]['id']);
                $query = $builder->get();
                $results[$i]['members'] = $query->getResultArray();
            }
        } else {
            $error = $this->generateError(lang('Thrift.thrift_not_found'));
            return $this
                ->getResponse(
                    $error,
                    ResponseInterface::HTTP_OK
                );
        }
        $sucess = $this->generateSuccess(lang('Thrift.all_thrift'), $results);
        return $this
            ->getResponse(
                $sucess
            );
    }


    /**
     * List all users currently logged in users have invited for thrifts
     * It gives Paginated data, 10 each time.
     * @return Response
     */

    public function invitedUser($th_id, $page = 0)
    {

        if (!defined('CURRENT_USER')) {
            $error = $this->generateError(lang('Thrift.user_not_login'));
            return $this
                ->getResponse(
                    $error,
                    ResponseInterface::HTTP_OK
                );
        }
        $limit = 10;
        $start = $page *  $limit;

        $nbuilder = $this->db->table('thrift_two_win_invited_member');
        $nbuilder->select('thrift_two_win_invited_member.invited_email,thrift_two_win_invited_member.is_join,
        thrift_two_win_invited_member.is_join,thrift_two_win_invited_member.created_at,
        thrift_two_win.thrift_group_number,thrift_two_win.thrift_group_start_date,
        thrift_two_win.thrift_name,thrift_two_win.id as thrift_id');
        $nbuilder->join('thrift_two_win', 'thrift_two_win_invited_member.thrift_id = thrift_two_win.id');
        $nbuilder->where('thrift_two_win_invited_member.invited_by_user', CURRENT_USER['id']);
        $nbuilder->where('thrift_two_win_invited_member.thrift_id', $th_id);
        $nbuilder->limit($limit, $start);
        $query = $nbuilder->get();
        $members = $query->getResultArray();


        if (!empty($members)) {
            $allMember = [];

            foreach ($members as $mem) {
                if ($mem['thrift_group_start_date'] < date('Y-m-d H:i:s') && $mem['is_join'] == 0) {
                    $datetime1 = new DateTime();
                    $datetime2 = new DateTime($mem['thrift_group_start_date']);
                    $interval = $datetime1->diff($datetime2);

                    $dy = $interval->format('%a');
                    $hr = $interval->format('%h');
                    if ($hr != 0) {
                        $elapsed = $interval->format('%h hours %i minutes');
                    }
                    if ($dy != 0) {
                        $elapsed = $interval->format('%a days');
                    }

                    $mem['thrift_expired'] =  $elapsed;
                    $mem['status'] = 'expired';
                }

                if ($mem['is_join'] == 1) {
                    $mem['status'] = 'Joined';
                }
                if ($mem['is_join'] == 2) {
                    $mem['status'] = 'Declined';
                }
                $allMember[] = $mem;
            }

            $sucess = $this->generateSuccess(lang('Thrift.invited_user'), $allMember);
            return $this
                ->getResponse(
                    $sucess
                );
        } else {
            $error = $this->generateError(lang('Thrift.no_invited_user'));
            return $this
                ->getResponse(
                    $error,
                    ResponseInterface::HTTP_OK
                );
        }
    }

    /**
     * List all thrifts in which currently logged in user is invited
     * It also provides current status of invitations.
     * Provides paginated data
     * @return Response
     */

    public function invitedMe($page = 0)
    {
        $now = date('Y-m-d H:i:s');
        $limit = 20;
        $start = $page *  $limit;
        $nbuilder = $this->db->table("thrift_two_win_invited_member");
        $nbuilder->select("thrift_two_win_invited_member.invited_email, thrift_two_win_invited_member.is_join,thrift_two_win.thrift_group_number,
        thrift_two_win.thrift_group_start_date,thrift_two_win.thrift_name,thrift_two_win.id as thrift_id,concat(users.first_name,' ',users.last_name) as inviter, users.user_profile_image,
        DATE_FORMAT(thrift_two_win_invited_member.invited_date,'%d-%m-%Y') as formatted_invited_date, TIMESTAMPDIFF(MINUTE,thrift_two_win_invited_member.invited_date,'$now') as timediff_minutes
        ");
        $nbuilder->join('thrift_two_win', 'thrift_two_win_invited_member.thrift_id = thrift_two_win.id');
        $nbuilder->join('users', 'users.id = thrift_two_win.created_member');
        $nbuilder->where('thrift_two_win_invited_member.invited_email', CURRENT_USER['email']);
        $nbuilder->limit($limit, $start);
        $query = $nbuilder->get();
        $members = $query->getResultArray();


        if (!empty($members)) {
            $allMember = [];

            foreach ($members as $mem) {
                if ($mem['thrift_group_start_date'] < date('Y-m-d H:i:s') && $mem['is_join'] == 0) {
                    $datetime1 = new DateTime();
                    $datetime2 = new DateTime($mem['thrift_group_start_date']);
                    $interval = $datetime1->diff($datetime2);
                    //$elapsed = $interval->format('%a days %h hours %i minutes');
                    $dy = $interval->format('%a');
                    $hr = $interval->format('%h');
                    if ($hr != 0) {
                        $elapsed = $interval->format('%h hours %i minutes');
                    }
                    if ($dy != 0) {
                        $elapsed = $interval->format('%a days');
                    }

                    $mem['statusText'] =  'Expired '.$elapsed . ' ago';
                    $mem['status'] = 'expired';
                }


                if ($mem['thrift_group_start_date'] > date('Y-m-d H:i:s')) {

                    $datetime1 = new DateTime($mem['thrift_group_start_date']);
                    $datetime2 = new DateTime();
                    $interval = $datetime1->diff($datetime2);
                    //$elapsed = $interval->format('%a days %h hours %i minutes');
                    $dy = $interval->format('%a');
                    $hr = $interval->format('%h');
                    if ($hr != 0) {
                        $elapsed = $interval->format('%h hours %i minutes');
                    }
                    if ($dy != 0) {
                        $elapsed = $interval->format('%a days');
                    }
                    $mem['statusText'] =  'Expires in '.$elapsed;
                    $mem['status'] = 'expires';
                }

                if ($mem['is_join'] == 1) {
                    $mem['status'] = 'Joined';
                    $mem['statusText'] = 'Joined';
                }
                if ($mem['is_join'] == 2) {
                    $mem['status'] = 'Declined';
                    $mem['statusText'] = 'Declined';
                }
                $allMember[] = $mem;
            }

            $sucess = $this->generateSuccess(lang('Thrift.invited_me_user'), $allMember);
            return $this
                ->getResponse(
                    $sucess
                );
        } else {
            $error = $this->generateError(lang('Thrift.user_have_no_invitation'));
            return $this
                ->getResponse(
                    $error,
                    ResponseInterface::HTTP_OK
                );
        }
    }

    /**
     * Check which thrifts need to be completed
     */

    private function thriftCompleteCheck(){
        $spc = new \Thrift();
        $spc->thriftend();
    }

    private function getThriftWinner($thriftid){
        $spc = new \Thrift();
        $winner = $spc->getThriftWinner($thriftid);
        return $winner;
    }

    /*
    * Internal use
    */

    private function getJWTForUser(
        string $emailAddress,
        string $message,
        int $responseCode = ResponseInterface::HTTP_OK
    ) {
        try {
            $model = new UserModel();
            $user = $model->findUserByEmailAddress($emailAddress);

            unset($user['password']);

            helper('jwt');

            return $this
                ->getResponse(
                    [
                        'message' => $message,
                        'user' => $user,
                        'access_token' => getSignedJWTForUser($emailAddress)
                    ]
                );
        } catch (Exception $exception) {
            return $this
                ->getResponse(
                    [
                        'error' => $exception->getMessage(),
                    ],
                    $responseCode
                );
        }
    }
}
