<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\Preuser;
use App\Models\Group;
use App\Models\UserGroup;
use App\Models\Thrifttwowin;
use App\Models\Thrifttwowinmember;
use App\Models\Thrifttwowininvitedmember;
use App\Models\EmailTemplate;
use App\Models\Settings;
use CodeIgniter\HTTP\Response;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;
use ReflectionException;
use CodeIgniter\Events\Events;
use DateTime;
use App\Models\Twofactor;

define('TESTMODE', 1);

class AuthController extends BaseController {

    /**
     * Register a new user
     * @return Response

     */
    public function register() {
        $rules = [
            'email' => 'required|min_length[6]|max_length[200]|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]|max_length[255]',
            'phone' => 'required|min_length[10]'
        ];

        $input = $this->getRequestInput($this->request);

        if (!$this->validateRequest($input, $rules)) {
            $error = $this->generateError($this->validator->getErrors());
            return $this
                            ->getResponse(
                                    $error,
                                    ResponseInterface::HTTP_OK
            );
        }


        $userModel = new Preuser();
        $code = random_int(10000, 99999);

        $userData['email'] = $input['email'];
        $userData['password'] = password_hash($input['password'], PASSWORD_BCRYPT);
        $userData['phone'] = $input['phone'];
        $userData['activation_code'] = md5($code);

        $isSuccess = $userModel->save($userData);
        if ($isSuccess) {
            $email_template = new EmailTemplate();
            $template = $email_template->where('email_template_type', 'user_activation_code')->find();

            $template_message = $template[0]['email_template'];
            $find = array("{{username}}", "{{code}}");
            $replace = array($input['email'], $code);
            $message = str_replace($find, $replace, $template_message);

            $subject = $template[0]['email_template_subject'];
            $send_email = rs_send_email($input['email'], $subject, $message);

            $id = $userModel->getInsertID();

            if (TESTMODE) {
                $sucess = $this->generateSuccess(lang('Auth.pre_user_create_sucess'), ['code' => $code]);
            } else {
                $sucess = $this->generateSuccess('Pre user created successfully.', []);
            }
            return $this
                            ->getResponse(
                                    $sucess
            );
        } else {
            $error = $this->generateError(lang('Auth.pre_user_create_error'));
            return $this->getResponse(
                            $error,
                            ResponseInterface::HTTP_OK
            );
        }
    }

    /**
     * Resend Verification Code For Registration
     * Code is sent by email
     * @return Response

     */
    public function resendVerification() {
        $rules = [
            'email' => 'required|min_length[6]|max_length[255]|valid_email',
            'phone' => 'required|min_length[10]'
        ];

        $input = $this->getRequestInput($this->request);
        if (!$this->validateRequest($input, $rules)) {
            $error = $this->generateError($this->validator->getErrors());
            return $this
                            ->getResponse(
                                    $error,
                                    ResponseInterface::HTTP_OK
            );
        }

        $userModel = new Preuser();
        $machInfo = $userModel->where(['email' => $input['email'], 'phone' => $input['phone']])->orderBy('id', 'DESC')->find();

        if (count($machInfo)) {
            $item_id = $machInfo[0]['id'];
            $code = random_int(10000, 99999);
            $userModel->update($item_id, ['activation_code' => md5($code)]);
            $email_template = new EmailTemplate();
            $template = $email_template->where('email_template_type', 'user_activation_code')->find();

            $template_message = $template[0]['email_template'];
            $find = array("{{username}}", "{{code}}");
            $replace = array($machInfo[0]['email'], $code);
            $message = str_replace($find, $replace, $template_message);

            $subject = $template[0]['email_template_subject'];
            $send_email = rs_send_email($machInfo[0]['email'], $subject, $message);

            if (TESTMODE) {
                $sucess = $this->generateSuccess(lang('Auth.user_code_sent'), ['code' => $code]);
            } else {
                $sucess = $this->generateSuccess('Code Sent successfully.', []);
            }

            return $this
                            ->getResponse(
                                    $sucess
            );
        } else {

            $error = $this->generateError(lang('Auth.user_not_found'));
            return $this
                            ->getResponse(
                                    $error,
                                    ResponseInterface::HTTP_OK
            );
        }
    }

