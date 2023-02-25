<?php
if (!function_exists("rs_send_email")) {
    function rs_send_email($toEmail, $emailSubject, $emailBody)
    {
        $email = \Config\Services::email();

        $site_name = 'Prosperis';
        $site_email = 'prosperis@info.com';

        $setting = new App\Models\Settings();

        $mail_options = $setting->where('settings_code', 'email_settings')->find();

        $settingValue = [];
        foreach ($mail_options as $options) {
            $settingValue[$options['settings_key']] = $options['settings_value'];
        }

        if ($settingValue['protocol'] == 'php') {
            $config = [
                'protocol' => 'mail',
                'mailType' => 'html',
            ];

            $email->initialize($config);
            $email->setFrom($site_email, $site_name);
            $email->setTo($toEmail);
            $email->setSubject($emailSubject);
            $email->setMessage($emailBody);
            if ($email->send()) {
                return true;
            } else {
                return false;
            }
        } else {

            $config = [
                'protocol' => $settingValue['protocol'],
                'SMTPHost' => $settingValue['smtp_host'],
                'SMTPUser' => $settingValue['smtp_user'],
                'SMTPPass' => $settingValue['smtp_pass'],
                'SMTPPort' => $settingValue['smtp_port'],
                'SMTPCrypto' => 'tls',
                'mailType' => 'html',
            ];

            $email->initialize($config);

            $email->setFrom('support@prosperisgold.com', $site_name);
            $email->setTo($toEmail);

            $email->setSubject($emailSubject);
            $email->setMessage($emailBody);

            // $email->send();

            if (!$email->send()) {
                return $email->printDebugger();
            } else {
                return true;
            }
        }
    }
}
