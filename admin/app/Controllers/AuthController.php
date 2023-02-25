<?php
namespace App\Controllers;
use App\Models\UserModel;
use App\Models\Preuser;
use App\Models\Thrifttwowin;
use App\Models\Thrifttwowinmember;
use App\Models\Thrifttwowininvitedmember;
use App\Models\EmailTemplate;
use CodeIgniter\HTTP\Response;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;
use ReflectionException;
use CodeIgniter\Events\Events;
use DateTime;

define('TESTMODE',1);


class AuthController extends BaseController
{
    public function forgetPassword()
    {
        $data = [];

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('forgotValidate')) {
                $data['validation'] = $this->validator;
            } else {
                $input = $this->request->getVar();
                $userModel = new UserModel();
                $user = $userModel->where('email', $input['email'])->find();
                if ($user) {
                    $code = random_int(10000, 99999);
                    $userModel->update($user[0]['id'], ['forgotten_password_code' =>  $code]);
                    $email_template = new EmailTemplate();
                    $template = $email_template->where('email_template_type', 'forgot_password_app')->find();
                    $template_message = $template[0]['email_template'];

                    $find = array("{{username}}", "{{code}}");
                    $replace = array($input['email'], $code);
                    $message = str_replace($find, $replace, $template_message);
                    $subject = $template[0]['email_template_subject'];
                    $send_email = rs_send_email($input['email'], $subject, $message);

                    // echo "<pre>";
                    // print_r($send_email);
                    // die();

                    // $data['success'] = '<div class="alert alert-success text-center">We are sending password reset link to your email please check!</div>';

                    return redirect()->to(base_url('/auth/reset_password'))->with('success', '<div class="alert alert-success text-center">We have sent a verify code to your email !</div>');
                } else {
                    $data['error'] = '<div class="alert alert-warning text-center">Email Does Not Match!</div>';
                }
            }
        }

        return view('Auth/forgot-pass', $data);
    }

    public function resetPassword()
    {
        $userModel = new UserModel();
        $data = [];

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('resetValidate')) {
                $data['validation'] = $this->validator;
            } else {
                $input = $this->request->getVar();
                $validToken = $userModel->where(['forgotten_password_code' => $input['code']])->first();
                
                if ($validToken) {
                    $token = $validToken['forgotten_password_code'];
                    return redirect()->to(base_url('/auth/update_forget_password/'.$token));
                } else {
                    $data['invalidToken'] = "<div class='alert alert-warning text-center'>Verify Code did not Match!</div>";
                }
            }
        }

        return view('Auth/enter-code', $data);
    }

    public function updateForgetPassword($token = null)
    {
        $data = [];
        $userModel = new UserModel();
        $data['token'] = $token;

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('updateForgetPassValid')) {
                $data['validation'] = $this->validator;
            } else {
                $pass = $this->request->getVar('password');
                $rePass = $this->request->getVar('confirm_password');

                if (strlen($pass == $rePass)) {
                    $passUpdate = [
                        'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
                        'forgotten_password_code' => '',
                    ];

                    $userModel->where('forgotten_password_code', $token)
                    ->set($passUpdate)
                    ->update();

                    $data['success'] = '<div class="alert alert-success text-center">Password updated successfully!</div>';
                } else {
                    $data['error'] = '<div class="alert alert-warning text-center">Password and confirm password do not match!</div>';
                }
            }
        }

        return view('Auth/reset-pass', $data);
    }
}