    /**
     * Match verification code provided by user on registration step
     * @return Response

     */
    public function checkVerification() {
        $rules = [
            'code' => 'required',
        ];

        $input = $this->getRequestInput($this->request);

        if (!$this->validateRequest($input, $rules)) {
            $error = $this->generateError($this->validator->getErrors());
            return $this
                            ->getResponse(
                                    $error,
                                    ResponseInterface::HTTP_OK
            );
        }

        $userModel = new Preuser();
        $matchInfo = $userModel->where('activation_code', md5($input['code']))
                ->where('created_at >=', '(NOW() - INTERVAL 2 HOUR)', false)
                ->find();

        if ($matchInfo) {
            $userModel->update($matchInfo[0]['id'], ['verification' => 1]);
            $sucess = $this->generateSuccess(lang('Auth.code_verification_success'), ['code' => $input['code']]);
            return $this
                            ->getResponse(
                                    $sucess
            );
        } else {
            $error = $this->generateError(lang('Auth.code_not_matched'));
            return $this
                            ->getResponse(
                                    $error,
                                    ResponseInterface::HTTP_OK
            );
        }
    }

    /**
     * Registration step
     * User basic details i.e. First name, last name, gender etc. added
     * @return Response

     */
    public function addBasicInfo() {

        $rules = [
            'first_name' => 'required|min_length[3]|alpha',
            'last_name' => 'required|min_length[3]|alpha',
            'user_gender' => 'required',
            'user_dob' => 'required',
            'code' => 'required',
        ];

        $input = $this->getRequestInput($this->request);

        if (!$this->validateRequest($input, $rules)) {
            $error = $this->generateError($this->validator->getErrors());
            return $this
                            ->getResponse(
                                    $error,
                                    ResponseInterface::HTTP_OK
            );
        }

        $userPreModel = new Preuser();
        $user_info = $userPreModel->where('activation_code', md5($input['code']))
                ->find();
        if (empty($user_info)) {
            $error = $this->generateError(lang('Auth.user_not_found'));
            return $this
                            ->getResponse(
                                    $error,
                                    ResponseInterface::HTTP_OK
            );
            return;
        }

        $info = $user_info[0];

        $dateOfBirth = $input['user_dob'];
        $today = date("Y-m-d");
        $diff = date_diff(date_create($dateOfBirth), date_create($today));

        if ($input['user_dob']) {
            $user_dob = $input['user_dob'];
            $dob_date = new DateTime($input['user_dob']);
            $dob_date_timestamp = $dob_date->getTimestamp();
        }

        $newdata['user_gender'] = $input['user_gender'];
        $newdata['user_dob'] = $dob_date_timestamp;

        $userModel = new UserModel();
        $userData['active'] = 1; //For test active is 1
        $userData['email'] = $info['email'];
        $userData['password'] = $info['password'];
        $userData['phone'] = $info['phone'];
        $userData['first_name'] = $input['first_name'];
        $userData['last_name'] = $input['last_name'];
        $userData['mem_id_num'] = $this->getThrifterIdNum($info['first_name'], $info['last_name']);
        $userData['user_gender'] = $input['user_gender'];
        $userData['user_dob'] = $dob_date_timestamp;
        $userData['user_age'] = $diff->format('%y');
        $isSuccess = $userModel->save($userData);
        if ($isSuccess) {
            $id = $userModel->getInsertID();
            $this->addReferrer($id, $info['email']);

            $result = $this->createPaystackCustomer($info['email'], $input['first_name'], $input['last_name'], $info['phone']);
            $output = json_decode($result, true);
            $payCustomerId = [
                "pay_customer_id" => $output['data']['customer_code'],
            ];
            $userModel->update($id, $payCustomerId);

            $groupModel = new Group();
            $group = $groupModel->where('name', 'users')->first();
            if ($group) {
                $userGroupData = [];
                $userGroupData['user_id'] = $id;
                $userGroupData['group_id'] = $group['id'];
                $userGroupModel = new UserGroup();
                $userGroupModel->save($userGroupData);
            }
            $userPreModel->delete($info['id']); //REMOVE USER FROM TEMP
            Events::trigger('user_registered', $id); //Now run event to additional tasks like mailing
            return $this->getJWTForUser($info['email'], lang('Auth.user_create_sucess'), ResponseInterface::HTTP_OK);
        }
        $error = $this->generateError(lang('Auth.pre_user_create_error'));
        return $this->getResponse($error, ResponseInterface::HTTP_OK);
    }

    /**
     * Registration final step
     * BVN is provided by user. If all good user is taken from temporary table and put in users table
     * @return Response

     */
    public function setBvn() {
        $rules = [
            'bvn' => 'required|min_length[5]|max_length[5]|integer',
            'code' => 'required',
        ];


        $input = $this->getRequestInput($this->request);

        if (!$this->validateRequest($input, $rules)) {
            $error = $this->generateError($this->validator->getErrors());
            return $this
                            ->getResponse(
                                    $error,
                                    ResponseInterface::HTTP_OK
            );
        }


        $model = new Preuser();
        $user_info = $model->where('activation_code', md5($input['code']))
                ->find();

        if (empty($user_info)) {
            $error = $this->generateError(lang('Auth.user_not_found'));
            return $this
                            ->getResponse(
                                    $error,
                                    ResponseInterface::HTTP_OK
            );
        }

        $info = $user_info[0];

        $userModel = new UserModel();
        $userData['active'] = 1; //For test active is 1
        $userData['email'] = $info['email'];
        $userData['password'] = $info['password'];
        $userData['phone'] = $info['phone'];
        $userData['first_name'] = $info['first_name'];
        $userData['last_name'] = $info['last_name'];
        $userData['mem_id_num'] = $this->getThrifterIdNum($info['first_name'], $info['last_name']);
        $userData['user_gender'] = $info['user_gender'];
        $userData['user_dob'] = $info['user_dob'];
        $userData['user_age'] = $info['user_age'];
        $userData['user_bvn'] = $input['bvn'];


        $isSuccess = $userModel->save($userData);

        if ($isSuccess) {
            $id = $userModel->getInsertID();

            $this->addReferrer($id, $info['email']);

            //REMOVE USER FROM TEMP
            $model->delete($info['id']);

            //Now run event to additional tasks like mailing
            Events::trigger('user_registered', $id);


            return $this
                            ->getJWTForUser(
                                    $info['email'],
                                    lang('Auth.user_create_sucess'),
                                    ResponseInterface::HTTP_OK
            );
        }

        $error = $this->generateError(lang('Auth.pre_user_create_error'));
        return $this
                        ->getResponse(
                                $error,
                                ResponseInterface::HTTP_OK
        );
    }

    /**
     * User requested to update password.
     * A code is generated and stored in DB
     * Also code is sent to user Email (if exists)
     * @return Response

     */
    public function forgetPassword() {
        $rules = [
            'email' => 'required|valid_email',
        ];

        $input = $this->getRequestInput($this->request);

        if (!$this->validateRequest($input, $rules)) {
            $error = $this->generateError($this->validator->getErrors());
            return $this
                            ->getResponse(
                                    $error,
                                    ResponseInterface::HTTP_OK
            );
        }
        $userModel = new UserModel();
        $user = $userModel->where('email', $input['email'])->find();

        if (empty($user)) {
            $error = $this->generateError(lang('Auth.user_not_found'));
            return $this->getResponse(
                            $error,
                            ResponseInterface::HTTP_NOT_FOUND
            );
        } else {
            $code = random_int(10000, 99999);
            $userModel->update($user[0]['id'], ['forgotten_password_code' => $code]);
            $email_template = new EmailTemplate();
            $template = $email_template->where('email_template_type', 'forgot_password_app')->find();
            $template_message = $template[0]['email_template'];
            $find = array("{{username}}", "{{code}}");
            $replace = array($input['email'], $code);
            $message = str_replace($find, $replace, $template_message);
            $subject = $template[0]['email_template_subject'];
            $send_email = rs_send_email($input['email'], $subject, $message);

            if ($send_email) {
                if (TESTMODE) {
                    $sucess = $this->generateSuccess(lang('Auth.user_code_sent'), ['code' => $code]);
                } else {
                    $sucess = $this->generateSuccess(lang('Auth.user_code_sent'), []);
                }

                return $this
                                ->getResponse(
                                        $sucess
                );
            } else {
                $error = $this->generateError(lang('Auth.code_not_sent'));
                return $this
                                ->getResponse(
                                        $error,
                                        ResponseInterface::HTTP_INTERNAL_SERVER_ERROR
                );
            }
        }
    }

    /**
     * Forget Password Step 2
     * Match code that was sent to email
     * @return Response

     */
    public function checkForgotPasswordCode($inCall = false) {
        $rules = [
            'email' => 'required|valid_email',
            'code' => 'required'
        ];

        if ($inCall) {
            $rules['newpassword'] = 'required|min_length[6]';
        }

        $input = $this->getRequestInput($this->request);

        if (!$this->validateRequest($input, $rules)) {
            $error = $this->generateError($this->validator->getErrors());
            return $this
                            ->getResponse(
                                    $error,
                                    ResponseInterface::HTTP_OK
            );
        }

        $userModel = new UserModel();
        $user = $userModel->where('email', $input['email'])->find();

        if (empty($user)) {
            $error = $this->generateError('User not found');
            return $this->getResponse(
                            $error,
                            ResponseInterface::HTTP_NOT_FOUND
            );
        } else {
            $user = $userModel->where(['email' => $input['email'], 'forgotten_password_code' => $input['code']])->find();
            if (empty($user)) {
                $error = $this->generateError(lang('Auth.wrong_code_provided'));
                return $this->getResponse(
                                $error,
                                ResponseInterface::HTTP_OK
                );
            }
        }

        if (!$inCall) {
            $sucess = $this->generateSuccess(lang('Auth.code_verification_success'), []);
            return $this
                            ->getResponse(
                                    $sucess
            );
        }
    }

    /**
     * All Ok, User provided code and Email matched DB
     * So, now update password
     * @return Response
     */
    public function updateForgetPassword() {
        //Send Email, Code, and New Password
        $ret = $this->checkForgotPasswordCode(true);
        if ($ret != '') {
            return $ret;
        }

        $input = $this->getRequestInput($this->request);

        $model = new UserModel();
        $model->where('email', $input['email'])->set(['password' => $input['newpassword']])->update();

        $success = $this->generateSuccess(lang('Auth.password_update_sucessfully'), []);
        return $this
                        ->getResponse(
                                $success
        );
    }

    /**
     * Update a user profile, Must send Bearer Token
     * @return Response
     */
    public function updateProfile() {

        $input = $this->getRequestInput($this->request);

        $rules = [
            'first_name' => 'required|min_length[3]',
            'last_name' => 'required|min_length[3]',
            'phone' => 'required|min_length[10]',
            'user_gender' => 'required',
            'user_dob' => 'required',
        ];

        if (isset($input['email']) && $input['email'] != CURRENT_USER['email']) {
            $rules['email'] = 'required|min_length[6]|max_length[200]|valid_email|is_unique[users.email]';
        }


        if (!$this->validateRequest($input, $rules)) {
            $error = $this->generateError($this->validator->getErrors());
            return $this
                            ->getResponse(
                                    $error,
                                    ResponseInterface::HTTP_OK
            );
        }

        $newdata = [];
        $newdata['first_name'] = $input['first_name'];
        $newdata['last_name'] = $input['last_name'];
        $newdata['phone'] = $input['phone'];

        if (isset($input['email'])) {
            $email = $input['email'];
            $newdata['email'] = $input['email'];
        }

        $dateOfBirth = $input['user_dob'];
        $today = date("Y-m-d");
        $diff = date_diff(date_create($dateOfBirth), date_create($today));

        if ($input['user_dob']) {
            $dob_date = new DateTime($input['user_dob']);
            $dob_date_timestamp = $dob_date->getTimestamp();
        }
        $newdata['user_gender'] = $input['user_gender'];
        $newdata['user_dob'] = $dob_date_timestamp;
        $newdata['user_age'] = $diff->format('%y');

        $model = new UserModel();
        $model->update(CURRENT_USER['id'], $newdata);


        if (isset($email)) {
            return $this->getJWTForUser($email, lang('Auth.user_info_update'), ResponseInterface::HTTP_OK);
        } else {
            $userModel = new UserModel();
            $results = $userModel->findUserById(CURRENT_USER['id']);

            //Alter the return values for App
            $results['user_dob'] = date('d-m-Y', $results['user_dob']);
            $sucess = $this->generateSuccess(lang('Auth.user_info_update'), $results);
            return $this
                            ->getResponse(
                                    $sucess
            );
        }
    }

    /**
     * Password update for logged in user
     * Must send Bearer Token
     * @return Response
     */
    public function updatePassword() {

        $rules = [
            'old_password' => 'required|min_length[6]',
            'new_password' => 'required|min_length[6]',
            'otp' => 'required|min_length[5]',
        ];

        $input = $this->getRequestInput($this->request);

        if (!$this->validateRequest($input, $rules)) {
            $error = $this->generateError($this->validator->getErrors());
            return $this->getResponse($error, ResponseInterface::HTTP_OK);
        }

        $isValidOtp = $this->validateOtp($input['otp']);

        if ($isValidOtp) {

            if (password_verify($input['old_password'], CURRENT_USER['password'])) {

                $model = new UserModel();
                $model->update(CURRENT_USER['id'], ['password' => $input['new_password']]);
                
                $twoFactorModel = new Twofactor();
                $twoFactorModel->where(['otp' => $input['otp'], 'type' => 'change_password', 'read' => 0, 'user_id' => CURRENT_USER['id']])->set(['read' => 1])->update();

                $sucess = $this->generateSuccess(lang('Auth.user_password_update'), $isValidOtp);
                return $this->getResponse($sucess);
            } else {

                $error = $this->generateError(lang('Auth.password_not_matched'));
                return $this->getResponse($error, ResponseInterface::HTTP_OK);
            }
        } else {

            $error = $this->generateError(lang('Auth.otp_invalid'));
            return $this->getResponse($error, ResponseInterface::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Update profile picture of logged in user
     * Must send Bearer Token
     * @return Response
     */
    public function updateUserPhoto() {

        $input = $this->validate(['image' => ['uploaded[image]', 'mime_in[image,image/jpg,image/jpeg,image/png]']]);

        if (!$input) {
            $error = $this->generateError($this->validator->getErrors());
            return $this->getResponse($error, ResponseInterface::HTTP_OK);
        } else {
            $config = config('AWS');
            $credentials = new \Aws\Credentials\Credentials($config->accessKey, $config->secretKey);

            $s3Client = new \Aws\S3\S3Client([
                'region' => $config->region,
                'version' => '2006-03-01',
                'credentials' => $credentials
            ]);

            $data = file_get_contents($_FILES['image']['tmp_name']);
            $filename = uniqid() . '.png';
            $bucket = $config->bucket;
            $imageName = '';
            $image = '';

            try {
                $upload = $s3Client->upload($bucket, 'images/' . $filename, $data);
                $imageName = $upload->get('ObjectURL');
                $image = str_replace($config->bucket_s3_endpoint, $config->cloud, $imageName);
            } catch (Exception $ex) {
                $err = array('upload' => lang('Auth.user_photo_upload_error'));
                $error = $this->generateError($err);
                return $this->getResponse($error, ResponseInterface::HTTP_OK);
            }
        }

        $u_details_model = new UserModel();
        $u_details_model->where('id', CURRENT_USER['id'])->set(['user_profile_image' => $image])->update();

        $sucess = $this->generateSuccess(lang('Auth.user_image_update'), ['image' => $image]);
        return $this->getResponse($sucess);
    }

    /**
     * Get Current logged in User Basic profile Details
     * @return Response
     */
    public function getProfile() {

        if (!defined('CURRENT_USER')) {
            $error = $this->generateError(lang('Auth.user_not_login'));
            return $this
                            ->getResponse(
                                    $error,
                                    ResponseInterface::HTTP_OK
            );
        }

        $userModel = new UserModel();
        $results = $userModel->findUserById(CURRENT_USER['id']);

        //Alter the return values for App
        $results['user_dob'] = date('d-m-Y', $results['user_dob']);

        $sucess = $this->generateSuccess(lang('Auth.user_information'), $results);
        return $this
                        ->getResponse(
                                $sucess
        );
    }

    /**
     * Get any user basic profile data with userid ( auto increment value )
     * It contains minimum data
     * @return Response
     */
    public function getMiniProfile($user_id) {
        if (!defined('CURRENT_USER')) {
            $error = $this->generateError(lang('Auth.user_not_login'));
            return $this
                            ->getResponse(
                                    $error,
                                    ResponseInterface::HTTP_OK
            );
        }


        if (!is_numeric($user_id)) {
            $error = $this->generateError('Invalid user id');
            return $this
                            ->getResponse(
                                    $error,
                                    ResponseInterface::HTTP_OK
            );
        }

        $userModel = new UserModel();
        $results = $userModel->findUserById(CURRENT_USER['id']);

        //Alter the return values for App
        $results['user_dob'] = date('d-m-Y', $results['user_dob']);

        $sucess = $this->generateSuccess(lang('Auth.user_information'), $results);
        return $this
                        ->getResponse(
                                $sucess
        );
    }

    /**
     * Internal function, not directly called from API
     * @return Response
     */
    private function getThrifterIdNum($f_name, $l_name) {
        $userModel = new UserModel();
        if (!$f_name) {
            $f_name = 'X';
        } else {
            $f_name = ucfirst($f_name[0]);
        }

        if (!$l_name) {
            $l_name = 'X';
        } else {
            $l_name = ucfirst($l_name[0]);
        }


        $mem_id_num = 'T' . $this->alphaNum(5, false, true) . $f_name . $l_name;

        $exists = $userModel->findUserByMemberbyNum($mem_id_num);
        if ($exists) {
            $x = $this->getThrifterIdNum($f_name, $l_name);
        } else {
            return $mem_id_num;
        }
        return $x;
    }

    private function alphaNum($length = false, $only_alphabets = false, $only_integers = false) {
        if (!$length) {
            $length = 8;
        }

        $alphabets = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $integers = '0123456789';
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        if ($only_alphabets) {
            $characters = $alphabets;
        }

        if ($only_integers) {
            $characters = $integers;
        }

        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $randomString;
    }

    /**
     * Authenticate Existing User
     * @return Response
     */
    public function login() {
        $rules = [
            'email' => 'required|min_length[6]|max_length[50]|valid_email',
            'password' => 'required|min_length[6]|max_length[255]|validateUser[email, password]'
        ];

        $errors = [
            'password' => [
                'validateUser' => 'UNAUTHENTICATED'
            ]
        ];

        $input = $this->getRequestInput($this->request);

        if (!$this->validateRequest($input, $rules, $errors)) {
            if ($this->validator->hasError('password') && $this->validator->getError('password') == "UNAUTHENTICATED") {

                $error = $this->generateError(lang('Auth.user_login_error'));
                return $this
                                ->getResponse(
                                        $error,
                                        ResponseInterface::HTTP_OK
                );
            }


            $error = $this->generateError($this->validator->getErrors());
            return $this
                            ->getResponse(
                                    $error,
                                    ResponseInterface::HTTP_OK
            );
        }

        //Now run event to additional tasks like mailing
        Events::trigger('user_loggedin', $input['email']);
        // Event end

        return $this->getJWTForUser($input['email'], lang('Auth.user_authenticated'), ResponseInterface::HTTP_OK);
    }

    /**
     * Internal function, not directly call from API endpoint
     * It returns Token for any valid user
     * @return Response
     */
    private function getJWTForUser(
            string $emailAddress,
            string $message,
            int $responseCode = ResponseInterface::HTTP_OK
    ) {
        try {
            $model = new UserModel();
            $user = $model->findUserByEmailAddress($emailAddress);

            $user['user_dob'] = date('d-m-Y', $user['user_dob']);

            unset($user['password']);

            helper('jwt');

            return $this
                            ->getResponse(
                                    [
                                        'status' => true,
                                        'message' => $message,
                                        'data' => ['user' => $user, 'access_token' => getSignedJWTForUser($emailAddress)]
                                    ],
                                    $responseCode
            );
        } catch (Exception $exception) {
            return $this
                            ->getResponse(
                                    [
                                        'status' => false,
                                        'message' => $exception->getMessage(),
                                    ],
                                    ResponseInterface::HTTP_OK
            );
        }
    }

    /**
     *  Internal function
     *  This will add referrer
     */
    private function addReferrer($reg_id, $reg_email) {

        $invited_model = new Thrifttwowininvitedmember();

        $chk_invite = $invited_model->where('invited_email', $reg_email)->first();

        if (!empty($chk_invite)) {
            $referred_by = $chk_invite['invited_by_user'];
            $userModel = new UserModel();

            $data = [
                'referred_by' => $referred_by
            ];

            $userModel->update($reg_id, $data);
        }
    }

    private function createPaystackCustomer($email, $firstName, $lastName, $phone) {
        $Settings_model = new Settings();
        $payments_setting = $Settings_model->where('settings_key', 'payment_setting')->first();

        $results = json_decode($payments_setting['settings_value']);

        if ($results->paystack_test_mode == 'On') {
            $SECRET_KEY = $results->paystack_test_secret_key;
        } else {
            $SECRET_KEY = $results->paystack_live_secret_key;
        }

        $url = "https://api.paystack.co/customer";
        $fields = [
            "email" => $email,
            "first_name" => $firstName,
            "last_name" => $lastName,
            "phone" => $phone
        ];
        $fields_string = http_build_query($fields);
        //open connection
        $ch = curl_init();

        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer $SECRET_KEY",
            "Cache-Control: no-cache",
        ));

        //So that curl_exec returns the contents of the cURL; rather than echoing it
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        //execute post
        $result = curl_exec($ch);
        return $result;
    }

    /**
     * Internal use
     * @return Response
     */
    public function generateThriftGroupNumber() {
        $num = $this->alphaNum(1, true, false);
        $num .= $this->alphaNum(7, false, false);
        $nbuilder = $this->db->table('pg_thrift_group');
        $nbuilder->select('*');
        $nbuilder->where('thrift_group_number', $num);
        $query = $nbuilder->get();
        $result = $query->getRow();
        if ($result) {
            $x = $this->generateThriftGroupNumber();
        } else {

            return $num;
        }
        return $x;
    }

    private function validateOtp($otp) {

        $twoFactorModel = new Twofactor();
        $getOtp = $twoFactorModel->where(['otp' => $otp, 'type' => 'change_password', 'read' => 0, 'user_id' => CURRENT_USER['id']])->first();

        if ($getOtp) {
            return true;
        } else {
            return false;
        }
    }

}
