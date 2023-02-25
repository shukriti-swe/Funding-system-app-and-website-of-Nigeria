-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2023 at 03:17 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `propersapi`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'superadmin', 'This is super admin'),
(2, 'admin', 'This is admin'),
(3, 'users', 'This is users');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2021-01-10-051958', 'App\\Database\\Migrations\\User', 'default', 'App', 1648557498, 1),
(2, '2022-01-30-223024', 'App\\Database\\Migrations\\SupportMessage', 'default', 'App', 1648557498, 1),
(3, '2022-01-31-051958', 'App\\Database\\Migrations\\Preuser', 'default', 'App', 1648557498, 1),
(4, '2022-01-31-052501', 'App\\Database\\Migrations\\Thrifttwowin', 'default', 'App', 1648557498, 1),
(5, '2022-01-31-052715', 'App\\Database\\Migrations\\Thrifttwowindeposits', 'default', 'App', 1648557498, 1),
(6, '2022-01-31-052821', 'App\\Database\\Migrations\\Thrifttwowininvitedmember', 'default', 'App', 1648557498, 1),
(7, '2022-01-31-052910', 'App\\Database\\Migrations\\Thrifttwowinmember', 'default', 'App', 1648557498, 1),
(8, '2022-01-31-053013', 'App\\Database\\Migrations\\Thrifttwowinwithdraw', 'default', 'App', 1648557498, 1),
(9, '2022-02-04-000729', 'App\\Database\\Migrations\\UpdateInvitedMember', 'default', 'App', 1648557498, 1),
(10, '2022-02-14-000929', 'App\\Database\\Migrations\\Thrifttwowinpaymentlog', 'default', 'App', 1648557498, 1),
(11, '2022-02-19-135135', 'App\\Database\\Migrations\\Pins', 'default', 'App', 1648557498, 1),
(12, '2022-02-22-000929', 'App\\Database\\Migrations\\Thrifttwowinwinner', 'default', 'App', 1648557498, 1),
(13, '2022-03-03-124410', 'App\\Database\\Migrations\\Addreferredbycolumntouser', 'default', 'App', 1648557498, 1),
(14, '2022-03-03-133443', 'App\\Database\\Migrations\\Thrifttwowinreferralamount', 'default', 'App', 1648557498, 1),
(15, '2022-03-04-073346', 'App\\Database\\Migrations\\UpdateUserDeviceId', 'default', 'App', 1648557498, 1),
(16, '2022-03-04-095722', 'App\\Database\\Migrations\\Notifications', 'default', 'App', 1648557498, 1),
(17, '2022-03-05-053927', 'App\\Database\\Migrations\\Thrifttowinbank', 'default', 'App', 1648557499, 1),
(18, '2022-03-05-105021', 'App\\Database\\Migrations\\Thrifttowinbankaccount', 'default', 'App', 1648557499, 1),
(19, '2022-03-05-134836', 'App\\Database\\Migrations\\Thrifttowinuserbvn', 'default', 'App', 1648557499, 1),
(20, '2022-03-05-195528', 'App\\Database\\Migrations\\Groups', 'default', 'App', 1648557499, 1),
(21, '2022-03-05-195654', 'App\\Database\\Migrations\\UserGroups', 'default', 'App', 1648557499, 1),
(22, '2022-03-06-064520', 'App\\Database\\Migrations\\Addpaycustomeridcolumntouser', 'default', 'App', 1648557499, 1),
(23, '2022-03-07-044848', 'App\\Database\\Migrations\\AddcolumnstothrifttwowinwithdrawNew', 'default', 'App', 1648557499, 1),
(24, '2022-03-07-060639', 'App\\Database\\Migrations\\Addrecipientidtothrifttwowinbankaccount', 'default', 'App', 1648557499, 1),
(25, '2022-03-13-134446', 'App\\Database\\Migrations\\Thrifttowinsetting', 'default', 'App', 1648557499, 1),
(26, '2022-03-18-113919', 'App\\Database\\Migrations\\Addinvitedatecolumtoinvite', 'default', 'App', 1648557499, 1),
(27, '2022-03-21-080753', 'App\\Database\\Migrations\\Addcolumnstothrifttwowinwithdraw', 'default', 'App', 1648557499, 1),
(28, '2022-03-23-064532', 'App\\Database\\Migrations\\Addcolumnstothrifttwowinuserbvn', 'default', 'App', 1648557499, 1),
(29, '2022-03-23-095050', 'App\\Database\\Migrations\\Changecolumnstothrifttwowinuserbvn', 'default', 'App', 1648557499, 1),
(31, '2022-03-29-124255', 'App\\Database\\Migrations\\Thrifttowinmessagearchive', 'default', 'App', 1648557864, 2),
(34, '2022-04-03-114106', 'App\\Database\\Migrations\\Thrifttowinloginlog', 'default', 'App', 1648988083, 3),
(35, '2022-04-04-071413', 'App\\Database\\Migrations\\Thrifttowinfaq', 'default', 'App', 1649056903, 4),
(36, '2022-04-19-065353', 'App\\Database\\Migrations\\Addcolumnerrorstatustothrifttwowinwithdraw', 'default', 'App', 1650351489, 5),
(37, '2022-04-19-101016', 'App\\Database\\Migrations\\Changetypeaccountnumberthrifttwowinwithdraw', 'default', 'App', 1650363633, 6),
(38, '2022-04-19-101057', 'App\\Database\\Migrations\\Changetypeaccountnumberthrifttwowinuserbvn', 'default', 'App', 1650363633, 6),
(39, '2022-04-19-101219', 'App\\Database\\Migrations\\Changetypeaccountnumberthrifttwowinbankaccount', 'default', 'App', 1650363634, 6);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `sender_id` int(11) UNSIGNED NOT NULL,
  `receiver_id` int(11) UNSIGNED NOT NULL,
  `read_status` tinyint(4) NOT NULL DEFAULT 0,
  `sender_type` varchar(255) DEFAULT NULL,
  `notify_type` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pre_user`
--

CREATE TABLE `pre_user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `verification` tinyint(1) NOT NULL DEFAULT 0,
  `activation_code` varchar(100) NOT NULL,
  `user_dob` varchar(30) NOT NULL,
  `user_age` int(3) NOT NULL,
  `user_gender` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pre_user`
--

INSERT INTO `pre_user` (`id`, `first_name`, `last_name`, `email`, `phone`, `password`, `verification`, `activation_code`, `user_dob`, `user_age`, `user_gender`, `created_at`, `updated_at`) VALUES
(1, '', '', 'khorshed+1@obsvirtual.com', '098765432435', '$2y$10$RI8.tARruuHB7KPyoSL93Ocma0tVZTzRWPlluGca/KelTf3qp.Iq6', 0, 'c39fff1ad6a93b434b117d46dfdf6681', '', 0, '', '2022-03-27 12:33:27', '2022-03-27 12:33:27'),
(4, '', '', 'khorshed+3@obsvirtual.com', '098765432435', '$2y$10$KP6U.Em8BCCTBzGiVGcEP.lw7TdgoiPFJbBfneoUJlciWWsbKAfBK', 0, '3d888043a179cc3414d569db712d8846', '', 0, '', '2022-03-27 12:47:29', '2022-03-27 12:47:29'),
(6, '', '', 'admin+2@obsvirtual.com', '098765432435', '$2y$10$Qzz459FIa1dbxuZytkwqYeaoH4OhjXVq9OtHs8e2tLH5KYvNoct9W', 0, '60aaa4b2fc3fcf6a41c454149ab76592', '', 0, '', '2022-03-27 13:52:15', '2022-03-27 13:52:15');

-- --------------------------------------------------------

--
-- Table structure for table `rspm_tbl_settings`
--

CREATE TABLE `rspm_tbl_settings` (
  `settings_id` int(11) NOT NULL,
  `settings_code` varchar(255) NOT NULL,
  `settings_key` varchar(255) NOT NULL,
  `settings_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rspm_tbl_settings`
--

INSERT INTO `rspm_tbl_settings` (`settings_id`, `settings_code`, `settings_key`, `settings_value`) VALUES
(33, 'email_settings', 'protocol', 'smtp'),
(34, 'email_settings', 'smtp_host', 'email-smtp.us-east-2.amazonaws.com'),
(35, 'email_settings', 'smtp_port', '587'),
(36, 'email_settings', 'smtp_timeout', '7'),
(37, 'email_settings', 'smtp_user', 'AKIATOQ5BV2CRUGQPYWA'),
(38, 'email_settings', 'smtp_pass', 'BCWuovwFnfhJmHq/DqtVi71hsXoh8uOfewtgM2OnJbrs'),
(39, 'email_settings', 'mailtype', 'html'),
(54, 'payment_settings', 'paystack_test_secret_key', 'sk_test_911822f663db8a83cdb153710b9b81a9fba27882'),
(55, 'payment_settings', 'paystack_test_public_key', 'pk_test_e50249399a94e3c1181f7bfe7182987509393c19'),
(57, 'payment_settings', 'paystack_test_mode', 'off'),
(60, 'general_setting', 'general_setting', '{\"site_name\":\"Thrift2Win\",\"site_email\":\"support@thrift2win.com\",\"c_symbol\":\"\\u20a6\",\"c_text\":\"Naira\",\"site_banner\":null}'),
(61, 'payment_setting', 'payment_setting', '{\"paystack_test_mode\":\"On\",\"paystack_test_secret_key\":\"sk_test_fae07c6dd6072b2914b8f40e4239ca6e820a2bb8\",\"paystack_test_public_key\":\"pk_test_e502\",\"paystack_live_secret_key\":\"sk_li8ve\",\"paystack_live_public_key\":\"pk_live pl\"}'),
(62, 'system_setting', 'system_setting', '{\"mailchimp_api_key\":\"Et qui veritatis vel1\",\"mailchimp_thrifter_list_name\":\"Susan Roberson2\",\"stop_new_thrift\":\"1\",\"thrift_warning_1_title\":\"Amet do tempore po3\",\"thrift_warning_1_message\":\"Sint mollit eum eiu4\",\"paystack_fees\":\"Sit et ipsum quis a5\",\"prosperisgold_loan_fees\":\"Id quo dolore evenie6\",\"thrift_percentage\":\"Kerr and Bernard Co7\",\"allow_inter_org_thrift\":\"1\",\"auto_approve_thrifter_account\":\"1\",\"custom_thrift_start_delay\":\"Tenetur voluptas qui8\",\"custom_thrift_max_start_time_from_delay\":\"Adipisicing qui expl9\",\"loan_thrift_start_delay\":\"Officia ipsa ea iur10\",\"loan_thrift_max_start_time_from_delay\":\"Exercitationem a sin11\",\"individual_thrift_start_delay\":\"Non similique unde r 12\",\"individual_thrift_max_start_time_from_delay\":\"Omnis velit exercita13\",\"individual_thrift_minimum_payment_number\":\"23314\",\"individual_thrift_maximum_payment_number\":\"36715\",\"thrift_threshold_time\":\"6:16 PM\",\"office_chosen_color\":\"#9b4343\",\"office_chosen_color_deeper\":\"#8d4b89\",\"partner_chosen_color\":\"#bf4d4d\",\"partner_chosen_color_deeper\":\"#6c3f6c\",\"thrift_chosen_color\":\"#974747\",\"thrift_chosen_color_deeper\":\"#6a4747\",\"trustee_chosen_color\":\"#643232\",\"trustee_chosen_color_deeper\":\"#4c733f\"}'),
(63, 'referral_setting', 'referral_setting', '{\"referral_enabled\":\"yes\",\"referral_percentage\":\"15\",\"potential_winning\":\"17\",\"thrift_start_days\":\"5\",\"thrift_start_not_later\":\"60\",\"thrift_duration_in_month\":\"a,ab,abc,abcd\"}'),
(64, 'terms_and_conditions', 'terms_and_conditions', '{\"terms_and_conditions\":\"<p>Find Australia Sms Gateway! Results &amp; Answers. Privacy Friendly. The Best Resources. Always Facts. Unlimited Access. Types: Best Results, Explore Now, New Sources, Best in Search.<\\/p>\"}');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) UNSIGNED NOT NULL,
  `setting_name` varchar(255) NOT NULL,
  `setting_value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `support_message`
--

CREATE TABLE `support_message` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `receiver_id` bigint(20) NOT NULL,
  `ticket_id` bigint(20) NOT NULL,
  `message` text NOT NULL,
  `attachment` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `support_message`
--

INSERT INTO `support_message` (`id`, `user_id`, `receiver_id`, `ticket_id`, `message`, `attachment`, `created_at`) VALUES
(1, 109, 102, 77, 'hello all', '', '2022-04-06 14:39:02'),
(2, 102, 102, 77, '<p>hello</p>', '', '2022-04-06 14:43:15'),
(3, 109, 112, 77, 'how are you?', '', '2022-04-06 14:43:37'),
(4, 102, 102, 77, '<p>fine You?</p>', '', '2022-04-06 14:44:04'),
(5, 109, 112, 88, 'how are superAdmin?', '', '2022-04-06 14:46:21'),
(6, 102, 112, 88, '<p>i am good</p>', '', '2022-04-06 14:46:45'),
(7, 102, 112, 88, '<p>you?</p>', '', '2022-04-06 14:47:42'),
(8, 109, 102, 88, 'i am also fine', '', '2022-04-06 14:48:07'),
(9, 102, 102, 88, '<p>check</p>', '', '2022-04-06 15:01:57'),
(10, 109, 102, 99, 'i am also fine ', '', '2022-04-13 18:34:11'),
(11, 109, 112, 99, 'i am also fine ', '', '2022-04-13 18:35:02'),
(12, 109, 102, 76, 'helo', '', '2022-04-13 18:37:46'),
(13, 102, 102, 76, '<p>hi</p>', '', '2022-04-13 18:38:06');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_email_template`
--

CREATE TABLE `tbl_email_template` (
  `email_template_id` int(11) NOT NULL,
  `email_template_type` varchar(50) NOT NULL,
  `email_template_subject` text NOT NULL,
  `email_template` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_email_template`
--

INSERT INTO `tbl_email_template` (`email_template_id`, `email_template_type`, `email_template_subject`, `email_template`) VALUES
(1, 'new_message', 'New Message', '<!-- [if gte mso 9]>   <style type=\"text/css\">     body, table, tr, td, h1, h2, h3, h4, h5, h6, ul, li, ol, dl, dd, dt {       font-family: Helvetica, Arial, sans-serif !important;     }     .h1, .h2 { font-family: Cambria, Georgia, serif !important; }     .h2 { line-height: 94% !important;  }     .link  { line-height: 100% !important; }   </style>   <![endif]--><!-- [if gte mso 9]><xml>   <o:OfficeDocumentSettings>     <o:AllowPNG/>     <o:PixelsPerInch>96</o:PixelsPerInch>   </o:OfficeDocumentSettings> </xml><![endif]-->\n<table style=\"background-color: #ececec;\" border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\n<tbody>\n<tr>\n<td align=\"center\"><!-- [if (gte mso 9)|(IE)]>     <table width=\"800\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"width: 800px;\">       <tr>         <td valign=\"top\">     <![endif]-->\n<table class=\"main\" style=\"max-width: 800px; min-width: 680px;\" border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\n<tbody>\n<tr>\n<td class=\"layouts-here\" align=\"left\"><!-- Module 2 - Text block -->\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\n<tbody>\n<tr>\n<td style=\"background-color: #ffffff; padding: 0 10px;\" align=\"center\">\n<table class=\"container\" style=\"width: 640px;\" border=\"0\" width=\"640\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\n<tbody>\n<tr>\n<td class=\"space\" style=\"font-size: 1px; line-height: 40px;\" height=\"40\">&nbsp;</td>\n</tr>\n<tr>\n<td align=\"center\"><img style=\"border: none; display: block;\" src=\"https://s3.us-east-2.amazonaws.com/obs-emailer/prosperis/properisgold_logo_75.png\" alt=\"Prosperis Gold\" width=\"280\" /></td>\n</tr>\n<tr>\n<td class=\"space\" style=\"font-size: 1px; line-height: 22px;\" height=\"22\">&nbsp;</td>\n</tr>\n</tbody>\n</table>\n</td>\n</tr>\n</tbody>\n</table>\n<!-- End Module 2 - Text block --> <!-- Module 2 - Text block -->\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\n<tbody>\n<tr>\n<td style=\"background-color: #ffffff; padding: 0 10px;\" align=\"center\">\n<table class=\"container\" style=\"width: 640px;\" border=\"0\" width=\"640\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\n<tbody>\n<tr>\n<td align=\"center\">\n<table class=\"title-center\" style=\"background-position: right center; background-repeat: no-repeat; background-image: url(\'\\\'\\\'\');\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\n<tbody>\n<tr><!-- title -->\n<td class=\"h2\" style=\"font-family: \'Playfair Display\', Cambria, Georgia, serif; line-height: 1.13; color: #828386; font-size: 32px; font-weight: 900; padding: 10px 30px; text-align: center;\"><span style=\"font-family: Arial, sans-serif; font-size: 18px;\"><strong>You Have A New Message</strong></span></td>\n<!-- end title --></tr>\n</tbody>\n</table>\n</td>\n</tr>\n<tr>\n<td class=\"space\" style=\"font-size: 1px; line-height: 16px;\" height=\"16\">&nbsp;</td>\n</tr>\n<tr>\n<td class=\"text-left\" style=\"color: #666666; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 24px; text-align: left;\">\n<p><strong>Dear {{username}}:</strong></p>\n</td>\n</tr>\n<tr>\n<td class=\"space\" style=\"font-size: 1px; line-height: 16px;\" height=\"16\">&nbsp;</td>\n</tr>\n<tr>\n<td class=\"text-left\" style=\"color: #666666; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 24px; text-align: left;\">\n<p>You have received a new message.&nbsp; Please click the link below to securely read the message on the portal.</p>\n</td>\n</tr>\n<tr>\n<td class=\"space\" style=\"font-size: 1px; line-height: 22px;\" height=\"22\">&nbsp;</td>\n</tr>\n<tr>\n<td align=\"center\">\n<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\n<tbody>\n<tr><!-- link -->\n<td class=\"link\" style=\"color: #cf9e2a; font-family: Lato, Arial, sans-serif; font-size: 14px; line-height: 1;\"><strong><span style=\"font-size: 20px;\"><a style=\"color: #cf9e2a; text-decoration: none;\" href=\"{{actual_link}}\">Click Here to View Your Secure Message</a></span></strong></td>\n<td class=\"space\" style=\"font-size: 1px; line-height: 14px;\" width=\"7\">&nbsp;</td>\n<!-- icon -->\n<td class=\"icon\" style=\"border-collapse: collapse; font-size: 0; line-height: 1; width: 11px;\" width=\"11\">&nbsp;</td>\n</tr>\n</tbody>\n</table>\n</td>\n</tr>\n<tr>\n<td class=\"space\" style=\"font-size: 1px; line-height: 28px;\" height=\"28\">&nbsp;</td>\n</tr>\n<tr>\n<td class=\"text-left\" style=\"color: #666666; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 24px; text-align: left;\">\n<p><em>To Your Prosperity,</em></p>\n</td>\n</tr>\n<tr>\n<td class=\"space\" style=\"font-size: 1px; line-height: 8px;\" height=\"8\">&nbsp;</td>\n</tr>\n<tr>\n<td class=\"text-left\" style=\"color: #666666; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 24px; text-align: left;\">\n<p><strong>The Prosperis Gold Team</strong></p>\n</td>\n</tr>\n<tr>\n<td class=\"space\" style=\"font-size: 1px; line-height: 68px;\" height=\"68\">&nbsp;</td>\n</tr>\n</tbody>\n</table>\n</td>\n</tr>\n</tbody>\n</table>\n<!-- End Module 2 - Text block --> <!-- Module 9 - 3 columns with icon and text -->\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\n<tbody>\n<tr>\n<td class=\"color-bg\" style=\"background-color: #cf9e2a; padding: 0px 10px;\" align=\"center\">\n<table class=\"container\" style=\"width: 640px;\" border=\"0\" width=\"640\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\n<tbody>\n<tr>\n<td class=\"space\" style=\"font-size: 1px; line-height: 40px;\" height=\"40\">&nbsp;</td>\n</tr>\n<tr>\n<td class=\"space\" style=\"font-size: 1px; line-height: 16px;\" height=\"16\">&nbsp;</td>\n</tr>\n<tr><!-- content -->\n<td class=\"h2\" style=\"color: #ffffff; font-family: \'Lato\', Arial, sans-serif; text-align: center;\">Prosperis Gold is your Thrifting and Savings Partner.</td>\n</tr>\n<tr>\n<td class=\"space\" style=\"font-size: 1px; line-height: 33px;\" height=\"33\">&nbsp;</td>\n</tr>\n<tr>\n<td>\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\n<tbody>\n<tr>\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 200px;\" align=\"left\" width=\"200\"><!-- column 1 -->\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\n<tbody>\n<tr><!-- icon -->\n<td class=\"icon\" style=\"border-collapse: collapse; font-size: 0; line-height: 1;\" align=\"center\"><img style=\"border: none; display: block;\" src=\"https://s3.us-east-2.amazonaws.com/obs-emailer/prosperis/ico-result1.png\" alt=\"\" width=\"66\" /></td>\n</tr>\n<tr>\n<td class=\"space\" style=\"font-size: 1px; line-height: 15px;\" height=\"15\">&nbsp;</td>\n</tr>\n<tr>\n<td class=\"text\" style=\"color: #ffffff; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 24px; text-align: center;\">Build your wealth and gain the discipline required to save and grow your money. We provide powerful tools to manage thrifts.</td>\n</tr>\n</tbody>\n</table>\n<!-- end column 1 --></th>\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 20px; height: 32px;\" width=\"20\" height=\"32\">&nbsp;</th>\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 200px;\" align=\"left\" width=\"200\"><!-- column 2 -->\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\n<tbody>\n<tr><!-- icon -->\n<td class=\"icon\" style=\"border-collapse: collapse; font-size: 0; line-height: 1;\" align=\"center\"><img style=\"border: none; display: block;\" src=\"https://s3.us-east-2.amazonaws.com/obs-emailer/prosperis/ico-result2.png\" alt=\"\" width=\"66\" /></td>\n</tr>\n<tr>\n<td class=\"space\" style=\"font-size: 1px; line-height: 15px;\" height=\"15\">&nbsp;</td>\n</tr>\n<tr>\n<td class=\"text\" style=\"color: #ffffff; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 24px; text-align: center;\">Manage your thrfting and savings portfolio from the ease of your home or office. Track progress and stay informed.</td>\n</tr>\n</tbody>\n</table>\n<!-- end column 2 --></th>\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 20px; height: 32px;\" width=\"20\" height=\"32\">&nbsp;</th>\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 200px;\" align=\"left\" width=\"200\"><!-- column 3 -->\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\n<tbody>\n<tr><!-- icon -->\n<td class=\"icon\" style=\"border-collapse: collapse; font-size: 0; line-height: 1;\" align=\"center\"><img style=\"border: none; display: block;\" src=\"https://s3.us-east-2.amazonaws.com/obs-emailer/prosperis/ico-result3.png\" alt=\"\" width=\"66\" /></td>\n</tr>\n<tr>\n<td class=\"space\" style=\"font-size: 1px; line-height: 15px;\" height=\"15\">&nbsp;</td>\n</tr>\n<tr>\n<td class=\"text\" style=\"color: #ffffff; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 24px; text-align: center;\">Collaborate and thrift with friends and colleagues in a safe and secure environment. Transparency&nbsp;on all levels.</td>\n</tr>\n</tbody>\n</table>\n<!-- end column 3 --></th>\n</tr>\n<tr>\n<td class=\"space\" style=\"font-size: 1px; line-height: 34px;\" colspan=\"5\" height=\"34\">&nbsp;</td>\n</tr>\n</tbody>\n</table>\n</td>\n</tr>\n<tr>\n<td align=\"center\"><!-- button -->\n<table class=\"btn1\" style=\"min-width: 160px;\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\n<tbody>\n<tr>\n<td style=\"border-radius: 20px; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 1; padding: 12px 27px 12px; text-align: center; border: 1px solid #ffffff; color: #ffffff;\"><a style=\"color: #ffffff;\" href=\"https://thrift.prosperisgold.com\">MY ACCOUNT</a></td>\n</tr>\n</tbody>\n</table>\n<!-- end button --></td>\n</tr>\n<tr>\n<td class=\"space\" style=\"font-size: 1px; line-height: 70px;\" height=\"70\">&nbsp;</td>\n</tr>\n</tbody>\n</table>\n</td>\n</tr>\n</tbody>\n</table>\n<!-- End Module 9 - 3 columns with icon and text --> <!-- Module 29 - Contacts -->\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\n<tbody>\n<tr>\n<td style=\"background-color: #f7f7f7; padding: 0 10px;\" align=\"center\">\n<table class=\"container\" style=\"width: 640px;\" border=\"0\" width=\"640\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\n<tbody>\n<tr>\n<td class=\"space\" style=\"font-size: 1px; line-height: 40px;\" height=\"40\">&nbsp;</td>\n</tr>\n<tr>\n<td align=\"center\">\n<table class=\"title-center\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\n<tbody>\n<tr><!-- title -->\n<td class=\"h2\" style=\"font-family: \'Playfair Display\', Cambria, Georgia, serif; line-height: 1.13; color: #828386; font-size: 32px; font-weight: 900; padding: 10px 30px; text-align: center;\"><span style=\"font-size: 22px;\">Let\'s Help You Prosper!</span></td>\n<!-- end title --></tr>\n</tbody>\n</table>\n</td>\n</tr>\n<tr>\n<td class=\"space\" style=\"font-size: 1px; line-height: 16px;\" height=\"16\">&nbsp;</td>\n</tr>\n<tr><!-- content -->\n<td class=\"text-center\" style=\"color: #666666; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 24px; text-align: center;\">Evolving the way the world thrifts. We make thrifting and saving easy!</td>\n</tr>\n<tr>\n<td class=\"space\" style=\"font-size: 1px; line-height: 33px;\" height=\"33\">&nbsp;</td>\n</tr>\n<tr>\n<td>\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\n<tbody>\n<tr>\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 200px;\" align=\"left\" width=\"200\">\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">\n<tbody>\n<tr><!-- image -->\n<td class=\"logo\" style=\"border-collapse: collapse; font-size: 0; line-height: 1;\"><img style=\"border: none; display: block;\" src=\"https://s3.us-east-2.amazonaws.com/obs-emailer/prosperis/properisgold_logo_40.png\" alt=\"Prosperis Gold\" width=\"140\" /></td>\n<!-- end image --></tr>\n<tr>\n<td class=\"space\" style=\"font-size: 1px; line-height: 12px;\" height=\"12\">&nbsp;</td>\n</tr>\n<tr><!-- content -->\n<td class=\"text\" style=\"color: #666666; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 24px;\">With modern financial technology, Prosperis Gold blends accountability, discipline, and transparency in our services to help you develop healthy saving habits.</td>\n</tr>\n</tbody>\n</table>\n</th>\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 20px; height: 20px;\" width=\"20\" height=\"20\">&nbsp;</th>\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 200px;\" align=\"left\" width=\"200\">\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">\n<tbody>\n<tr><!-- image -->\n<td class=\"img\" style=\"border-collapse: collapse; font-size: 0; line-height: 1;\" align=\"center\"><img style=\"border: none; display: block;\" src=\"https://s3.us-east-2.amazonaws.com/obs-emailer/prosperis/pg-lady-banner01-400.jpg\" alt=\"Prosperis Gold\" width=\"200\" /></td>\n<!-- end image --></tr>\n</tbody>\n</table>\n</th>\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 20px; height: 20px;\" width=\"20\" height=\"20\">&nbsp;</th>\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 200px;\" align=\"left\" width=\"200\">\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">\n<tbody>\n<tr><!-- title -->\n<td class=\"h6\" style=\"font-family: \'Playfair Display\', Cambria, Georgia, serif; line-height: 1; color: #828386; font-size: 20px; font-weight: 900;\">Contact&nbsp;Us</td>\n<!-- end title --></tr>\n<tr>\n<td class=\"space\" style=\"font-size: 1px; line-height: 12px;\" height=\"12\">&nbsp;</td>\n</tr>\n<tr><!-- content -->\n<td class=\"text\" style=\"color: #666666; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 24px;\">\n<p>40B Awori Road,</p>\n<p>Dolphine Estate, Ikoyi</p>\n<p>Lagos, NIGERIA</p>\n</td>\n</tr>\n<tr>\n<td class=\"space\" style=\"font-size: 1px; line-height: 4px;\" height=\"4\">&nbsp;</td>\n</tr>\n<tr><!-- content -->\n<td class=\"text\" style=\"color: #666666; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 24px;\"><a style=\"color: #666666; text-decoration: none;\" href=\"#\">+234 (907) 662 9963</a><br /> <a style=\"color: #666666; text-decoration: none;\" href=\"mailto:info@prosperisgold.com\">info@prosperisgold.com</a><br /> <a style=\"color: #666666; text-decoration: none;\" href=\"https://www.prosperisgold.com\">www.prosperisgold.com</a></td>\n</tr>\n<tr>\n<td class=\"space\" style=\"font-size: 1px; line-height: 10px;\" height=\"10\">&nbsp;</td>\n</tr>\n<tr>\n<td><!-- social icons -->\n<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n<tbody>\n<tr>\n<td class=\"icon\" style=\"border-collapse: collapse; font-size: 0; line-height: 1;\"><a href=\"http://www.instagram.com/prosperisgold\"><img style=\"border: none; display: block;\" src=\"https://s3.us-east-2.amazonaws.com/obs-emailer/prosperis/ico-instagram-gold.png\" alt=\"Instagram\" width=\"18\" /></a></td>\n<td class=\"space\" style=\"font-size: 1px; line-height: 1px; width: 20px;\" width=\"20\">&nbsp;</td>\n<td class=\"icon\" style=\"border-collapse: collapse; font-size: 0; line-height: 1;\"><a href=\"http://www.facebook.com/prosperisgold\"><img style=\"border: none; display: block;\" src=\"https://s3.us-east-2.amazonaws.com/obs-emailer/prosperis/ico-facebook-gold.png\" alt=\"Facebook\" width=\"18\" /></a></td>\n<td class=\"space\" style=\"font-size: 1px; line-height: 1px; width: 20px;\" width=\"20\">&nbsp;</td>\n<td class=\"icon\" style=\"border-collapse: collapse; font-size: 0; line-height: 1;\"><a href=\"http://www.twitter.com/prosperisgold\"><img style=\"border: none; display: block;\" src=\"https://s3.us-east-2.amazonaws.com/obs-emailer/prosperis/ico-twitter-gold.png\" alt=\"Twitter\" width=\"18\" /></a></td>\n<td class=\"space\" style=\"font-size: 1px; line-height: 1px; width: 20px;\" width=\"20\">&nbsp;</td>\n<td class=\"icon\" style=\"border-collapse: collapse; font-size: 0; line-height: 1;\"><a href=\"http://www.linkeding.com/prosperisgold\"><img style=\"border: none; display: block;\" src=\"https://s3.us-east-2.amazonaws.com/obs-emailer/prosperis/ico-linkedin-gold.png\" alt=\"LinkedIn\" width=\"18\" /></a></td>\n<td class=\"space\" style=\"font-size: 1px; line-height: 1px; width: 20px;\" width=\"20\">&nbsp;</td>\n<td class=\"icon\" style=\"border-collapse: collapse; font-size: 0; line-height: 1;\">&nbsp;</td>\n</tr>\n</tbody>\n</table>\n<!-- end social icons --></td>\n</tr>\n</tbody>\n</table>\n</th>\n</tr>\n</tbody>\n</table>\n</td>\n</tr>\n<tr>\n<td class=\"space\" style=\"font-size: 1px; line-height: 68px;\" height=\"68\">&nbsp;</td>\n</tr>\n</tbody>\n</table>\n</td>\n</tr>\n</tbody>\n</table>\n<!-- End Module 29 - Contacts --></td>\n</tr>\n<tr>\n<td><!-- Footer -->\n<table class=\"footer\" border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\n<tbody>\n<tr>\n<td style=\"background-color: #ececec; padding: 0 10px;\" align=\"center\">\n<table class=\"container\" style=\"width: 640px;\" border=\"0\" width=\"640\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\"><!-- Spacer -->\n<tbody>\n<tr>\n<td class=\"space\" style=\"font-size: 1px; line-height: 20px;\" height=\"20\">&nbsp;</td>\n</tr>\n<!-- End Spacer -->\n<tr>\n<td>\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\n<tbody>\n<tr>\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 300px;\" align=\"left\" width=\"300\"><!-- Copyright -->\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\n<tbody>\n<tr>\n<td class=\"text\" style=\"color: #2e2a41; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 22px;\">Copyright &copy; 2018&nbsp;Prosperis Gold</td>\n</tr>\n</tbody>\n</table>\n</th>\n<th class=\"col height-0\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 40px; line-height: 10px;\" align=\"left\" width=\"40\" height=\"10\">&nbsp;</th>\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 300px;\" align=\"left\" width=\"300\"><!-- Unsubscribe -->\n<table class=\"full\" border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">\n<tbody>\n<tr>\n<td class=\"text\" style=\"color: #2e2a41; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 22px; text-align: right;\"><a href=\"http://www.prosperisgold.com\">www.prosperisgold.com</a></td>\n</tr>\n</tbody>\n</table>\n</th>\n</tr>\n</tbody>\n</table>\n</td>\n</tr>\n<!-- Spacer -->\n<tr>\n<td class=\"space\" style=\"font-size: 1px; line-height: 20px;\" height=\"20\">&nbsp;</td>\n</tr>\n<!-- End Spacer --></tbody>\n</table>\n</td>\n</tr>\n</tbody>\n</table>\n<!-- End Footer --></td>\n</tr>\n</tbody>\n</table>\n<!-- [if (gte mso 9)|(IE)]>     </td>     </tr>     </table>     <![endif]--></td>\n</tr>\n</tbody>\n</table>'),
(2, 'thrift_invitation', 'New Thrift Invitation', '<!-- [if gte mso 9]>   <style type=\"text/css\">     body, table, tr, td, h1, h2, h3, h4, h5, h6, ul, li, ol, dl, dd, dt {       font-family: Helvetica, Arial, sans-serif !important;     }     .h1, .h2 { font-family: Cambria, Georgia, serif !important; }     .h2 { line-height: 94% !important;  }     .link  { line-height: 100% !important; }   </style>   <![endif]--><!-- [if gte mso 9]><xml>   <o:OfficeDocumentSettings>     <o:AllowPNG/>     <o:PixelsPerInch>96</o:PixelsPerInch>   </o:OfficeDocumentSettings> </xml><![endif]-->\n<table style=\"background-color: #ececec;\" border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\n<tbody>\n<tr>\n<td align=\"center\"><!-- [if (gte mso 9)|(IE)]>     <table width=\"800\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"width: 800px;\">       <tr>         <td valign=\"top\">     <![endif]-->\n<table class=\"main\" style=\"max-width: 800px; min-width: 680px;\" border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\n<tbody>\n<tr>\n<td class=\"layouts-here\" align=\"left\"><!-- Module 2 - Text block -->\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\n<tbody>\n<tr>\n<td style=\"background-color: #ffffff; padding: 0 10px;\" align=\"center\">\n<table class=\"container\" style=\"width: 640px;\" border=\"0\" width=\"640\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\n<tbody>\n<tr>\n<td class=\"space\" style=\"font-size: 1px; line-height: 40px;\" height=\"40\">&nbsp;</td>\n</tr>\n<tr>\n<td align=\"center\"><img style=\"border: none; display: block;\" src=\"https://s3.us-east-2.amazonaws.com/obs-emailer/prosperis/properisgold_logo_75.png\" alt=\"Prosperis Gold\" width=\"280\" /></td>\n</tr>\n<tr>\n<td class=\"space\" style=\"font-size: 1px; line-height: 22px;\" height=\"22\">&nbsp;</td>\n</tr>\n</tbody>\n</table>\n</td>\n</tr>\n</tbody>\n</table>\n<!-- End Module 2 - Text block --> <!-- Module 2 - Text block -->\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\n<tbody>\n<tr>\n<td style=\"background-color: #ffffff; padding: 0 10px;\" align=\"center\">\n<table class=\"container\" style=\"width: 640px;\" border=\"0\" width=\"640\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\n<tbody>\n<tr>\n<td align=\"center\">\n<table class=\"title-center\" style=\"background-position: right center; background-repeat: no-repeat; background-image: url(\'\\\'\\\'\');\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\n<tbody>\n<tr><!-- title -->\n<td class=\"h2\" style=\"font-family: \'Playfair Display\', Cambria, Georgia, serif; line-height: 1.13; color: #828386; font-size: 32px; font-weight: 900; padding: 10px 30px; text-align: center;\"><span style=\"font-family: Arial, sans-serif; font-size: 18px;\"><strong>You Have A Thrift Invitation</strong></span></td>\n<!-- end title --></tr>\n</tbody>\n</table>\n</td>\n</tr>\n<tr>\n<td class=\"space\" style=\"font-size: 1px; line-height: 16px;\" height=\"16\">&nbsp;</td>\n</tr>\n<tr>\n<td class=\"text-left\" style=\"color: #666666; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 24px; text-align: left;\">\n<p><strong>Dear {{username}}:</strong></p>\n</td>\n</tr>\n<tr>\n<td class=\"space\" style=\"font-size: 1px; line-height: 16px;\" height=\"16\">&nbsp;</td>\n</tr>\n<tr>\n<td class=\"text-left\" style=\"color: #666666; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 24px; text-align: left;\">\n<p>You have been invited to join a thrift on Prosperis Gold.&nbsp; Please click on the following link to view and either accept or reject the invitation.</p>\n</td>\n</tr>\n<tr>\n<td class=\"space\" style=\"font-size: 1px; line-height: 22px;\" height=\"22\">&nbsp;</td>\n</tr>\n<tr>\n<td align=\"center\">\n<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\n<tbody>\n<tr><!-- link -->\n<td class=\"link\" style=\"color: #cf9e2a; font-family: Lato, Arial, sans-serif; font-size: 14px; line-height: 1;\"><strong><span style=\"font-size: 20px;\"><a style=\"color: #cf9e2a; text-decoration: none;\" href=\"{{actual_link}}\">View Your Invitation Securely Here</a></span></strong></td>\n<td class=\"space\" style=\"font-size: 1px; line-height: 14px;\" width=\"7\">&nbsp;</td>\n<!-- icon -->\n<td class=\"icon\" style=\"border-collapse: collapse; font-size: 0; line-height: 1; width: 11px;\" width=\"11\">&nbsp;</td>\n</tr>\n</tbody>\n</table>\n</td>\n</tr>\n<tr>\n<td class=\"space\" style=\"font-size: 1px; line-height: 28px;\" height=\"28\">&nbsp;</td>\n</tr>\n<tr>\n<td class=\"text-left\" style=\"color: #666666; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 24px; text-align: left;\">\n<p><em>To Your Prosperity,</em></p>\n</td>\n</tr>\n<tr>\n<td class=\"space\" style=\"font-size: 1px; line-height: 8px;\" height=\"8\">&nbsp;</td>\n</tr>\n<tr>\n<td class=\"text-left\" style=\"color: #666666; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 24px; text-align: left;\">\n<p><strong>The Prosperis Gold Team</strong></p>\n</td>\n</tr>\n<tr>\n<td class=\"space\" style=\"font-size: 1px; line-height: 68px;\" height=\"68\">&nbsp;</td>\n</tr>\n</tbody>\n</table>\n</td>\n</tr>\n</tbody>\n</table>\n<!-- End Module 2 - Text block --> <!-- Module 9 - 3 columns with icon and text -->\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\n<tbody>\n<tr>\n<td class=\"color-bg\" style=\"background-color: #cf9e2a; padding: 0px 10px;\" align=\"center\">\n<table class=\"container\" style=\"width: 640px;\" border=\"0\" width=\"640\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\n<tbody>\n<tr>\n<td class=\"space\" style=\"font-size: 1px; line-height: 40px;\" height=\"40\">&nbsp;</td>\n</tr>\n<tr>\n<td class=\"space\" style=\"font-size: 1px; line-height: 16px;\" height=\"16\">&nbsp;</td>\n</tr>\n<tr><!-- content -->\n<td class=\"h2\" style=\"color: #ffffff; font-family: \'Lato\', Arial, sans-serif; text-align: center;\">Prosperis Gold is your Thrifting and Savings Partner.</td>\n</tr>\n<tr>\n<td class=\"space\" style=\"font-size: 1px; line-height: 33px;\" height=\"33\">&nbsp;</td>\n</tr>\n<tr>\n<td>\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\n<tbody>\n<tr>\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 200px;\" align=\"left\" width=\"200\"><!-- column 1 -->\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\n<tbody>\n<tr><!-- icon -->\n<td class=\"icon\" style=\"border-collapse: collapse; font-size: 0; line-height: 1;\" align=\"center\"><img style=\"border: none; display: block;\" src=\"https://s3.us-east-2.amazonaws.com/obs-emailer/prosperis/ico-result1.png\" alt=\"\" width=\"66\" /></td>\n</tr>\n<tr>\n<td class=\"space\" style=\"font-size: 1px; line-height: 15px;\" height=\"15\">&nbsp;</td>\n</tr>\n<tr>\n<td class=\"text\" style=\"color: #ffffff; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 24px; text-align: center;\">Build your wealth and gain the discipline required to save and grow your money. We provide powerful tools to manage thrifts.</td>\n</tr>\n</tbody>\n</table>\n<!-- end column 1 --></th>\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 20px; height: 32px;\" width=\"20\" height=\"32\">&nbsp;</th>\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 200px;\" align=\"left\" width=\"200\"><!-- column 2 -->\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\n<tbody>\n<tr><!-- icon -->\n<td class=\"icon\" style=\"border-collapse: collapse; font-size: 0; line-height: 1;\" align=\"center\"><img style=\"border: none; display: block;\" src=\"https://s3.us-east-2.amazonaws.com/obs-emailer/prosperis/ico-result2.png\" alt=\"\" width=\"66\" /></td>\n</tr>\n<tr>\n<td class=\"space\" style=\"font-size: 1px; line-height: 15px;\" height=\"15\">&nbsp;</td>\n</tr>\n<tr>\n<td class=\"text\" style=\"color: #ffffff; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 24px; text-align: center;\">Manage your thrfting and savings portfolio from the ease of your home or office. Track progress and stay informed.</td>\n</tr>\n</tbody>\n</table>\n<!-- end column 2 --></th>\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 20px; height: 32px;\" width=\"20\" height=\"32\">&nbsp;</th>\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 200px;\" align=\"left\" width=\"200\"><!-- column 3 -->\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\n<tbody>\n<tr><!-- icon -->\n<td class=\"icon\" style=\"border-collapse: collapse; font-size: 0; line-height: 1;\" align=\"center\"><img style=\"border: none; display: block;\" src=\"https://s3.us-east-2.amazonaws.com/obs-emailer/prosperis/ico-result3.png\" alt=\"\" width=\"66\" /></td>\n</tr>\n<tr>\n<td class=\"space\" style=\"font-size: 1px; line-height: 15px;\" height=\"15\">&nbsp;</td>\n</tr>\n<tr>\n<td class=\"text\" style=\"color: #ffffff; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 24px; text-align: center;\">Collaborate and thrift with friends and colleagues in a safe and secure environment. Transparency&nbsp;on all levels.</td>\n</tr>\n</tbody>\n</table>\n<!-- end column 3 --></th>\n</tr>\n<tr>\n<td class=\"space\" style=\"font-size: 1px; line-height: 34px;\" colspan=\"5\" height=\"34\">&nbsp;</td>\n</tr>\n</tbody>\n</table>\n</td>\n</tr>\n<tr>\n<td align=\"center\"><!-- button -->\n<table class=\"btn1\" style=\"min-width: 160px;\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\n<tbody>\n<tr>\n<td style=\"border-radius: 20px; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 1; padding: 12px 27px 12px; text-align: center; border: 1px solid #ffffff; color: #ffffff;\"><a style=\"color: #ffffff;\" href=\"https://thrift.prosperisgold.com\">MY ACCOUNT</a></td>\n</tr>\n</tbody>\n</table>\n<!-- end button --></td>\n</tr>\n<tr>\n<td class=\"space\" style=\"font-size: 1px; line-height: 70px;\" height=\"70\">&nbsp;</td>\n</tr>\n</tbody>\n</table>\n</td>\n</tr>\n</tbody>\n</table>\n<!-- End Module 9 - 3 columns with icon and text --> <!-- Module 29 - Contacts -->\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\n<tbody>\n<tr>\n<td style=\"background-color: #f7f7f7; padding: 0 10px;\" align=\"center\">\n<table class=\"container\" style=\"width: 640px;\" border=\"0\" width=\"640\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\n<tbody>\n<tr>\n<td class=\"space\" style=\"font-size: 1px; line-height: 40px;\" height=\"40\">&nbsp;</td>\n</tr>\n<tr>\n<td align=\"center\">\n<table class=\"title-center\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\n<tbody>\n<tr><!-- title -->\n<td class=\"h2\" style=\"font-family: \'Playfair Display\', Cambria, Georgia, serif; line-height: 1.13; color: #828386; font-size: 32px; font-weight: 900; padding: 10px 30px; text-align: center;\"><span style=\"font-size: 22px;\">Let\'s Help You Prosper!</span></td>\n<!-- end title --></tr>\n</tbody>\n</table>\n</td>\n</tr>\n<tr>\n<td class=\"space\" style=\"font-size: 1px; line-height: 16px;\" height=\"16\">&nbsp;</td>\n</tr>\n<tr><!-- content -->\n<td class=\"text-center\" style=\"color: #666666; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 24px; text-align: center;\">Evolving the way the world thrifts. We make thrifting and saving easy!</td>\n</tr>\n<tr>\n<td class=\"space\" style=\"font-size: 1px; line-height: 33px;\" height=\"33\">&nbsp;</td>\n</tr>\n<tr>\n<td>\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\n<tbody>\n<tr>\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 200px;\" align=\"left\" width=\"200\">\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">\n<tbody>\n<tr><!-- image -->\n<td class=\"logo\" style=\"border-collapse: collapse; font-size: 0; line-height: 1;\"><img style=\"border: none; display: block;\" src=\"https://s3.us-east-2.amazonaws.com/obs-emailer/prosperis/properisgold_logo_40.png\" alt=\"Prosperis Gold\" width=\"140\" /></td>\n<!-- end image --></tr>\n<tr>\n<td class=\"space\" style=\"font-size: 1px; line-height: 12px;\" height=\"12\">&nbsp;</td>\n</tr>\n<tr><!-- content -->\n<td class=\"text\" style=\"color: #666666; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 24px;\">With modern financial technology, Prosperis Gold blends accountability, discipline, and transparency in our services to help you develop healthy saving habits.</td>\n</tr>\n</tbody>\n</table>\n</th>\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 20px; height: 20px;\" width=\"20\" height=\"20\">&nbsp;</th>\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 200px;\" align=\"left\" width=\"200\">\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">\n<tbody>\n<tr><!-- image -->\n<td class=\"img\" style=\"border-collapse: collapse; font-size: 0; line-height: 1;\" align=\"center\"><img style=\"border: none; display: block;\" src=\"https://s3.us-east-2.amazonaws.com/obs-emailer/prosperis/pg-lady-banner01-400.jpg\" alt=\"Prosperis Gold\" width=\"200\" /></td>\n<!-- end image --></tr>\n</tbody>\n</table>\n</th>\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 20px; height: 20px;\" width=\"20\" height=\"20\">&nbsp;</th>\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 200px;\" align=\"left\" width=\"200\">\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">\n<tbody>\n<tr><!-- title -->\n<td class=\"h6\" style=\"font-family: \'Playfair Display\', Cambria, Georgia, serif; line-height: 1; color: #828386; font-size: 20px; font-weight: 900;\">Contact&nbsp;Us</td>\n<!-- end title --></tr>\n<tr>\n<td class=\"space\" style=\"font-size: 1px; line-height: 12px;\" height=\"12\">&nbsp;</td>\n</tr>\n<tr><!-- content -->\n<td class=\"text\" style=\"color: #666666; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 24px;\">\n<p>40B Awori Road,</p>\n<p>Dolphine Estate, Ikoyi</p>\n<p>Lagos, NIGERIA</p>\n</td>\n</tr>\n<tr>\n<td class=\"space\" style=\"font-size: 1px; line-height: 4px;\" height=\"4\">&nbsp;</td>\n</tr>\n<tr><!-- content -->\n<td class=\"text\" style=\"color: #666666; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 24px;\"><a style=\"color: #666666; text-decoration: none;\" href=\"#\">+234 (907) 662 9963</a><br /> <a style=\"color: #666666; text-decoration: none;\" href=\"mailto:info@prosperisgold.com\">info@prosperisgold.com</a><br /> <a style=\"color: #666666; text-decoration: none;\" href=\"https://www.prosperisgold.com\">www.prosperisgold.com</a></td>\n</tr>\n<tr>\n<td class=\"space\" style=\"font-size: 1px; line-height: 10px;\" height=\"10\">&nbsp;</td>\n</tr>\n<tr>\n<td><!-- social icons -->\n<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n<tbody>\n<tr>\n<td class=\"icon\" style=\"border-collapse: collapse; font-size: 0; line-height: 1;\"><a href=\"http://www.instagram.com/prosperisgold\"><img style=\"border: none; display: block;\" src=\"https://s3.us-east-2.amazonaws.com/obs-emailer/prosperis/ico-instagram-gold.png\" alt=\"Instagram\" width=\"18\" /></a></td>\n<td class=\"space\" style=\"font-size: 1px; line-height: 1px; width: 20px;\" width=\"20\">&nbsp;</td>\n<td class=\"icon\" style=\"border-collapse: collapse; font-size: 0; line-height: 1;\"><a href=\"http://www.facebook.com/prosperisgold\"><img style=\"border: none; display: block;\" src=\"https://s3.us-east-2.amazonaws.com/obs-emailer/prosperis/ico-facebook-gold.png\" alt=\"Facebook\" width=\"18\" /></a></td>\n<td class=\"space\" style=\"font-size: 1px; line-height: 1px; width: 20px;\" width=\"20\">&nbsp;</td>\n<td class=\"icon\" style=\"border-collapse: collapse; font-size: 0; line-height: 1;\"><a href=\"http://www.twitter.com/prosperisgold\"><img style=\"border: none; display: block;\" src=\"https://s3.us-east-2.amazonaws.com/obs-emailer/prosperis/ico-twitter-gold.png\" alt=\"Twitter\" width=\"18\" /></a></td>\n<td class=\"space\" style=\"font-size: 1px; line-height: 1px; width: 20px;\" width=\"20\">&nbsp;</td>\n<td class=\"icon\" style=\"border-collapse: collapse; font-size: 0; line-height: 1;\"><a href=\"http://www.linkeding.com/prosperisgold\"><img style=\"border: none; display: block;\" src=\"https://s3.us-east-2.amazonaws.com/obs-emailer/prosperis/ico-linkedin-gold.png\" alt=\"LinkedIn\" width=\"18\" /></a></td>\n<td class=\"space\" style=\"font-size: 1px; line-height: 1px; width: 20px;\" width=\"20\">&nbsp;</td>\n<td class=\"icon\" style=\"border-collapse: collapse; font-size: 0; line-height: 1;\">&nbsp;</td>\n</tr>\n</tbody>\n</table>\n<!-- end social icons --></td>\n</tr>\n</tbody>\n</table>\n</th>\n</tr>\n</tbody>\n</table>\n</td>\n</tr>\n<tr>\n<td class=\"space\" style=\"font-size: 1px; line-height: 68px;\" height=\"68\">&nbsp;</td>\n</tr>\n</tbody>\n</table>\n</td>\n</tr>\n</tbody>\n</table>\n<!-- End Module 29 - Contacts --></td>\n</tr>\n<tr>\n<td><!-- Footer -->\n<table class=\"footer\" border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\n<tbody>\n<tr>\n<td style=\"background-color: #ececec; padding: 0 10px;\" align=\"center\">\n<table class=\"container\" style=\"width: 640px;\" border=\"0\" width=\"640\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\"><!-- Spacer -->\n<tbody>\n<tr>\n<td class=\"space\" style=\"font-size: 1px; line-height: 20px;\" height=\"20\">&nbsp;</td>\n</tr>\n<!-- End Spacer -->\n<tr>\n<td>\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\n<tbody>\n<tr>\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 300px;\" align=\"left\" width=\"300\"><!-- Copyright -->\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\n<tbody>\n<tr>\n<td class=\"text\" style=\"color: #2e2a41; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 22px;\">Copyright &copy; 2018&nbsp;Prosperis Gold</td>\n</tr>\n</tbody>\n</table>\n</th>\n<th class=\"col height-0\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 40px; line-height: 10px;\" align=\"left\" width=\"40\" height=\"10\">&nbsp;</th>\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 300px;\" align=\"left\" width=\"300\"><!-- Unsubscribe -->\n<table class=\"full\" border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">\n<tbody>\n<tr>\n<td class=\"text\" style=\"color: #2e2a41; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 22px; text-align: right;\"><a href=\"http://www.prosperisgold.com\">www.prosperisgold.com</a></td>\n</tr>\n</tbody>\n</table>\n</th>\n</tr>\n</tbody>\n</table>\n</td>\n</tr>\n<!-- Spacer -->\n<tr>\n<td class=\"space\" style=\"font-size: 1px; line-height: 20px;\" height=\"20\">&nbsp;</td>\n</tr>\n<!-- End Spacer --></tbody>\n</table>\n</td>\n</tr>\n</tbody>\n</table>\n<!-- End Footer --></td>\n</tr>\n</tbody>\n</table>\n<!-- [if (gte mso 9)|(IE)]>     </td>     </tr>     </table>     <![endif]--></td>\n</tr>\n</tbody>\n</table>');
INSERT INTO `tbl_email_template` (`email_template_id`, `email_template_type`, `email_template_subject`, `email_template`) VALUES
(11, 'forgot_password', 'Please Create Your Password', '<!-- [if gte mso 9]>   <style type=\"text/css\">     body, table, tr, td, h1, h2, h3, h4, h5, h6, ul, li, ol, dl, dd, dt {       font-family: Helvetica, Arial, sans-serif !important;     }     .h1, .h2 { font-family: Cambria, Georgia, serif !important; }     .h2 { line-height: 94% !important;  }     .link  { line-height: 100% !important; }   </style>   <![endif]--><!-- [if gte mso 9]><xml>   <o:OfficeDocumentSettings>     <o:AllowPNG/>     <o:PixelsPerInch>96</o:PixelsPerInch>   </o:OfficeDocumentSettings> </xml><![endif]-->\r\n<table style=\"background-color: #ececec;\" border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td align=\"center\"><!-- [if (gte mso 9)|(IE)]>     <table width=\"800\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"width: 800px;\">       <tr>         <td valign=\"top\">     <![endif]-->\r\n<table class=\"main\" style=\"max-width: 800px; min-width: 680px;\" border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td class=\"layouts-here\" align=\"left\"><!-- Module 2 - Text block -->\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td style=\"background-color: #ffffff; padding: 0 10px;\" align=\"center\">\r\n<table class=\"container\" style=\"width: 640px;\" border=\"0\" width=\"640\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 40px;\" height=\"40\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td align=\"center\"><img src=\"https://d4zd5125vr4p3.cloudfront.net/images/6245ac6679c79.png\" alt=\"Prosperis Gold\" width=\"157\" height=\"106\" /></td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 22px;\" height=\"22\">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<!-- End Module 2 - Text block --> <!-- Module 2 - Text block -->\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td style=\"background-color: #ffffff; padding: 0 10px;\" align=\"center\">\r\n<table class=\"container\" style=\"width: 640px;\" border=\"0\" width=\"640\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td align=\"center\">\r\n<table class=\"title-center\" style=\"background-position: right center; background-repeat: no-repeat; background-image: url(\'\\\'\\\'\');\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr><!-- title -->\r\n<td class=\"h2\" style=\"font-family: \'Playfair Display\', Cambria, Georgia, serif; line-height: 1.13; color: #828386; font-size: 32px; font-weight: 900; padding: 10px 30px; text-align: center;\"><span style=\"font-family: Arial, sans-serif; font-size: 18px;\"><strong>Please Create Your Password</strong></span></td>\r\n<!-- end title --></tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 16px;\" height=\"16\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"text-left\" style=\"color: #666666; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 24px; text-align: left;\">\r\n<p><strong>Dear {{username}}:</strong></p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 16px;\" height=\"16\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"text-left\" style=\"color: #666666; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 24px; text-align: left;\">\r\n<p>You have received this email because you need to create a new password for your account, {{identity}}. Please click&nbsp; the following link to set your new password.</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 22px;\" height=\"22\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td align=\"center\">\r\n<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr><!-- link -->\r\n<td class=\"link\" style=\"color: #cf9e2a; font-family: Lato, Arial, sans-serif; font-size: 14px; line-height: 1;\"><strong><span style=\"font-size: 20px;\"><a style=\"color: #cf9e2a; text-decoration: none;\" href=\"{{actual_link}}\">Click Here to Set Your New Password</a></span></strong></td>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 14px;\" width=\"7\">&nbsp;</td>\r\n<!-- icon -->\r\n<td class=\"icon\" style=\"border-collapse: collapse; font-size: 0; line-height: 1; width: 11px;\" width=\"11\">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 28px;\" height=\"28\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"text-left\" style=\"color: #666666; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 24px; text-align: left;\">\r\n<p><em>To Your Prosperity,</em></p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 8px;\" height=\"8\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"text-left\" style=\"color: #666666; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 24px; text-align: left;\">\r\n<p><strong>The Thrift2win Team</strong></p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 68px;\" height=\"68\">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<!-- End Module 2 - Text block --> <!-- Module 9 - 3 columns with icon and text -->\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td class=\"color-bg\" style=\"background-color: #cf9e2a; padding: 0px 10px;\" align=\"center\">\r\n<table class=\"container\" style=\"width: 640px;\" border=\"0\" width=\"640\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 40px;\" height=\"40\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 16px;\" height=\"16\">&nbsp;</td>\r\n</tr>\r\n<tr><!-- content -->\r\n<td class=\"h2\" style=\"color: #ffffff; font-family: \'Lato\', Arial, sans-serif; text-align: center;\">Thrift2win is your Thrifting and Savings Partner.</td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 33px;\" height=\"33\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 200px;\" align=\"left\" width=\"200\"><!-- column 1 -->\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr><!-- icon -->\r\n<td class=\"icon\" style=\"border-collapse: collapse; font-size: 0; line-height: 1;\" align=\"center\"><img style=\"border: none; display: block;\" src=\"https://s3.us-east-2.amazonaws.com/obs-emailer/prosperis/ico-result1.png\" alt=\"\" width=\"66\" /></td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 15px;\" height=\"15\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"text\" style=\"color: #ffffff; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 24px; text-align: center;\">Build your wealth and gain the discipline required to save and grow your money. We provide powerful tools to manage thrifts.</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<!-- end column 1 --></th>\r\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 20px; height: 32px;\" width=\"20\" height=\"32\">&nbsp;</th>\r\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 200px;\" align=\"left\" width=\"200\"><!-- column 2 -->\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr><!-- icon -->\r\n<td class=\"icon\" style=\"border-collapse: collapse; font-size: 0; line-height: 1;\" align=\"center\"><img style=\"border: none; display: block;\" src=\"https://s3.us-east-2.amazonaws.com/obs-emailer/prosperis/ico-result2.png\" alt=\"\" width=\"66\" /></td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 15px;\" height=\"15\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"text\" style=\"color: #ffffff; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 24px; text-align: center;\">Manage your thrfting and savings portfolio from the ease of your home or office. Track progress and stay informed.</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<!-- end column 2 --></th>\r\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 20px; height: 32px;\" width=\"20\" height=\"32\">&nbsp;</th>\r\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 200px;\" align=\"left\" width=\"200\"><!-- column 3 -->\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr><!-- icon -->\r\n<td class=\"icon\" style=\"border-collapse: collapse; font-size: 0; line-height: 1;\" align=\"center\"><img style=\"border: none; display: block;\" src=\"https://s3.us-east-2.amazonaws.com/obs-emailer/prosperis/ico-result3.png\" alt=\"\" width=\"66\" /></td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 15px;\" height=\"15\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"text\" style=\"color: #ffffff; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 24px; text-align: center;\">Collaborate and thrift with friends and colleagues in a safe and secure environment. Transparency&nbsp;on all levels.</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<!-- end column 3 --></th>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 34px;\" colspan=\"5\" height=\"34\">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td align=\"center\"><!-- button -->\r\n<table class=\"btn1\" style=\"min-width: 160px;\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td style=\"border-radius: 20px; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 1; padding: 12px 27px 12px; text-align: center; border: 1px solid #ffffff; color: #ffffff;\"><a style=\"color: #ffffff;\" href=\"https://thrift.prosperisgold.com\">MY ACCOUNT</a></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<!-- end button --></td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 70px;\" height=\"70\">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<!-- End Module 9 - 3 columns with icon and text --> <!-- Module 29 - Contacts -->\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td style=\"background-color: #f7f7f7; padding: 0 10px;\" align=\"center\">\r\n<table class=\"container\" style=\"width: 640px;\" border=\"0\" width=\"640\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 40px;\" height=\"40\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td align=\"center\">\r\n<table class=\"title-center\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr><!-- title -->\r\n<td class=\"h2\" style=\"font-family: \'Playfair Display\', Cambria, Georgia, serif; line-height: 1.13; color: #828386; font-size: 32px; font-weight: 900; padding: 10px 30px; text-align: center;\"><span style=\"font-size: 22px;\">Let\'s Help You Prosper!</span></td>\r\n<!-- end title --></tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 16px;\" height=\"16\">&nbsp;</td>\r\n</tr>\r\n<tr><!-- content -->\r\n<td class=\"text-center\" style=\"color: #666666; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 24px; text-align: center;\">Evolving the way the world thrifts. We make thrifting and saving easy!</td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 33px;\" height=\"33\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 200px;\" align=\"left\" width=\"200\">\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr><!-- image -->\r\n<td class=\"logo\" style=\"border-collapse: collapse; font-size: 0; line-height: 1;\"><img src=\"https://d4zd5125vr4p3.cloudfront.net/images/6245ac6679c79.png\" alt=\"Prosperis Gold\" width=\"157\" height=\"106\" /></td>\r\n<!-- end image --></tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 12px;\" height=\"12\">&nbsp;</td>\r\n</tr>\r\n<tr><!-- content -->\r\n<td class=\"text\" style=\"color: #666666; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 24px;\">With modern financial technology, Thrift2win blends accountability, discipline, and transparency in our services to help you develop healthy saving habits.</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</th>\r\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 20px; height: 20px;\" width=\"20\" height=\"20\">&nbsp;</th>\r\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 200px;\" align=\"left\" width=\"200\">\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr><!-- image -->\r\n<td class=\"img\" style=\"border-collapse: collapse; font-size: 0; line-height: 1;\" align=\"center\"><img style=\"border: none; display: block;\" src=\"https://s3.us-east-2.amazonaws.com/obs-emailer/prosperis/pg-lady-banner01-400.jpg\" alt=\"Prosperis Gold\" width=\"200\" /></td>\r\n<!-- end image --></tr>\r\n</tbody>\r\n</table>\r\n</th>\r\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 20px; height: 20px;\" width=\"20\" height=\"20\">&nbsp;</th>\r\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 200px;\" align=\"left\" width=\"200\">\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr><!-- title -->\r\n<td class=\"h6\" style=\"font-family: \'Playfair Display\', Cambria, Georgia, serif; line-height: 1; color: #828386; font-size: 20px; font-weight: 900;\">Contact&nbsp;Us</td>\r\n<!-- end title --></tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 12px;\" height=\"12\">&nbsp;</td>\r\n</tr>\r\n<tr><!-- content -->\r\n<td class=\"text\" style=\"color: #666666; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 24px;\">\r\n<p>40B Awori Road,</p>\r\n<p>Dolphine Estate, Ikoyi</p>\r\n<p>Lagos, NIGERIA</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 4px;\" height=\"4\">&nbsp;</td>\r\n</tr>\r\n<tr><!-- content -->\r\n<td class=\"text\" style=\"color: #666666; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 24px;\"><a style=\"color: #666666; text-decoration: none;\" href=\"#\">+234 (907) 662 9963</a><br /> <a style=\"color: #666666; text-decoration: none;\" href=\"mailto:info@prosperisgold.com\">info@</a><a style=\"color: #666666; text-decoration: none;\" href=\"https://www.prosperisgold.com\">thrift2win</a><a style=\"color: #666666; text-decoration: none;\" href=\"mailto:info@prosperisgold.com\">.com</a><br /> <a style=\"color: #666666; text-decoration: none;\" href=\"https://www.prosperisgold.com\">www.thrift2win.com</a></td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 10px;\" height=\"10\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td><!-- social icons -->\r\n<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr>\r\n<td class=\"icon\" style=\"border-collapse: collapse; font-size: 0; line-height: 1;\"><a href=\"http://www.instagram.com/prosperisgold\"><img style=\"border: none; display: block;\" src=\"https://s3.us-east-2.amazonaws.com/obs-emailer/prosperis/ico-instagram-gold.png\" alt=\"Instagram\" width=\"18\" /></a></td>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 1px; width: 20px;\" width=\"20\">&nbsp;</td>\r\n<td class=\"icon\" style=\"border-collapse: collapse; font-size: 0; line-height: 1;\"><a href=\"http://www.facebook.com/prosperisgold\"><img style=\"border: none; display: block;\" src=\"https://s3.us-east-2.amazonaws.com/obs-emailer/prosperis/ico-facebook-gold.png\" alt=\"Facebook\" width=\"18\" /></a></td>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 1px; width: 20px;\" width=\"20\">&nbsp;</td>\r\n<td class=\"icon\" style=\"border-collapse: collapse; font-size: 0; line-height: 1;\"><a href=\"http://www.twitter.com/prosperisgold\"><img style=\"border: none; display: block;\" src=\"https://s3.us-east-2.amazonaws.com/obs-emailer/prosperis/ico-twitter-gold.png\" alt=\"Twitter\" width=\"18\" /></a></td>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 1px; width: 20px;\" width=\"20\">&nbsp;</td>\r\n<td class=\"icon\" style=\"border-collapse: collapse; font-size: 0; line-height: 1;\"><a href=\"http://www.linkeding.com/prosperisgold\"><img style=\"border: none; display: block;\" src=\"https://s3.us-east-2.amazonaws.com/obs-emailer/prosperis/ico-linkedin-gold.png\" alt=\"LinkedIn\" width=\"18\" /></a></td>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 1px; width: 20px;\" width=\"20\">&nbsp;</td>\r\n<td class=\"icon\" style=\"border-collapse: collapse; font-size: 0; line-height: 1;\">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<!-- end social icons --></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</th>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 68px;\" height=\"68\">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<!-- End Module 29 - Contacts --></td>\r\n</tr>\r\n<tr>\r\n<td><!-- Footer -->\r\n<table class=\"footer\" border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td style=\"background-color: #ececec; padding: 0 10px;\" align=\"center\">\r\n<table class=\"container\" style=\"width: 640px;\" border=\"0\" width=\"640\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\"><!-- Spacer -->\r\n<tbody>\r\n<tr style=\"height: 20px;\">\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 20px; height: 20px;\" height=\"20\">&nbsp;</td>\r\n</tr>\r\n<!-- End Spacer -->\r\n<tr style=\"height: 30px;\">\r\n<td style=\"height: 30px;\">\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 300px;\" align=\"left\" width=\"300\"><!-- Copyright -->\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td class=\"text\" style=\"color: #2e2a41; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 22px;\">Copyright &copy; 2018&nbsp;Thrift2win</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</th>\r\n<th class=\"col height-0\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 40px; line-height: 10px;\" align=\"left\" width=\"40\" height=\"10\">&nbsp;</th>\r\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 300px;\" align=\"left\" width=\"300\"><!-- Unsubscribe -->\r\n<table class=\"full\" border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr>\r\n<td class=\"text\" style=\"color: #2e2a41; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 22px; text-align: right;\"><a href=\"http://www.prosperisgold.com\">www.</a><a style=\"color: #666666; text-decoration: none;\" href=\"https://www.prosperisgold.com\">thrift2win</a><a href=\"http://www.prosperisgold.com\">.com</a></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</th>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n<!-- Spacer -->\r\n<tr style=\"height: 20px;\">\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 20px; height: 20px;\" height=\"20\">&nbsp;</td>\r\n</tr>\r\n<!-- End Spacer --></tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<!-- End Footer --></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<!-- [if (gte mso 9)|(IE)]>     </td>     </tr>     </table>     <![endif]--></td>\r\n</tr>\r\n</tbody>\r\n</table>'),
(14, 'thrift_join', 'You Have Joined A Thrift', '<!-- [if gte mso 9]>   <style type=\"text/css\">     body, table, tr, td, h1, h2, h3, h4, h5, h6, ul, li, ol, dl, dd, dt {       font-family: Helvetica, Arial, sans-serif !important;     }     .h1, .h2 { font-family: Cambria, Georgia, serif !important; }     .h2 { line-height: 94% !important;  }     .link  { line-height: 100% !important; }   </style>   <![endif]--><!-- [if gte mso 9]><xml>   <o:OfficeDocumentSettings>     <o:AllowPNG/>     <o:PixelsPerInch>96</o:PixelsPerInch>   </o:OfficeDocumentSettings> </xml><![endif]-->\r\n<table style=\"background-color: #ececec;\" border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td align=\"center\"><!-- [if (gte mso 9)|(IE)]>     <table width=\"800\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"width: 800px;\">       <tr>         <td valign=\"top\">     <![endif]-->\r\n<table class=\"main\" style=\"max-width: 800px; min-width: 680px;\" border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td class=\"layouts-here\" align=\"left\"><!-- Module 2 - Text block -->\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td style=\"background-color: #ffffff; padding: 0 10px;\" align=\"center\">\r\n<table class=\"container\" style=\"width: 640px;\" border=\"0\" width=\"640\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 40px;\" height=\"40\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td align=\"center\"><img style=\"border: none; display: block;\" src=\"https://s3.us-east-2.amazonaws.com/obs-emailer/prosperis/properisgold_logo_75.png\" alt=\"Prosperis Gold\" width=\"280\" /></td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 22px;\" height=\"22\">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<!-- End Module 2 - Text block --> <!-- Module 2 - Text block -->\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td style=\"background-color: #ffffff; padding: 0 10px;\" align=\"center\">\r\n<table class=\"container\" style=\"width: 640px;\" border=\"0\" width=\"640\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td align=\"center\">\r\n<table class=\"title-center\" style=\"background-position: right center; background-repeat: no-repeat; background-image: url(\'\\\'\\\'\');\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr><!-- title -->\r\n<td class=\"h2\" style=\"font-family: \'Playfair Display\', Cambria, Georgia, serif; line-height: 1.13; color: #828386; font-size: 32px; font-weight: 900; padding: 10px 30px; text-align: center;\"><span style=\"font-family: Arial, sans-serif; font-size: 18px;\"><strong>You Have Joined A Thrift</strong></span></td>\r\n<!-- end title --></tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 16px;\" height=\"16\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"text-left\" style=\"color: #666666; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 24px; text-align: left;\">\r\n<p><strong>Dear {{username}}:</strong></p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 16px;\" height=\"16\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"text-left\" style=\"color: #666666; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 24px; text-align: left;\">\r\n<p>Congratulations! You have successfully joined a thrift.</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 22px;\" height=\"22\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td align=\"center\">\r\n<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr><!-- link -->\r\n<td class=\"link\" style=\"color: #cf9e2a; font-family: Lato, Arial, sans-serif; font-size: 14px; line-height: 1;\"><strong><span style=\"font-size: 20px;\"><a style=\"color: #cf9e2a; text-decoration: none;\" href=\"{{actual_link}}\">View Your Thrift Group Details</a></span></strong></td>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 14px;\" width=\"7\">&nbsp;</td>\r\n<!-- icon -->\r\n<td class=\"icon\" style=\"border-collapse: collapse; font-size: 0; line-height: 1; width: 11px;\" width=\"11\">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 28px;\" height=\"28\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"text-left\" style=\"color: #666666; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 24px; text-align: left;\">\r\n<p><em>To Your Prosperity,</em></p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 8px;\" height=\"8\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"text-left\" style=\"color: #666666; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 24px; text-align: left;\">\r\n<p><strong>The Prosperis Gold Team</strong></p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 68px;\" height=\"68\">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<!-- End Module 2 - Text block --> <!-- Module 9 - 3 columns with icon and text -->\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td class=\"color-bg\" style=\"background-color: #cf9e2a; padding: 0px 10px;\" align=\"center\">\r\n<table class=\"container\" style=\"width: 640px;\" border=\"0\" width=\"640\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 40px;\" height=\"40\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 16px;\" height=\"16\">&nbsp;</td>\r\n</tr>\r\n<tr><!-- content -->\r\n<td class=\"h2\" style=\"color: #ffffff; font-family: \'Lato\', Arial, sans-serif; text-align: center;\">Prosperis Gold is your Thrifting and Savings Partner.</td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 33px;\" height=\"33\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 200px;\" align=\"left\" width=\"200\"><!-- column 1 -->\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr><!-- icon -->\r\n<td class=\"icon\" style=\"border-collapse: collapse; font-size: 0; line-height: 1;\" align=\"center\"><img style=\"border: none; display: block;\" src=\"https://s3.us-east-2.amazonaws.com/obs-emailer/prosperis/ico-result1.png\" alt=\"\" width=\"66\" /></td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 15px;\" height=\"15\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"text\" style=\"color: #ffffff; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 24px; text-align: center;\">Build your wealth and gain the discipline required to save and grow your money. We provide powerful tools to manage thrifts.</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<!-- end column 1 --></th>\r\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 20px; height: 32px;\" width=\"20\" height=\"32\">&nbsp;</th>\r\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 200px;\" align=\"left\" width=\"200\"><!-- column 2 -->\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr><!-- icon -->\r\n<td class=\"icon\" style=\"border-collapse: collapse; font-size: 0; line-height: 1;\" align=\"center\"><img style=\"border: none; display: block;\" src=\"https://s3.us-east-2.amazonaws.com/obs-emailer/prosperis/ico-result2.png\" alt=\"\" width=\"66\" /></td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 15px;\" height=\"15\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"text\" style=\"color: #ffffff; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 24px; text-align: center;\">Manage your thrfting and savings portfolio from the ease of your home or office. Track progress and stay informed.</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<!-- end column 2 --></th>\r\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 20px; height: 32px;\" width=\"20\" height=\"32\">&nbsp;</th>\r\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 200px;\" align=\"left\" width=\"200\"><!-- column 3 -->\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr><!-- icon -->\r\n<td class=\"icon\" style=\"border-collapse: collapse; font-size: 0; line-height: 1;\" align=\"center\"><img style=\"border: none; display: block;\" src=\"https://s3.us-east-2.amazonaws.com/obs-emailer/prosperis/ico-result3.png\" alt=\"\" width=\"66\" /></td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 15px;\" height=\"15\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"text\" style=\"color: #ffffff; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 24px; text-align: center;\">Collaborate and thrift with friends and colleagues in a safe and secure environment. Transparency&nbsp;on all levels.</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<!-- end column 3 --></th>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 34px;\" colspan=\"5\" height=\"34\">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td align=\"center\"><!-- button -->\r\n<table class=\"btn1\" style=\"min-width: 160px;\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td style=\"border-radius: 20px; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 1; padding: 12px 27px 12px; text-align: center; border: 1px solid #ffffff; color: #ffffff;\"><a style=\"color: #ffffff;\" href=\"https://thrift.prosperisgold.com\">MY ACCOUNT</a></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<!-- end button --></td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 70px;\" height=\"70\">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<!-- End Module 9 - 3 columns with icon and text --> <!-- Module 29 - Contacts -->\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td style=\"background-color: #f7f7f7; padding: 0 10px;\" align=\"center\">\r\n<table class=\"container\" style=\"width: 640px;\" border=\"0\" width=\"640\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 40px;\" height=\"40\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td align=\"center\">\r\n<table class=\"title-center\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr><!-- title -->\r\n<td class=\"h2\" style=\"font-family: \'Playfair Display\', Cambria, Georgia, serif; line-height: 1.13; color: #828386; font-size: 32px; font-weight: 900; padding: 10px 30px; text-align: center;\"><span style=\"font-size: 22px;\">Let\'s Help You Prosper!</span></td>\r\n<!-- end title --></tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 16px;\" height=\"16\">&nbsp;</td>\r\n</tr>\r\n<tr><!-- content -->\r\n<td class=\"text-center\" style=\"color: #666666; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 24px; text-align: center;\">Evolving the way the world thrifts. We make thrifting and saving easy!</td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 33px;\" height=\"33\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 200px;\" align=\"left\" width=\"200\">\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr><!-- image -->\r\n<td class=\"logo\" style=\"border-collapse: collapse; font-size: 0; line-height: 1;\"><img style=\"border: none; display: block;\" src=\"https://s3.us-east-2.amazonaws.com/obs-emailer/prosperis/properisgold_logo_40.png\" alt=\"Prosperis Gold\" width=\"140\" /></td>\r\n<!-- end image --></tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 12px;\" height=\"12\">&nbsp;</td>\r\n</tr>\r\n<tr><!-- content -->\r\n<td class=\"text\" style=\"color: #666666; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 24px;\">With modern financial technology, Prosperis Gold blends accountability, discipline, and transparency in our services to help you develop healthy saving habits.</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</th>\r\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 20px; height: 20px;\" width=\"20\" height=\"20\">&nbsp;</th>\r\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 200px;\" align=\"left\" width=\"200\">\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr><!-- image -->\r\n<td class=\"img\" style=\"border-collapse: collapse; font-size: 0; line-height: 1;\" align=\"center\"><img style=\"border: none; display: block;\" src=\"https://s3.us-east-2.amazonaws.com/obs-emailer/prosperis/pg-lady-banner01-400.jpg\" alt=\"Prosperis Gold\" width=\"200\" /></td>\r\n<!-- end image --></tr>\r\n</tbody>\r\n</table>\r\n</th>\r\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 20px; height: 20px;\" width=\"20\" height=\"20\">&nbsp;</th>\r\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 200px;\" align=\"left\" width=\"200\">\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr><!-- title -->\r\n<td class=\"h6\" style=\"font-family: \'Playfair Display\', Cambria, Georgia, serif; line-height: 1; color: #828386; font-size: 20px; font-weight: 900;\">Contact&nbsp;Us</td>\r\n<!-- end title --></tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 12px;\" height=\"12\">&nbsp;</td>\r\n</tr>\r\n<tr><!-- content -->\r\n<td class=\"text\" style=\"color: #666666; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 24px;\">\r\n<p>40B Awori Road,</p>\r\n<p>Dolphine Estate, Ikoyi</p>\r\n<p>Lagos, NIGERIA</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 4px;\" height=\"4\">&nbsp;</td>\r\n</tr>\r\n<tr><!-- content -->\r\n<td class=\"text\" style=\"color: #666666; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 24px;\"><a style=\"color: #666666; text-decoration: none;\" href=\"#\">+234 (907) 662 9963</a><br /> <a style=\"color: #666666; text-decoration: none;\" href=\"mailto:info@prosperisgold.com\">info@prosperisgold.com</a><br /> <a style=\"color: #666666; text-decoration: none;\" href=\"https://www.prosperisgold.com\">www.prosperisgold.com</a></td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 10px;\" height=\"10\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td><!-- social icons -->\r\n<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr>\r\n<td class=\"icon\" style=\"border-collapse: collapse; font-size: 0; line-height: 1;\"><a href=\"http://www.instagram.com/prosperisgold\"><img style=\"border: none; display: block;\" src=\"https://s3.us-east-2.amazonaws.com/obs-emailer/prosperis/ico-instagram-gold.png\" alt=\"Instagram\" width=\"18\" /></a></td>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 1px; width: 20px;\" width=\"20\">&nbsp;</td>\r\n<td class=\"icon\" style=\"border-collapse: collapse; font-size: 0; line-height: 1;\"><a href=\"http://www.facebook.com/prosperisgold\"><img style=\"border: none; display: block;\" src=\"https://s3.us-east-2.amazonaws.com/obs-emailer/prosperis/ico-facebook-gold.png\" alt=\"Facebook\" width=\"18\" /></a></td>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 1px; width: 20px;\" width=\"20\">&nbsp;</td>\r\n<td class=\"icon\" style=\"border-collapse: collapse; font-size: 0; line-height: 1;\"><a href=\"http://www.twitter.com/prosperisgold\"><img style=\"border: none; display: block;\" src=\"https://s3.us-east-2.amazonaws.com/obs-emailer/prosperis/ico-twitter-gold.png\" alt=\"Twitter\" width=\"18\" /></a></td>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 1px; width: 20px;\" width=\"20\">&nbsp;</td>\r\n<td class=\"icon\" style=\"border-collapse: collapse; font-size: 0; line-height: 1;\"><a href=\"http://www.linkeding.com/prosperisgold\"><img style=\"border: none; display: block;\" src=\"https://s3.us-east-2.amazonaws.com/obs-emailer/prosperis/ico-linkedin-gold.png\" alt=\"LinkedIn\" width=\"18\" /></a></td>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 1px; width: 20px;\" width=\"20\">&nbsp;</td>\r\n<td class=\"icon\" style=\"border-collapse: collapse; font-size: 0; line-height: 1;\">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<!-- end social icons --></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</th>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 68px;\" height=\"68\">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<!-- End Module 29 - Contacts --></td>\r\n</tr>\r\n<tr>\r\n<td><!-- Footer -->\r\n<table class=\"footer\" border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td style=\"background-color: #ececec; padding: 0 10px;\" align=\"center\">\r\n<table class=\"container\" style=\"width: 640px;\" border=\"0\" width=\"640\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\"><!-- Spacer -->\r\n<tbody>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 20px;\" height=\"20\">&nbsp;</td>\r\n</tr>\r\n<!-- End Spacer -->\r\n<tr>\r\n<td>\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 300px;\" align=\"left\" width=\"300\"><!-- Copyright -->\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td class=\"text\" style=\"color: #2e2a41; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 22px;\">Copyright &copy; 2018&nbsp;Prosperis Gold</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</th>\r\n<th class=\"col height-0\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 40px; line-height: 10px;\" align=\"left\" width=\"40\" height=\"10\">&nbsp;</th>\r\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 300px;\" align=\"left\" width=\"300\"><!-- Unsubscribe -->\r\n<table class=\"full\" border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr>\r\n<td class=\"text\" style=\"color: #2e2a41; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 22px; text-align: right;\"><a href=\"http://www.prosperisgold.com\">www.prosperisgold.com</a></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</th>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n<!-- Spacer -->\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 20px;\" height=\"20\">&nbsp;</td>\r\n</tr>\r\n<!-- End Spacer --></tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<!-- End Footer --></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<!-- [if (gte mso 9)|(IE)]>     </td>     </tr>     </table>     <![endif]--></td>\r\n</tr>\r\n</tbody>\r\n</table>');
INSERT INTO `tbl_email_template` (`email_template_id`, `email_template_type`, `email_template_subject`, `email_template`) VALUES
(24, 'thrift_invitation_to_external_member', 'You Have A Thrift Invitation', '<!-- [if gte mso 9]>   <style type=\"text/css\">     body, table, tr, td, h1, h2, h3, h4, h5, h6, ul, li, ol, dl, dd, dt {       font-family: Helvetica, Arial, sans-serif !important;     }     .h1, .h2 { font-family: Cambria, Georgia, serif !important; }     .h2 { line-height: 94% !important;  }     .link  { line-height: 100% !important; }   </style>   <![endif]--><!-- [if gte mso 9]><xml>   <o:OfficeDocumentSettings>     <o:AllowPNG/>     <o:PixelsPerInch>96</o:PixelsPerInch>   </o:OfficeDocumentSettings> </xml><![endif]-->\r\n<table style=\"background-color: #ececec;\" border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td align=\"center\"><!-- [if (gte mso 9)|(IE)]>     <table width=\"800\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"width: 800px;\">       <tr>         <td valign=\"top\">     <![endif]-->\r\n<table class=\"main\" style=\"max-width: 800px; min-width: 680px;\" border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td class=\"layouts-here\" align=\"left\"><!-- Module 2 - Text block -->\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td style=\"background-color: #ffffff; padding: 0 10px;\" align=\"center\">\r\n<table class=\"container\" style=\"width: 640px;\" border=\"0\" width=\"640\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr style=\"height: 40px;\">\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 40px; height: 40px;\" height=\"40\">&nbsp;</td>\r\n</tr>\r\n<tr style=\"height: 110px;\">\r\n<td style=\"height: 110px;\" align=\"center\"><a href=\"https://d4zd5125vr4p3.cloudfront.net/images/6245ac6679c79.png\"><img src=\"https://d4zd5125vr4p3.cloudfront.net/images/6245ac6679c79.png\" alt=\"Prosperis Gold\" width=\"157\" height=\"106\" /></a></td>\r\n</tr>\r\n<tr style=\"height: 22px;\">\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 22px; height: 22px;\" height=\"22\">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<!-- End Module 2 - Text block --> <!-- Module 2 - Text block -->\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td style=\"background-color: #ffffff; padding: 0 10px;\" align=\"center\">\r\n<table class=\"container\" style=\"width: 640px;\" border=\"0\" width=\"640\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td align=\"center\">\r\n<table class=\"title-center\" style=\"background-position: right center; background-repeat: no-repeat; background-image: url(\'\\\'\\\'\');\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr><!-- title -->\r\n<td class=\"h2\" style=\"font-family: \'Playfair Display\', Cambria, Georgia, serif; line-height: 1.13; color: #828386; font-size: 32px; font-weight: 900; padding: 10px 30px; text-align: center;\"><span style=\"font-family: Arial, sans-serif; font-size: 18px;\"><strong>You Have A Thrift Invitation</strong></span></td>\r\n<!-- end title --></tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 16px;\" height=\"16\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"text-left\" style=\"color: #666666; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 24px; text-align: left;\">\r\n<p><strong><span class=\"Y0NH2b CLPzrc\">Dear Sir/Madam:</span></strong></p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 16px;\" height=\"16\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"text-left\" style=\"color: #666666; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 24px; text-align: left;\">\r\n<p>You have been invited by your friend or colleague,&nbsp;{{invitor_name}}, to join an online thrift group.</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 22px;\" height=\"22\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td align=\"center\">\r\n<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr><!-- link -->\r\n<td class=\"link\" style=\"color: #cf9e2a; font-family: Lato, Arial, sans-serif; font-size: 14px; line-height: 1;\"><strong><span style=\"font-size: 20px;\"><a style=\"color: #cf9e2a; text-decoration: none;\" href=\"{{actual_link}}\">Click here to view thrift invitation details</a></span></strong></td>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 14px;\" width=\"7\">&nbsp;</td>\r\n<!-- icon -->\r\n<td class=\"icon\" style=\"border-collapse: collapse; font-size: 0; line-height: 1; width: 11px;\" width=\"11\">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 28px;\" height=\"28\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"text-left\" style=\"color: #666666; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 24px; text-align: left;\">\r\n<p><em>To Your Prosperity,</em></p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 8px;\" height=\"8\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"text-left\" style=\"color: #666666; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 24px; text-align: left;\">\r\n<p><strong>The Thrift2Win Team</strong></p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 68px;\" height=\"68\">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<!-- End Module 2 - Text block --> <!-- Module 9 - 3 columns with icon and text -->\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td class=\"color-bg\" style=\"background-color: #cf9e2a; padding: 0px 10px;\" align=\"center\">\r\n<table class=\"container\" style=\"width: 640px;\" border=\"0\" width=\"640\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 40px;\" height=\"40\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 16px;\" height=\"16\">&nbsp;</td>\r\n</tr>\r\n<tr><!-- content -->\r\n<td class=\"h2\" style=\"color: #ffffff; font-family: \'Lato\', Arial, sans-serif; text-align: center;\">Thrift2Win is your Thrifting and Savings Partner.</td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 33px;\" height=\"33\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 200px;\" align=\"left\" width=\"200\"><!-- column 1 -->\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr><!-- icon -->\r\n<td class=\"icon\" style=\"border-collapse: collapse; font-size: 0; line-height: 1;\" align=\"center\"><img style=\"border: none; display: block;\" src=\"https://s3.us-east-2.amazonaws.com/obs-emailer/prosperis/ico-result1.png\" alt=\"\" width=\"66\" /></td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 15px;\" height=\"15\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"text\" style=\"color: #ffffff; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 24px; text-align: center;\">Build your wealth and gain the discipline required to save and grow your money. We provide powerful tools to manage thrifts.</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<!-- end column 1 --></th>\r\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 20px; height: 32px;\" width=\"20\" height=\"32\">&nbsp;</th>\r\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 200px;\" align=\"left\" width=\"200\"><!-- column 2 -->\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr><!-- icon -->\r\n<td class=\"icon\" style=\"border-collapse: collapse; font-size: 0; line-height: 1;\" align=\"center\"><img style=\"border: none; display: block;\" src=\"https://s3.us-east-2.amazonaws.com/obs-emailer/prosperis/ico-result2.png\" alt=\"\" width=\"66\" /></td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 15px;\" height=\"15\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"text\" style=\"color: #ffffff; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 24px; text-align: center;\">Manage your thrfting and savings portfolio from the ease of your home or office. Track progress and stay informed.</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<!-- end column 2 --></th>\r\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 20px; height: 32px;\" width=\"20\" height=\"32\">&nbsp;</th>\r\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 200px;\" align=\"left\" width=\"200\"><!-- column 3 -->\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr><!-- icon -->\r\n<td class=\"icon\" style=\"border-collapse: collapse; font-size: 0; line-height: 1;\" align=\"center\"><img style=\"border: none; display: block;\" src=\"https://s3.us-east-2.amazonaws.com/obs-emailer/prosperis/ico-result3.png\" alt=\"\" width=\"66\" /></td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 15px;\" height=\"15\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"text\" style=\"color: #ffffff; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 24px; text-align: center;\">Collaborate and thrift with friends and colleagues in a safe and secure environment. Transparency&nbsp;on all levels.</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<!-- end column 3 --></th>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 34px;\" colspan=\"5\" height=\"34\">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td align=\"center\"><!-- button -->\r\n<table class=\"btn1\" style=\"min-width: 160px;\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td style=\"border-radius: 20px; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 1; padding: 12px 27px 12px; text-align: center; border: 1px solid #ffffff; color: #ffffff;\"><a style=\"color: #ffffff;\" href=\"https://thrift.prosperisgold.com\">MY ACCOUNT</a></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<!-- end button --></td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 70px;\" height=\"70\">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<!-- End Module 9 - 3 columns with icon and text --> <!-- Module 29 - Contacts -->\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td style=\"background-color: #f7f7f7; padding: 0 10px;\" align=\"center\">\r\n<table class=\"container\" style=\"width: 640px;\" border=\"0\" width=\"640\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 40px;\" height=\"40\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td align=\"center\">\r\n<table class=\"title-center\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr><!-- title -->\r\n<td class=\"h2\" style=\"font-family: \'Playfair Display\', Cambria, Georgia, serif; line-height: 1.13; color: #828386; font-size: 32px; font-weight: 900; padding: 10px 30px; text-align: center;\"><span style=\"font-size: 22px;\">Let\'s Help You Prosper!</span></td>\r\n<!-- end title --></tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 16px;\" height=\"16\">&nbsp;</td>\r\n</tr>\r\n<tr><!-- content -->\r\n<td class=\"text-center\" style=\"color: #666666; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 24px; text-align: center;\">Evolving the way the world thrifts. We make thrifting and saving easy!</td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 33px;\" height=\"33\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 200px;\" align=\"left\" width=\"200\">\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr><!-- image -->\r\n<td class=\"logo\" style=\"border-collapse: collapse; font-size: 0; line-height: 1;\"><img src=\"https://d4zd5125vr4p3.cloudfront.net/images/6245ac6679c79.png\" alt=\"Prosperis Gold\" width=\"157\" height=\"106\" /></td>\r\n<!-- end image --></tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 12px;\" height=\"12\">&nbsp;</td>\r\n</tr>\r\n<tr><!-- content -->\r\n<td class=\"text\" style=\"color: #666666; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 24px;\">With modern financial technology, Thrift2Win blends accountability, discipline, and transparency in our services to help you develop healthy saving habits.</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</th>\r\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 20px; height: 20px;\" width=\"20\" height=\"20\">&nbsp;</th>\r\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 200px;\" align=\"left\" width=\"200\">\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr><!-- image -->\r\n<td class=\"img\" style=\"border-collapse: collapse; font-size: 0; line-height: 1;\" align=\"center\"><img style=\"border: none; display: block;\" src=\"https://s3.us-east-2.amazonaws.com/obs-emailer/prosperis/pg-lady-banner01-400.jpg\" alt=\"Prosperis Gold\" width=\"200\" /></td>\r\n<!-- end image --></tr>\r\n</tbody>\r\n</table>\r\n</th>\r\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 20px; height: 20px;\" width=\"20\" height=\"20\">&nbsp;</th>\r\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 200px;\" align=\"left\" width=\"200\">\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr><!-- title -->\r\n<td class=\"h6\" style=\"font-family: \'Playfair Display\', Cambria, Georgia, serif; line-height: 1; color: #828386; font-size: 20px; font-weight: 900;\">Contact&nbsp;Us</td>\r\n<!-- end title --></tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 12px;\" height=\"12\">&nbsp;</td>\r\n</tr>\r\n<tr><!-- content -->\r\n<td class=\"text\" style=\"color: #666666; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 24px;\">\r\n<p>40B Awori Road,</p>\r\n<p>Dolphine Estate, Ikoyi</p>\r\n<p>Lagos, NIGERIA</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 4px;\" height=\"4\">&nbsp;</td>\r\n</tr>\r\n<tr><!-- content -->\r\n<td class=\"text\" style=\"color: #666666; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 24px;\"><a style=\"color: #666666; text-decoration: none;\" href=\"#\">+234 (907) 662 9963</a><br /> <a style=\"color: #666666; text-decoration: none;\" href=\"mailto:info@prosperisgold.com\">info@</a><a style=\"color: #666666; text-decoration: none;\" href=\"https://www.prosperisgold.com\">thrift2win</a><a style=\"color: #666666; text-decoration: none;\" href=\"mailto:info@prosperisgold.com\">.com</a><br /> <a style=\"color: #666666; text-decoration: none;\" href=\"https://www.prosperisgold.com\">www.thrift2win.com</a></td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 10px;\" height=\"10\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td><!-- social icons -->\r\n<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr>\r\n<td class=\"icon\" style=\"border-collapse: collapse; font-size: 0; line-height: 1;\"><a href=\"http://www.instagram.com/prosperisgold\"><img style=\"border: none; display: block;\" src=\"https://s3.us-east-2.amazonaws.com/obs-emailer/prosperis/ico-instagram-gold.png\" alt=\"Instagram\" width=\"18\" /></a></td>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 1px; width: 20px;\" width=\"20\">&nbsp;</td>\r\n<td class=\"icon\" style=\"border-collapse: collapse; font-size: 0; line-height: 1;\"><a href=\"http://www.facebook.com/prosperisgold\"><img style=\"border: none; display: block;\" src=\"https://s3.us-east-2.amazonaws.com/obs-emailer/prosperis/ico-facebook-gold.png\" alt=\"Facebook\" width=\"18\" /></a></td>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 1px; width: 20px;\" width=\"20\">&nbsp;</td>\r\n<td class=\"icon\" style=\"border-collapse: collapse; font-size: 0; line-height: 1;\"><a href=\"http://www.twitter.com/prosperisgold\"><img style=\"border: none; display: block;\" src=\"https://s3.us-east-2.amazonaws.com/obs-emailer/prosperis/ico-twitter-gold.png\" alt=\"Twitter\" width=\"18\" /></a></td>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 1px; width: 20px;\" width=\"20\">&nbsp;</td>\r\n<td class=\"icon\" style=\"border-collapse: collapse; font-size: 0; line-height: 1;\"><a href=\"http://www.linkeding.com/prosperisgold\"><img style=\"border: none; display: block;\" src=\"https://s3.us-east-2.amazonaws.com/obs-emailer/prosperis/ico-linkedin-gold.png\" alt=\"LinkedIn\" width=\"18\" /></a></td>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 1px; width: 20px;\" width=\"20\">&nbsp;</td>\r\n<td class=\"icon\" style=\"border-collapse: collapse; font-size: 0; line-height: 1;\">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<!-- end social icons --></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</th>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 68px;\" height=\"68\">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<!-- End Module 29 - Contacts --></td>\r\n</tr>\r\n<tr>\r\n<td><!-- Footer -->\r\n<table class=\"footer\" border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td style=\"background-color: #ececec; padding: 0 10px;\" align=\"center\">\r\n<table class=\"container\" style=\"width: 640px;\" border=\"0\" width=\"640\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\"><!-- Spacer -->\r\n<tbody>\r\n<tr style=\"height: 20px;\">\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 20px; height: 20px;\" height=\"20\">&nbsp;</td>\r\n</tr>\r\n<!-- End Spacer -->\r\n<tr style=\"height: 30px;\">\r\n<td style=\"height: 30px;\">\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 300px;\" align=\"left\" width=\"300\"><!-- Copyright -->\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td class=\"text\" style=\"color: #2e2a41; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 22px;\">Copyright &copy; 2018&nbsp;Thrift2Win</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</th>\r\n<th class=\"col height-0\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 40px; line-height: 10px;\" align=\"left\" width=\"40\" height=\"10\">&nbsp;</th>\r\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 300px;\" align=\"left\" width=\"300\"><!-- Unsubscribe -->\r\n<table class=\"full\" border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr>\r\n<td class=\"text\" style=\"color: #2e2a41; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 22px; text-align: right;\"><a href=\"http://www.prosperisgold.com\">www.</a><a style=\"color: #666666; text-decoration: none;\" href=\"https://www.prosperisgold.com\">thrift2win</a><a href=\"http://www.prosperisgold.com\">.com</a></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</th>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n<!-- Spacer -->\r\n<tr style=\"height: 20px;\">\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 20px; height: 20px;\" height=\"20\">&nbsp;</td>\r\n</tr>\r\n<!-- End Spacer --></tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<!-- End Footer --></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<!-- [if (gte mso 9)|(IE)]>     </td>     </tr>     </table>     <![endif]--></td>\r\n</tr>\r\n</tbody>\r\n</table>'),
(35, 'user_activation_code', 'Account Activation code', '<!-- [if gte mso 9]>   <style type=\"text/css\">     body, table, tr, td, h1, h2, h3, h4, h5, h6, ul, li, ol, dl, dd, dt {       font-family: Helvetica, Arial, sans-serif !important;     }     .h1, .h2 { font-family: Cambria, Georgia, serif !important; }     .h2 { line-height: 94% !important;  }     .link  { line-height: 100% !important; }   </style>   <![endif]--><!-- [if gte mso 9]><xml>   <o:OfficeDocumentSettings>     <o:AllowPNG/>     <o:PixelsPerInch>96</o:PixelsPerInch>   </o:OfficeDocumentSettings> </xml><![endif]-->\r\n<table style=\"background-color: #ececec;\" border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td align=\"center\"><!-- [if (gte mso 9)|(IE)]>     <table width=\"800\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"width: 800px;\">       <tr>         <td valign=\"top\">     <![endif]-->\r\n<table class=\"main\" style=\"max-width: 800px; min-width: 680px;\" border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td class=\"layouts-here\" align=\"left\"><!-- Module 2 - Text block -->\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td style=\"background-color: #ffffff; padding: 0 10px;\" align=\"center\">\r\n<table class=\"container\" style=\"width: 640px;\" border=\"0\" width=\"640\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 40px;\" height=\"40\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td align=\"center\"><img src=\"https://d4zd5125vr4p3.cloudfront.net/images/6245ac6679c79.png\" alt=\"Prosperis Gold\" width=\"157\" height=\"106\" /></td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 22px;\" height=\"22\">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<!-- End Module 2 - Text block --> <!-- Module 2 - Text block -->\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td style=\"background-color: #ffffff; padding: 0 10px;\" align=\"center\">\r\n<table class=\"container\" style=\"width: 640px;\" border=\"0\" width=\"640\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr style=\"height: 60px;\">\r\n<td style=\"height: 60px;\" align=\"center\">\r\n<table class=\"title-center\" style=\"background-position: right center; background-repeat: no-repeat; background-image: url(\'\\\'\\\'\');\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr><!-- title -->\r\n<td class=\"h2\" style=\"font-family: \'Playfair Display\', Cambria, Georgia, serif; line-height: 1.13; color: #828386; font-size: 32px; font-weight: 900; padding: 10px 30px; text-align: center;\"><span style=\"font-family: Arial, sans-serif; font-size: 18px;\"><strong>Your Account Activation code</strong></span></td>\r\n<!-- end title --></tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n<tr style=\"height: 16px;\">\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 16px; height: 16px;\" height=\"16\">&nbsp;</td>\r\n</tr>\r\n<tr style=\"height: 52px;\">\r\n<td class=\"text-left\" style=\"color: #666666; font-family: Lato, Arial, sans-serif; font-size: 14px; line-height: 24px; text-align: left; height: 52px;\">\r\n<p><strong>Dear {{username}}:</strong></p>\r\n</td>\r\n</tr>\r\n<tr style=\"height: 16px;\">\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 16px; height: 16px;\" height=\"16\">&nbsp;</td>\r\n</tr>\r\n<tr style=\"height: 52px;\">\r\n<td class=\"text-left\" style=\"color: #666666; font-family: Lato, Arial, sans-serif; font-size: 14px; line-height: 24px; text-align: left; height: 52px;\">\r\n<p>Please Submit This code for account active.</p>\r\n</td>\r\n</tr>\r\n<tr style=\"height: 22px;\">\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 22px; height: 22px;\" height=\"22\">&nbsp;</td>\r\n</tr>\r\n<tr style=\"height: 24px;\">\r\n<td style=\"height: 24px;\" align=\"center\">\r\n<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr><!-- link -->\r\n<td class=\"link\" style=\"color: #cf9e2a; font-family: Lato, Arial, sans-serif; font-size: 14px; line-height: 1;\"><strong><span style=\"font-size: 20px;\">{{code}}&nbsp;</span></strong></td>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 14px;\" width=\"7\">&nbsp;</td>\r\n<!-- icon -->\r\n<td class=\"icon\" style=\"border-collapse: collapse; font-size: 0; line-height: 1; width: 11px;\" width=\"11\">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n<tr style=\"height: 28px;\">\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 28px; height: 28px;\" height=\"28\">&nbsp;</td>\r\n</tr>\r\n<tr style=\"height: 52px;\">\r\n<td class=\"text-left\" style=\"color: #666666; font-family: Lato, Arial, sans-serif; font-size: 14px; line-height: 24px; text-align: left; height: 52px;\">\r\n<p><em>To Your Prosperity,</em></p>\r\n</td>\r\n</tr>\r\n<tr style=\"height: 10px;\">\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 8px; height: 10px;\" height=\"8\">&nbsp;</td>\r\n</tr>\r\n<tr style=\"height: 52px;\">\r\n<td class=\"text-left\" style=\"color: #666666; font-family: Lato, Arial, sans-serif; font-size: 14px; line-height: 24px; text-align: left; height: 52px;\">\r\n<p><strong>The Thrift2win Team</strong></p>\r\n</td>\r\n</tr>\r\n<tr style=\"height: 68px;\">\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 68px; height: 68px;\" height=\"68\">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<!-- End Module 2 - Text block --> <!-- Module 9 - 3 columns with icon and text -->\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td class=\"color-bg\" style=\"background-color: #cf9e2a; padding: 0px 10px;\" align=\"center\">\r\n<table class=\"container\" style=\"width: 640px;\" border=\"0\" width=\"640\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 40px;\" height=\"40\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 16px;\" height=\"16\">&nbsp;</td>\r\n</tr>\r\n<tr><!-- content -->\r\n<td class=\"h2\" style=\"color: #ffffff; font-family: \'Lato\', Arial, sans-serif; text-align: center;\">Thrift2win is your Thrifting and Savings Partner.</td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 33px;\" height=\"33\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 200px;\" align=\"left\" width=\"200\"><!-- column 1 -->\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr><!-- icon -->\r\n<td class=\"icon\" style=\"border-collapse: collapse; font-size: 0; line-height: 1;\" align=\"center\"><img style=\"border: none; display: block;\" src=\"https://s3.us-east-2.amazonaws.com/obs-emailer/prosperis/ico-result1.png\" alt=\"\" width=\"66\" /></td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 15px;\" height=\"15\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"text\" style=\"color: #ffffff; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 24px; text-align: center;\">Build your wealth and gain the discipline required to save and grow your money. We provide powerful tools to manage thrifts.</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<!-- end column 1 --></th>\r\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 20px; height: 32px;\" width=\"20\" height=\"32\">&nbsp;</th>\r\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 200px;\" align=\"left\" width=\"200\"><!-- column 2 -->\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr><!-- icon -->\r\n<td class=\"icon\" style=\"border-collapse: collapse; font-size: 0; line-height: 1;\" align=\"center\"><img style=\"border: none; display: block;\" src=\"https://s3.us-east-2.amazonaws.com/obs-emailer/prosperis/ico-result2.png\" alt=\"\" width=\"66\" /></td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 15px;\" height=\"15\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"text\" style=\"color: #ffffff; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 24px; text-align: center;\">Manage your thrfting and savings portfolio from the ease of your home or office. Track progress and stay informed.</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<!-- end column 2 --></th>\r\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 20px; height: 32px;\" width=\"20\" height=\"32\">&nbsp;</th>\r\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 200px;\" align=\"left\" width=\"200\"><!-- column 3 -->\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr><!-- icon -->\r\n<td class=\"icon\" style=\"border-collapse: collapse; font-size: 0; line-height: 1;\" align=\"center\"><img style=\"border: none; display: block;\" src=\"https://s3.us-east-2.amazonaws.com/obs-emailer/prosperis/ico-result3.png\" alt=\"\" width=\"66\" /></td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 15px;\" height=\"15\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"text\" style=\"color: #ffffff; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 24px; text-align: center;\">Collaborate and thrift with friends and colleagues in a safe and secure environment. Transparency&nbsp;on all levels.</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<!-- end column 3 --></th>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 34px;\" colspan=\"5\" height=\"34\">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td align=\"center\"><!-- button -->\r\n<table class=\"btn1\" style=\"min-width: 160px;\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td style=\"border-radius: 20px; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 1; padding: 12px 27px 12px; text-align: center; border: 1px solid #ffffff; color: #ffffff;\"><a style=\"color: #ffffff;\" href=\"https://thrift.prosperisgold.com\">MY ACCOUNT</a></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<!-- end button --></td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 70px;\" height=\"70\">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<!-- End Module 9 - 3 columns with icon and text --> <!-- Module 29 - Contacts -->\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td style=\"background-color: #f7f7f7; padding: 0 10px;\" align=\"center\">\r\n<table class=\"container\" style=\"width: 640px;\" border=\"0\" width=\"640\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 40px;\" height=\"40\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td align=\"center\">\r\n<table class=\"title-center\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr><!-- title -->\r\n<td class=\"h2\" style=\"font-family: \'Playfair Display\', Cambria, Georgia, serif; line-height: 1.13; color: #828386; font-size: 32px; font-weight: 900; padding: 10px 30px; text-align: center;\"><span style=\"font-size: 22px;\">Let\'s Help You Prosper!</span></td>\r\n<!-- end title --></tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 16px;\" height=\"16\">&nbsp;</td>\r\n</tr>\r\n<tr><!-- content -->\r\n<td class=\"text-center\" style=\"color: #666666; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 24px; text-align: center;\">Evolving the way the world thrifts. We make thrifting and saving easy!</td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 33px;\" height=\"33\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 200px;\" align=\"left\" width=\"200\">\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr><!-- image -->\r\n<td class=\"logo\" style=\"border-collapse: collapse; font-size: 0; line-height: 1;\"><img src=\"https://d4zd5125vr4p3.cloudfront.net/images/6245ac6679c79.png\" alt=\"Prosperis Gold\" width=\"157\" height=\"106\" /></td>\r\n<!-- end image --></tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 12px;\" height=\"12\">&nbsp;</td>\r\n</tr>\r\n<tr><!-- content -->\r\n<td class=\"text\" style=\"color: #666666; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 24px;\">With modern financial technology, Thrift2win blends accountability, discipline, and transparency in our services to help you develop healthy saving habits.</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</th>\r\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 20px; height: 20px;\" width=\"20\" height=\"20\">&nbsp;</th>\r\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 200px;\" align=\"left\" width=\"200\">\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr><!-- image -->\r\n<td class=\"img\" style=\"border-collapse: collapse; font-size: 0; line-height: 1;\" align=\"center\"><img style=\"border: none; display: block;\" src=\"https://s3.us-east-2.amazonaws.com/obs-emailer/prosperis/pg-lady-banner01-400.jpg\" alt=\"Prosperis Gold\" width=\"200\" /></td>\r\n<!-- end image --></tr>\r\n</tbody>\r\n</table>\r\n</th>\r\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 20px; height: 20px;\" width=\"20\" height=\"20\">&nbsp;</th>\r\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 200px;\" align=\"left\" width=\"200\">\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr><!-- title -->\r\n<td class=\"h6\" style=\"font-family: \'Playfair Display\', Cambria, Georgia, serif; line-height: 1; color: #828386; font-size: 20px; font-weight: 900;\">Contact&nbsp;Us</td>\r\n<!-- end title --></tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 12px;\" height=\"12\">&nbsp;</td>\r\n</tr>\r\n<tr><!-- content -->\r\n<td class=\"text\" style=\"color: #666666; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 24px;\">\r\n<p>40B Awori Road,</p>\r\n<p>Dolphine Estate, Ikoyi</p>\r\n<p>Lagos, NIGERIA</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 4px;\" height=\"4\">&nbsp;</td>\r\n</tr>\r\n<tr><!-- content -->\r\n<td class=\"text\" style=\"color: #666666; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 24px;\"><a style=\"color: #666666; text-decoration: none;\" href=\"#\">+234 (907) 662 9963</a><br /> <a style=\"color: #666666; text-decoration: none;\" href=\"mailto:info@prosperisgold.com\">info@thrift2win.com</a><br /> <a style=\"color: #666666; text-decoration: none;\" href=\"https://www.prosperisgold.com\">www.</a><a style=\"color: #666666; text-decoration: none;\" href=\"mailto:info@prosperisgold.com\">thrift2win</a><a style=\"color: #666666; text-decoration: none;\" href=\"https://www.prosperisgold.com\">.com</a></td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 10px;\" height=\"10\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td><!-- social icons -->\r\n<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr>\r\n<td class=\"icon\" style=\"border-collapse: collapse; font-size: 0; line-height: 1;\"><a href=\"http://www.instagram.com/prosperisgold\"><img style=\"border: none; display: block;\" src=\"https://s3.us-east-2.amazonaws.com/obs-emailer/prosperis/ico-instagram-gold.png\" alt=\"Instagram\" width=\"18\" /></a></td>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 1px; width: 20px;\" width=\"20\">&nbsp;</td>\r\n<td class=\"icon\" style=\"border-collapse: collapse; font-size: 0; line-height: 1;\"><a href=\"http://www.facebook.com/prosperisgold\"><img style=\"border: none; display: block;\" src=\"https://s3.us-east-2.amazonaws.com/obs-emailer/prosperis/ico-facebook-gold.png\" alt=\"Facebook\" width=\"18\" /></a></td>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 1px; width: 20px;\" width=\"20\">&nbsp;</td>\r\n<td class=\"icon\" style=\"border-collapse: collapse; font-size: 0; line-height: 1;\"><a href=\"http://www.twitter.com/prosperisgold\"><img style=\"border: none; display: block;\" src=\"https://s3.us-east-2.amazonaws.com/obs-emailer/prosperis/ico-twitter-gold.png\" alt=\"Twitter\" width=\"18\" /></a></td>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 1px; width: 20px;\" width=\"20\">&nbsp;</td>\r\n<td class=\"icon\" style=\"border-collapse: collapse; font-size: 0; line-height: 1;\"><a href=\"http://www.linkeding.com/prosperisgold\"><img style=\"border: none; display: block;\" src=\"https://s3.us-east-2.amazonaws.com/obs-emailer/prosperis/ico-linkedin-gold.png\" alt=\"LinkedIn\" width=\"18\" /></a></td>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 1px; width: 20px;\" width=\"20\">&nbsp;</td>\r\n<td class=\"icon\" style=\"border-collapse: collapse; font-size: 0; line-height: 1;\">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<!-- end social icons --></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</th>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 68px;\" height=\"68\">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<!-- End Module 29 - Contacts --></td>\r\n</tr>\r\n<tr>\r\n<td><!-- Footer -->\r\n<table class=\"footer\" border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td style=\"background-color: #ececec; padding: 0 10px;\" align=\"center\">\r\n<table class=\"container\" style=\"width: 640px;\" border=\"0\" width=\"640\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\"><!-- Spacer -->\r\n<tbody>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 20px;\" height=\"20\">&nbsp;</td>\r\n</tr>\r\n<!-- End Spacer -->\r\n<tr>\r\n<td>\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 300px;\" align=\"left\" width=\"300\"><!-- Copyright -->\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td class=\"text\" style=\"color: #2e2a41; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 22px;\">Copyright &copy; 2018&nbsp;Thrift2win</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</th>\r\n<th class=\"col height-0\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 40px; line-height: 10px;\" align=\"left\" width=\"40\" height=\"10\">&nbsp;</th>\r\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 300px;\" align=\"left\" width=\"300\"><!-- Unsubscribe -->\r\n<table class=\"full\" border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr>\r\n<td class=\"text\" style=\"color: #2e2a41; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 22px; text-align: right;\"><a href=\"http://www.prosperisgold.com\">www.thrift2win.com</a></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</th>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n<!-- Spacer -->\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 20px;\" height=\"20\">&nbsp;</td>\r\n</tr>\r\n<!-- End Spacer --></tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<!-- End Footer --></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<!-- [if (gte mso 9)|(IE)]>     </td>     </tr>     </table>     <![endif]--></td>\r\n</tr>\r\n</tbody>\r\n</table>');
INSERT INTO `tbl_email_template` (`email_template_id`, `email_template_type`, `email_template_subject`, `email_template`) VALUES
(36, 'forgot_password_app', 'Password verfication code', '<!-- [if gte mso 9]>   <style type=\"text/css\">     body, table, tr, td, h1, h2, h3, h4, h5, h6, ul, li, ol, dl, dd, dt {       font-family: Helvetica, Arial, sans-serif !important;     }     .h1, .h2 { font-family: Cambria, Georgia, serif !important; }     .h2 { line-height: 94% !important;  }     .link  { line-height: 100% !important; }   </style>   <![endif]--><!-- [if gte mso 9]><xml>   <o:OfficeDocumentSettings>     <o:AllowPNG/>     <o:PixelsPerInch>96</o:PixelsPerInch>   </o:OfficeDocumentSettings> </xml><![endif]-->\r\n<table style=\"background-color: #ececec;\" border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td align=\"center\"><!-- [if (gte mso 9)|(IE)]>     <table width=\"800\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"width: 800px;\">       <tr>         <td valign=\"top\">     <![endif]-->\r\n<table class=\"main\" style=\"max-width: 800px; min-width: 680px;\" border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td class=\"layouts-here\" align=\"left\"><!-- Module 2 - Text block -->\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td style=\"background-color: #ffffff; padding: 0 10px;\" align=\"center\">\r\n<table class=\"container\" style=\"width: 640px;\" border=\"0\" width=\"640\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 40px;\" height=\"40\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td align=\"center\"><img src=\"https://d4zd5125vr4p3.cloudfront.net/images/6245ac6679c79.png\" alt=\"Prosperis Gold\" width=\"157\" height=\"106\" /></td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 22px;\" height=\"22\">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<!-- End Module 2 - Text block --> <!-- Module 2 - Text block -->\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td style=\"background-color: #ffffff; padding: 0 10px;\" align=\"center\">\r\n<table class=\"container\" style=\"width: 640px;\" border=\"0\" width=\"640\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td align=\"center\">\r\n<table class=\"title-center\" style=\"background-position: right center; background-repeat: no-repeat; background-image: url(\'\\\'\\\'\');\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr><!-- title -->\r\n<td class=\"h2\" style=\"font-family: \'Playfair Display\', Cambria, Georgia, serif; line-height: 1.13; color: #828386; font-size: 32px; font-weight: 900; padding: 10px 30px; text-align: center;\"><span style=\"font-family: Arial, sans-serif; font-size: 18px;\"><strong>Please Create Your Password</strong></span></td>\r\n<!-- end title --></tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 16px;\" height=\"16\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"text-left\" style=\"color: #666666; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 24px; text-align: left;\">\r\n<p><strong>Dear {{username}}:</strong></p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 16px;\" height=\"16\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"text-left\" style=\"color: #666666; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 24px; text-align: left;\">\r\n<p>You have received this email because you need to create a new password for your account, {{identity}}. Please click&nbsp; the following link to set your new password.</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 22px;\" height=\"22\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td align=\"center\">\r\n<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr><!-- link -->\r\n<td class=\"link\" style=\"color: #cf9e2a; font-family: Lato, Arial, sans-serif; font-size: 14px; line-height: 1;\"><strong><span style=\"font-size: 20px;\"><a style=\"color: #cf9e2a; text-decoration: none;\" href=\"{{actual_link}}\">Click Here to Set Your New Password</a></span></strong></td>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 14px;\" width=\"7\">&nbsp;</td>\r\n<!-- icon -->\r\n<td class=\"icon\" style=\"border-collapse: collapse; font-size: 0; line-height: 1; width: 11px;\" width=\"11\">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 28px;\" height=\"28\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"text-left\" style=\"color: #666666; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 24px; text-align: left;\">\r\n<p><em>To Your Prosperity,</em></p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 8px;\" height=\"8\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"text-left\" style=\"color: #666666; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 24px; text-align: left;\">\r\n<p><strong>The Thrift2win Team</strong></p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 68px;\" height=\"68\">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<!-- End Module 2 - Text block --> <!-- Module 9 - 3 columns with icon and text -->\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td class=\"color-bg\" style=\"background-color: #cf9e2a; padding: 0px 10px;\" align=\"center\">\r\n<table class=\"container\" style=\"width: 640px;\" border=\"0\" width=\"640\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 40px;\" height=\"40\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 16px;\" height=\"16\">&nbsp;</td>\r\n</tr>\r\n<tr><!-- content -->\r\n<td class=\"h2\" style=\"color: #ffffff; font-family: \'Lato\', Arial, sans-serif; text-align: center;\">Thrift2win is your Thrifting and Savings Partner.</td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 33px;\" height=\"33\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 200px;\" align=\"left\" width=\"200\"><!-- column 1 -->\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr><!-- icon -->\r\n<td class=\"icon\" style=\"border-collapse: collapse; font-size: 0; line-height: 1;\" align=\"center\"><img style=\"border: none; display: block;\" src=\"https://s3.us-east-2.amazonaws.com/obs-emailer/prosperis/ico-result1.png\" alt=\"\" width=\"66\" /></td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 15px;\" height=\"15\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"text\" style=\"color: #ffffff; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 24px; text-align: center;\">Build your wealth and gain the discipline required to save and grow your money. We provide powerful tools to manage thrifts.</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<!-- end column 1 --></th>\r\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 20px; height: 32px;\" width=\"20\" height=\"32\">&nbsp;</th>\r\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 200px;\" align=\"left\" width=\"200\"><!-- column 2 -->\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr><!-- icon -->\r\n<td class=\"icon\" style=\"border-collapse: collapse; font-size: 0; line-height: 1;\" align=\"center\"><img style=\"border: none; display: block;\" src=\"https://s3.us-east-2.amazonaws.com/obs-emailer/prosperis/ico-result2.png\" alt=\"\" width=\"66\" /></td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 15px;\" height=\"15\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"text\" style=\"color: #ffffff; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 24px; text-align: center;\">Manage your thrfting and savings portfolio from the ease of your home or office. Track progress and stay informed.</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<!-- end column 2 --></th>\r\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 20px; height: 32px;\" width=\"20\" height=\"32\">&nbsp;</th>\r\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 200px;\" align=\"left\" width=\"200\"><!-- column 3 -->\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr><!-- icon -->\r\n<td class=\"icon\" style=\"border-collapse: collapse; font-size: 0; line-height: 1;\" align=\"center\"><img style=\"border: none; display: block;\" src=\"https://s3.us-east-2.amazonaws.com/obs-emailer/prosperis/ico-result3.png\" alt=\"\" width=\"66\" /></td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 15px;\" height=\"15\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"text\" style=\"color: #ffffff; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 24px; text-align: center;\">Collaborate and thrift with friends and colleagues in a safe and secure environment. Transparency&nbsp;on all levels.</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<!-- end column 3 --></th>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 34px;\" colspan=\"5\" height=\"34\">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td align=\"center\"><!-- button -->\r\n<table class=\"btn1\" style=\"min-width: 160px;\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td style=\"border-radius: 20px; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 1; padding: 12px 27px 12px; text-align: center; border: 1px solid #ffffff; color: #ffffff;\"><a style=\"color: #ffffff;\" href=\"https://thrift.prosperisgold.com\">MY ACCOUNT</a></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<!-- end button --></td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 70px;\" height=\"70\">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<!-- End Module 9 - 3 columns with icon and text --> <!-- Module 29 - Contacts -->\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td style=\"background-color: #f7f7f7; padding: 0 10px;\" align=\"center\">\r\n<table class=\"container\" style=\"width: 640px;\" border=\"0\" width=\"640\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 40px;\" height=\"40\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td align=\"center\">\r\n<table class=\"title-center\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr><!-- title -->\r\n<td class=\"h2\" style=\"font-family: \'Playfair Display\', Cambria, Georgia, serif; line-height: 1.13; color: #828386; font-size: 32px; font-weight: 900; padding: 10px 30px; text-align: center;\"><span style=\"font-size: 22px;\">Let\'s Help You Prosper!</span></td>\r\n<!-- end title --></tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 16px;\" height=\"16\">&nbsp;</td>\r\n</tr>\r\n<tr><!-- content -->\r\n<td class=\"text-center\" style=\"color: #666666; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 24px; text-align: center;\">Evolving the way the world thrifts. We make thrifting and saving easy!</td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 33px;\" height=\"33\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 200px;\" align=\"left\" width=\"200\">\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr><!-- image -->\r\n<td class=\"logo\" style=\"border-collapse: collapse; font-size: 0; line-height: 1;\"><img src=\"https://d4zd5125vr4p3.cloudfront.net/images/6245ac6679c79.png\" alt=\"Prosperis Gold\" width=\"157\" height=\"106\" /></td>\r\n<!-- end image --></tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 12px;\" height=\"12\">&nbsp;</td>\r\n</tr>\r\n<tr><!-- content -->\r\n<td class=\"text\" style=\"color: #666666; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 24px;\">With modern financial technology, Thrift2win blends accountability, discipline, and transparency in our services to help you develop healthy saving habits.</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</th>\r\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 20px; height: 20px;\" width=\"20\" height=\"20\">&nbsp;</th>\r\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 200px;\" align=\"left\" width=\"200\">\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr><!-- image -->\r\n<td class=\"img\" style=\"border-collapse: collapse; font-size: 0; line-height: 1;\" align=\"center\"><img style=\"border: none; display: block;\" src=\"https://s3.us-east-2.amazonaws.com/obs-emailer/prosperis/pg-lady-banner01-400.jpg\" alt=\"Prosperis Gold\" width=\"200\" /></td>\r\n<!-- end image --></tr>\r\n</tbody>\r\n</table>\r\n</th>\r\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 20px; height: 20px;\" width=\"20\" height=\"20\">&nbsp;</th>\r\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 200px;\" align=\"left\" width=\"200\">\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr><!-- title -->\r\n<td class=\"h6\" style=\"font-family: \'Playfair Display\', Cambria, Georgia, serif; line-height: 1; color: #828386; font-size: 20px; font-weight: 900;\">Contact&nbsp;Us</td>\r\n<!-- end title --></tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 12px;\" height=\"12\">&nbsp;</td>\r\n</tr>\r\n<tr><!-- content -->\r\n<td class=\"text\" style=\"color: #666666; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 24px;\">\r\n<p>40B Awori Road,</p>\r\n<p>Dolphine Estate, Ikoyi</p>\r\n<p>Lagos, NIGERIA</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 4px;\" height=\"4\">&nbsp;</td>\r\n</tr>\r\n<tr><!-- content -->\r\n<td class=\"text\" style=\"color: #666666; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 24px;\"><a style=\"color: #666666; text-decoration: none;\" href=\"#\">+234 (907) 662 9963</a><br /> <a style=\"color: #666666; text-decoration: none;\" href=\"mailto:info@prosperisgold.com\">info@thrift2win.com</a><br /> <a style=\"color: #666666; text-decoration: none;\" href=\"https://www.prosperisgold.com\">www.</a><a style=\"color: #666666; text-decoration: none;\" href=\"mailto:info@prosperisgold.com\">thrift2win</a><a style=\"color: #666666; text-decoration: none;\" href=\"https://www.prosperisgold.com\">.com</a></td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 10px;\" height=\"10\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td><!-- social icons -->\r\n<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr>\r\n<td class=\"icon\" style=\"border-collapse: collapse; font-size: 0; line-height: 1;\"><a href=\"http://www.instagram.com/prosperisgold\"><img style=\"border: none; display: block;\" src=\"https://s3.us-east-2.amazonaws.com/obs-emailer/prosperis/ico-instagram-gold.png\" alt=\"Instagram\" width=\"18\" /></a></td>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 1px; width: 20px;\" width=\"20\">&nbsp;</td>\r\n<td class=\"icon\" style=\"border-collapse: collapse; font-size: 0; line-height: 1;\"><a href=\"http://www.facebook.com/prosperisgold\"><img style=\"border: none; display: block;\" src=\"https://s3.us-east-2.amazonaws.com/obs-emailer/prosperis/ico-facebook-gold.png\" alt=\"Facebook\" width=\"18\" /></a></td>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 1px; width: 20px;\" width=\"20\">&nbsp;</td>\r\n<td class=\"icon\" style=\"border-collapse: collapse; font-size: 0; line-height: 1;\"><a href=\"http://www.twitter.com/prosperisgold\"><img style=\"border: none; display: block;\" src=\"https://s3.us-east-2.amazonaws.com/obs-emailer/prosperis/ico-twitter-gold.png\" alt=\"Twitter\" width=\"18\" /></a></td>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 1px; width: 20px;\" width=\"20\">&nbsp;</td>\r\n<td class=\"icon\" style=\"border-collapse: collapse; font-size: 0; line-height: 1;\"><a href=\"http://www.linkeding.com/prosperisgold\"><img style=\"border: none; display: block;\" src=\"https://s3.us-east-2.amazonaws.com/obs-emailer/prosperis/ico-linkedin-gold.png\" alt=\"LinkedIn\" width=\"18\" /></a></td>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 1px; width: 20px;\" width=\"20\">&nbsp;</td>\r\n<td class=\"icon\" style=\"border-collapse: collapse; font-size: 0; line-height: 1;\">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<!-- end social icons --></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</th>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 68px;\" height=\"68\">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<!-- End Module 29 - Contacts --></td>\r\n</tr>\r\n<tr>\r\n<td><!-- Footer -->\r\n<table class=\"footer\" border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td style=\"background-color: #ececec; padding: 0 10px;\" align=\"center\">\r\n<table class=\"container\" style=\"width: 640px;\" border=\"0\" width=\"640\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\"><!-- Spacer -->\r\n<tbody>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 20px;\" height=\"20\">&nbsp;</td>\r\n</tr>\r\n<!-- End Spacer -->\r\n<tr>\r\n<td>\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 300px;\" align=\"left\" width=\"300\"><!-- Copyright -->\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td class=\"text\" style=\"color: #2e2a41; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 22px;\">Copyright &copy; 2018&nbsp;Thrift2win</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</th>\r\n<th class=\"col height-0\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 40px; line-height: 10px;\" align=\"left\" width=\"40\" height=\"10\">&nbsp;</th>\r\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 300px;\" align=\"left\" width=\"300\"><!-- Unsubscribe -->\r\n<table class=\"full\" border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr>\r\n<td class=\"text\" style=\"color: #2e2a41; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 22px; text-align: right;\"><a href=\"http://www.prosperisgold.com\">www.</a><a style=\"color: #666666; text-decoration: none;\" href=\"mailto:info@prosperisgold.com\">thrift2win</a><a href=\"http://www.prosperisgold.com\">.com</a></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</th>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n<!-- Spacer -->\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 20px;\" height=\"20\">&nbsp;</td>\r\n</tr>\r\n<!-- End Spacer --></tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<!-- End Footer --></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<!-- [if (gte mso 9)|(IE)]>     </td>     </tr>     </table>     <![endif]--></td>\r\n</tr>\r\n</tbody>\r\n</table>'),
(37, 'thrift2win_invitation', 'New Thrift2Win Invitation', '<!-- [if gte mso 9]> <style type=\"text/css\"> body, table, tr, td, h1, h2, h3, h4, h5, h6, ul, li, ol, dl, dd, dt { font-family: Helvetica, Arial, sans-serif !important; } .h1, .h2 { font-family: Cambria, Georgia, serif !important; } .h2 { line-height: 94% !important; } .link { line-height: 100% !important; } </style> <![endif]--><!-- [if gte mso 9]><xml> <o:OfficeDocumentSettings> <o:AllowPNG/> <o:PixelsPerInch>96</o:PixelsPerInch> </o:OfficeDocumentSettings> </xml><![endif]-->\r\n<table style=\"background-color: #ececec;\" border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td align=\"center\"><!-- [if (gte mso 9)|(IE)]> <table width=\"800\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"width: 800px;\"> <tr> <td valign=\"top\"> <![endif]-->\r\n<table class=\"main\" style=\"max-width: 800px; min-width: 680px;\" border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td class=\"layouts-here\" align=\"left\"><!-- Module 2 - Text block -->\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td style=\"background-color: #ffffff; padding: 0 10px;\" align=\"center\">\r\n<table class=\"container\" style=\"width: 640px;\" border=\"0\" width=\"640\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 40px;\" height=\"40\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td align=\"center\"><img src=\"https://d4zd5125vr4p3.cloudfront.net/images/6245ac6679c79.png\" alt=\"Prosperis Gold\" width=\"157\" height=\"106\" /></td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 22px;\" height=\"22\">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<!-- End Module 2 - Text block --> <!-- Module 2 - Text block -->\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td style=\"background-color: #ffffff; padding: 0 10px;\" align=\"center\">\r\n<table class=\"container\" style=\"width: 640px;\" border=\"0\" width=\"640\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td align=\"center\">\r\n<table class=\"title-center\" style=\"background-position: right center; background-repeat: no-repeat; background-image: url(\'\\\'\\\'\');\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr><!-- title -->\r\n<td class=\"h2\" style=\"font-family: \'Playfair Display\', Cambria, Georgia, serif; line-height: 1.13; color: #828386; font-size: 32px; font-weight: 900; padding: 10px 30px; text-align: center;\"><span style=\"font-family: Arial, sans-serif; font-size: 18px;\"><strong>Change In thrift group</strong></span></td>\r\n<!-- end title --></tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 16px;\" height=\"16\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"text-left\" style=\"color: #666666; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 24px; text-align: left;\">\r\n<p><strong>Dear {{username}}:</strong></p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 16px;\" height=\"16\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"text-left\" style=\"color: #666666; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 24px; text-align: left;\">\r\n<p>There has been some changes to one of your Thrift2win thrift groups. Here are the new settings:</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Thrift Start Date/Time:</strong> {{thrift_start_date}}<br /> <strong>Contribution Amount:</strong> {{contribution_amount}}<br /> <strong>Current Participants:</strong></p>\r\n<p>{{small_invited_members_view}}</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 22px;\" height=\"22\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td align=\"center\">\r\n<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr><!-- link -->\r\n<td class=\"link\" style=\"color: #cf9e2a; font-family: Lato, Arial, sans-serif; font-size: 14px; line-height: 1;\"><strong><span style=\"font-size: 20px;\"><a style=\"color: #cf9e2a; text-decoration: none;\" href=\"{{actual_link}}\">View Your Invitation Securely Here</a></span></strong></td>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 14px;\" width=\"7\">&nbsp;</td>\r\n<!-- icon -->\r\n<td class=\"icon\" style=\"border-collapse: collapse; font-size: 0; line-height: 1; width: 11px;\" width=\"11\">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 28px;\" height=\"28\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"text-left\" style=\"color: #666666; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 24px; text-align: left;\">\r\n<p><em>To Your Prosperity,</em></p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 8px;\" height=\"8\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"text-left\" style=\"color: #666666; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 24px; text-align: left;\">\r\n<p><strong>The Thrift2win Team</strong></p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 68px;\" height=\"68\">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<!-- End Module 2 - Text block --> <!-- Module 9 - 3 columns with icon and text -->\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td class=\"color-bg\" style=\"background-color: #cf9e2a; padding: 0px 10px;\" align=\"center\">\r\n<table class=\"container\" style=\"width: 640px;\" border=\"0\" width=\"640\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 40px;\" height=\"40\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 16px;\" height=\"16\">&nbsp;</td>\r\n</tr>\r\n<tr><!-- content -->\r\n<td class=\"h2\" style=\"color: #ffffff; font-family: \'Lato\', Arial, sans-serif; text-align: center;\">Thrift2win is your Thrifting and Savings Partner.</td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 33px;\" height=\"33\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 200px;\" align=\"left\" width=\"200\"><!-- column 1 -->\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr><!-- icon -->\r\n<td class=\"icon\" style=\"border-collapse: collapse; font-size: 0; line-height: 1;\" align=\"center\"><img style=\"border: none; display: block;\" src=\"https://s3.us-east-2.amazonaws.com/obs-emailer/prosperis/ico-result1.png\" alt=\"\" width=\"66\" /></td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 15px;\" height=\"15\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"text\" style=\"color: #ffffff; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 24px; text-align: center;\">Build your wealth and gain the discipline required to save and grow your money. We provide powerful tools to manage thrifts.</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<!-- end column 1 --></th>\r\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 20px; height: 32px;\" width=\"20\" height=\"32\">&nbsp;</th>\r\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 200px;\" align=\"left\" width=\"200\"><!-- column 2 -->\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr><!-- icon -->\r\n<td class=\"icon\" style=\"border-collapse: collapse; font-size: 0; line-height: 1;\" align=\"center\"><img style=\"border: none; display: block;\" src=\"https://s3.us-east-2.amazonaws.com/obs-emailer/prosperis/ico-result2.png\" alt=\"\" width=\"66\" /></td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 15px;\" height=\"15\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"text\" style=\"color: #ffffff; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 24px; text-align: center;\">Manage your thrfting and savings portfolio from the ease of your home or office. Track progress and stay informed.</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<!-- end column 2 --></th>\r\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 20px; height: 32px;\" width=\"20\" height=\"32\">&nbsp;</th>\r\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 200px;\" align=\"left\" width=\"200\"><!-- column 3 -->\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr><!-- icon -->\r\n<td class=\"icon\" style=\"border-collapse: collapse; font-size: 0; line-height: 1;\" align=\"center\"><img style=\"border: none; display: block;\" src=\"https://s3.us-east-2.amazonaws.com/obs-emailer/prosperis/ico-result3.png\" alt=\"\" width=\"66\" /></td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 15px;\" height=\"15\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"text\" style=\"color: #ffffff; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 24px; text-align: center;\">Collaborate and thrift with friends and colleagues in a safe and secure environment. Transparency&nbsp;on all levels.</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<!-- end column 3 --></th>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 34px;\" colspan=\"5\" height=\"34\">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td align=\"center\"><!-- button -->\r\n<table class=\"btn1\" style=\"min-width: 160px;\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td style=\"border-radius: 20px; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 1; padding: 12px 27px 12px; text-align: center; border: 1px solid #ffffff; color: #ffffff;\"><a style=\"color: #ffffff;\" href=\"https://thrift.prosperisgold.com\">MY ACCOUNT</a></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<!-- end button --></td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 70px;\" height=\"70\">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<!-- End Module 9 - 3 columns with icon and text --> <!-- Module 29 - Contacts -->\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td style=\"background-color: #f7f7f7; padding: 0 10px;\" align=\"center\">\r\n<table class=\"container\" style=\"width: 640px;\" border=\"0\" width=\"640\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 40px;\" height=\"40\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td align=\"center\">\r\n<table class=\"title-center\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr><!-- title -->\r\n<td class=\"h2\" style=\"font-family: \'Playfair Display\', Cambria, Georgia, serif; line-height: 1.13; color: #828386; font-size: 32px; font-weight: 900; padding: 10px 30px; text-align: center;\"><span style=\"font-size: 22px;\">Let\'s Help You Prosper!</span></td>\r\n<!-- end title --></tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 16px;\" height=\"16\">&nbsp;</td>\r\n</tr>\r\n<tr><!-- content -->\r\n<td class=\"text-center\" style=\"color: #666666; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 24px; text-align: center;\">Evolving the way the world thrifts. We make thrifting and saving easy!</td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 33px;\" height=\"33\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 200px;\" align=\"left\" width=\"200\">\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr><!-- image -->\r\n<td class=\"logo\" style=\"border-collapse: collapse; font-size: 0; line-height: 1;\"><img src=\"https://d4zd5125vr4p3.cloudfront.net/images/6245ac6679c79.png\" alt=\"Prosperis Gold\" width=\"157\" height=\"106\" /></td>\r\n<!-- end image --></tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 12px;\" height=\"12\">&nbsp;</td>\r\n</tr>\r\n<tr><!-- content -->\r\n<td class=\"text\" style=\"color: #666666; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 24px;\">With modern financial technology, Thrift2win blends accountability, discipline, and transparency in our services to help you develop healthy saving habits.</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</th>\r\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 20px; height: 20px;\" width=\"20\" height=\"20\">&nbsp;</th>\r\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 200px;\" align=\"left\" width=\"200\">\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr><!-- image -->\r\n<td class=\"img\" style=\"border-collapse: collapse; font-size: 0; line-height: 1;\" align=\"center\"><img style=\"border: none; display: block;\" src=\"https://s3.us-east-2.amazonaws.com/obs-emailer/prosperis/pg-lady-banner01-400.jpg\" alt=\"Prosperis Gold\" width=\"200\" /></td>\r\n<!-- end image --></tr>\r\n</tbody>\r\n</table>\r\n</th>\r\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 20px; height: 20px;\" width=\"20\" height=\"20\">&nbsp;</th>\r\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 200px;\" align=\"left\" width=\"200\">\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr><!-- title -->\r\n<td class=\"h6\" style=\"font-family: \'Playfair Display\', Cambria, Georgia, serif; line-height: 1; color: #828386; font-size: 20px; font-weight: 900;\">Contact&nbsp;Us</td>\r\n<!-- end title --></tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 12px;\" height=\"12\">&nbsp;</td>\r\n</tr>\r\n<tr><!-- content -->\r\n<td class=\"text\" style=\"color: #666666; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 24px;\">\r\n<p>40B Awori Road,</p>\r\n<p>Dolphine Estate, Ikoyi</p>\r\n<p>Lagos, NIGERIA</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 4px;\" height=\"4\">&nbsp;</td>\r\n</tr>\r\n<tr><!-- content -->\r\n<td class=\"text\" style=\"color: #666666; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 24px;\"><a style=\"color: #666666; text-decoration: none;\" href=\"#\">+234 (907) 662 9963</a><br /> <a style=\"color: #666666; text-decoration: none;\" href=\"mailto:info@prosperisgold.com\">info@thrift2win.com</a><br /> <a style=\"color: #666666; text-decoration: none;\" href=\"https://www.prosperisgold.com\">www.</a><a style=\"color: #666666; text-decoration: none;\" href=\"mailto:info@prosperisgold.com\">thrift2win</a><a style=\"color: #666666; text-decoration: none;\" href=\"https://www.prosperisgold.com\">.com</a></td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 10px;\" height=\"10\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td><!-- social icons -->\r\n<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr>\r\n<td class=\"icon\" style=\"border-collapse: collapse; font-size: 0; line-height: 1;\"><a href=\"http://www.instagram.com/prosperisgold\"><img style=\"border: none; display: block;\" src=\"https://s3.us-east-2.amazonaws.com/obs-emailer/prosperis/ico-instagram-gold.png\" alt=\"Instagram\" width=\"18\" /></a></td>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 1px; width: 20px;\" width=\"20\">&nbsp;</td>\r\n<td class=\"icon\" style=\"border-collapse: collapse; font-size: 0; line-height: 1;\"><a href=\"http://www.facebook.com/prosperisgold\"><img style=\"border: none; display: block;\" src=\"https://s3.us-east-2.amazonaws.com/obs-emailer/prosperis/ico-facebook-gold.png\" alt=\"Facebook\" width=\"18\" /></a></td>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 1px; width: 20px;\" width=\"20\">&nbsp;</td>\r\n<td class=\"icon\" style=\"border-collapse: collapse; font-size: 0; line-height: 1;\"><a href=\"http://www.twitter.com/prosperisgold\"><img style=\"border: none; display: block;\" src=\"https://s3.us-east-2.amazonaws.com/obs-emailer/prosperis/ico-twitter-gold.png\" alt=\"Twitter\" width=\"18\" /></a></td>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 1px; width: 20px;\" width=\"20\">&nbsp;</td>\r\n<td class=\"icon\" style=\"border-collapse: collapse; font-size: 0; line-height: 1;\"><a href=\"http://www.linkeding.com/prosperisgold\"><img style=\"border: none; display: block;\" src=\"https://s3.us-east-2.amazonaws.com/obs-emailer/prosperis/ico-linkedin-gold.png\" alt=\"LinkedIn\" width=\"18\" /></a></td>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 1px; width: 20px;\" width=\"20\">&nbsp;</td>\r\n<td class=\"icon\" style=\"border-collapse: collapse; font-size: 0; line-height: 1;\">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<!-- end social icons --></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</th>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 68px;\" height=\"68\">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<!-- End Module 29 - Contacts --></td>\r\n</tr>\r\n<tr>\r\n<td><!-- Footer -->\r\n<table class=\"footer\" border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td style=\"background-color: #ececec; padding: 0 10px;\" align=\"center\">\r\n<table class=\"container\" style=\"width: 640px;\" border=\"0\" width=\"640\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\"><!-- Spacer -->\r\n<tbody>\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 20px;\" height=\"20\">&nbsp;</td>\r\n</tr>\r\n<!-- End Spacer -->\r\n<tr>\r\n<td>\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 300px;\" align=\"left\" width=\"300\"><!-- Copyright -->\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td class=\"text\" style=\"color: #2e2a41; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 22px;\">Copyright &copy; 2018&nbsp;Thrift2win</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</th>\r\n<th class=\"col height-0\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 40px; line-height: 10px;\" align=\"left\" width=\"40\" height=\"10\">&nbsp;</th>\r\n<th class=\"col\" style=\"font-weight: 400; padding: 0; vertical-align: top; width: 300px;\" align=\"left\" width=\"300\"><!-- Unsubscribe -->\r\n<table class=\"full\" border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr>\r\n<td class=\"text\" style=\"color: #2e2a41; font-family: \'Lato\', Arial, sans-serif; font-size: 14px; line-height: 22px; text-align: right;\"><a href=\"http://www.prosperisgold.com\">www.</a><a style=\"color: #666666; text-decoration: none;\" href=\"mailto:info@prosperisgold.com\">thrift2win</a><a href=\"http://www.prosperisgold.com\">.com</a></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</th>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n<!-- Spacer -->\r\n<tr>\r\n<td class=\"space\" style=\"font-size: 1px; line-height: 20px;\" height=\"20\">&nbsp;</td>\r\n</tr>\r\n<!-- End Spacer --></tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<!-- End Footer --></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<!-- [if (gte mso 9)|(IE)]> </td> </tr> </table> <![endif]--></td>\r\n</tr>\r\n</tbody>\r\n</table>');

-- --------------------------------------------------------

--
-- Table structure for table `thrift_two_win`
--

CREATE TABLE `thrift_two_win` (
  `id` int(11) NOT NULL,
  `thrift_group_number` varchar(100) NOT NULL,
  `thrift_name` varchar(255) NOT NULL,
  `thrift_description` text DEFAULT NULL,
  `thrift_group_term_duration` int(11) NOT NULL,
  `thrift_group_product_price` decimal(20,0) NOT NULL,
  `thrift_group_start_date` timestamp NULL DEFAULT NULL,
  `thrift_group_member_count` int(1) NOT NULL,
  `thrift_group_creation_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_member` int(11) UNSIGNED NOT NULL,
  `thrift_group_open` int(1) NOT NULL,
  `thrift_group_end_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `thrift_two_win`
--

INSERT INTO `thrift_two_win` (`id`, `thrift_group_number`, `thrift_name`, `thrift_description`, `thrift_group_term_duration`, `thrift_group_product_price`, `thrift_group_start_date`, `thrift_group_member_count`, `thrift_group_creation_date`, `created_member`, `thrift_group_open`, `thrift_group_end_date`, `updated_at`) VALUES
(1, 'T2W00001', 'First Thrift', '', 8, '500', '2022-03-19 18:00:00', 11, '2022-03-27 01:43:03', 1, 0, '2022-04-02 18:00:00', '2022-04-05 03:48:45'),
(2, 'T2W00002', 'four Thrift', '', 8, '1500', '2022-03-19 18:00:00', 3, '2022-03-27 21:27:36', 103, 0, '2022-04-03 18:00:00', '2022-04-05 03:48:50'),
(3, 'T2W00003', 'Thrift five', '', 8, '1200', '2022-03-19 18:00:00', 4, '2022-03-30 06:59:10', 104, 1, '2022-11-19 18:00:00', '2022-04-05 03:40:27'),
(4, 'T2W00004', 'Thrift new', '', 8, '1600', '2022-03-29 18:00:00', 2, '2022-03-30 10:13:23', 102, 1, '2022-11-29 18:00:00', '2022-04-05 03:40:19'),
(5, 'T2W00005', 'Thrift check join', '', 5, '900', '2022-03-29 18:00:00', 10, '2022-03-30 11:21:19', 102, 1, '2022-08-29 18:00:00', '2022-04-05 03:40:11'),
(6, 'T2W00006', 'My thrift one', '', 8, '1200', '2022-03-04 18:00:00', 9, '2022-04-03 03:49:49', 106, 0, '2022-04-04 18:00:00', '2022-04-13 06:24:53'),
(7, 'T2W00007', 'My thrift Two', '', 8, '100', '2022-03-04 18:00:00', 0, '2022-04-03 04:58:45', 106, 1, '2022-11-04 18:00:00', '2022-04-03 04:58:45'),
(8, 'T2W00008', 'My thrift Two', '', 8, '100', '2022-03-04 18:00:00', 0, '2022-04-03 05:32:22', 106, 1, '2022-04-03 18:00:00', '2022-04-05 06:23:43'),
(9, 'T2W00009', 'My thrift Two', '', 8, '100', '2022-06-01 18:00:00', 0, '2022-04-03 06:04:59', 106, 1, '2023-02-01 18:00:00', '2022-04-03 06:04:59');

-- --------------------------------------------------------

--
-- Table structure for table `thrift_two_win_bank`
--

CREATE TABLE `thrift_two_win_bank` (
  `bank_id` int(11) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `bank_code` varchar(50) NOT NULL,
  `bank_active_status` tinyint(1) NOT NULL DEFAULT 1,
  `bank_deletion_status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `thrift_two_win_bank`
--

INSERT INTO `thrift_two_win_bank` (`bank_id`, `bank_name`, `bank_code`, `bank_active_status`, `bank_deletion_status`) VALUES
(1, 'Access Bank', '036', 0, 0),
(2, 'ALAT by WEMA', '035', 1, 0),
(3, 'Citibank Nigeria', '023', 1, 0),
(4, 'Diamond Bank', '063', 1, 0),
(5, 'Ecobank Nigeria', '050', 1, 0),
(6, 'Enterprise Bank', '084', 1, 0),
(7, 'Fidelity Bank', '070', 1, 0),
(8, 'First Bank of Nigeria', '011', 1, 0),
(9, 'First City Monument Bank', '214', 1, 0),
(10, 'Guaranty Trust Bank', '058', 1, 0),
(11, 'Heritage Bank', '030', 1, 0),
(12, 'Jaiz Bank', '301', 1, 0),
(13, 'Keystone Bank', '082', 1, 0),
(14, 'MainStreet Bank', '014', 1, 0),
(15, 'Parallex Bank', '526', 1, 0),
(16, 'Providus Bank', '101', 1, 0),
(17, 'Skye Bank', '076', 1, 0),
(18, 'Stanbic IBTC Bank', '221', 1, 0),
(19, 'Standard Chartered Bank', '068', 1, 0),
(20, 'Sterling Bank', '232', 1, 0),
(21, 'Suntrust Bank', '100', 1, 0),
(22, 'Union Bank of Nigeria', '032', 1, 0),
(23, 'United Bank For Africa', '033', 1, 0),
(24, 'Unity Bank', '215', 1, 0),
(26, 'Zenith Bank', '057', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `thrift_two_win_bank_account`
--

CREATE TABLE `thrift_two_win_bank_account` (
  `id` int(11) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `bank_code` varchar(50) NOT NULL,
  `account_number` varchar(50) DEFAULT NULL,
  `beneficiary` varchar(255) NOT NULL,
  `recipient_id` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `thrift_two_win_bank_account`
--

INSERT INTO `thrift_two_win_bank_account` (`id`, `user_id`, `bank_code`, `account_number`, `beneficiary`, `recipient_id`) VALUES
(1, 102, '035', '1212321', 'hhhhhhhhhhhh', NULL),
(2, 107, '050', '232323', 'jhon cena', NULL),
(6, 109, '050', '3772029344', 'John Doe', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `thrift_two_win_deposits`
--

CREATE TABLE `thrift_two_win_deposits` (
  `id` int(11) NOT NULL,
  `thrift_group_id` int(11) NOT NULL,
  `deposits_amount` decimal(20,0) NOT NULL,
  `deposits_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `thrift_two_win_deposits`
--

INSERT INTO `thrift_two_win_deposits` (`id`, `thrift_group_id`, `deposits_amount`, `deposits_date`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(6, 1, '167', '2022-03-27 18:00:00', 103, 1, '2022-03-28 08:24:19', '2022-03-28 08:24:19'),
(8, 2, '500', '2022-03-27 21:34:38', 103, 1, '2022-03-28 08:34:38', '2022-03-28 08:34:38'),
(9, 2, '1500', '2022-03-27 18:00:00', 103, 1, '2022-03-28 08:37:06', '2022-03-28 08:37:06'),
(10, 2, '1500', '2022-03-27 18:00:00', 1, 1, '2022-03-28 08:37:06', '2022-03-28 08:37:06'),
(12, 4, '1600', '2022-03-30 10:22:13', 102, 1, '2022-03-30 10:22:13', '2022-03-30 10:22:13'),
(25, 5, '300', '2022-03-30 12:11:32', 107, 1, '2022-03-30 12:11:32', '2022-03-30 12:11:32'),
(27, 6, '1000', '2022-04-03 04:01:06', 108, 1, '2022-04-03 04:01:06', '2022-04-03 04:01:06'),
(28, 6, '1000', '2022-04-03 06:36:21', 109, 1, '2022-04-03 06:36:21', '2022-04-03 06:36:21'),
(29, 6, '1000', '2022-04-03 06:36:24', 109, 1, '2022-04-03 06:36:24', '2022-04-03 06:36:24'),
(30, 1, '1000', '2022-04-05 03:46:19', 109, 1, '2022-04-05 03:46:19', '2022-04-05 03:46:19'),
(31, 2, '1100', '2022-04-05 03:46:35', 109, 1, '2022-04-05 03:46:35', '2022-04-05 03:46:35'),
(32, 3, '1200', '2022-04-05 03:46:49', 109, 1, '2022-04-05 03:46:49', '2022-04-05 03:46:49'),
(33, 4, '1300', '2022-04-05 03:47:09', 109, 1, '2022-04-05 03:47:09', '2022-04-05 03:47:09'),
(34, 5, '1400', '2022-04-05 03:47:21', 109, 1, '2022-04-05 03:47:21', '2022-04-05 03:47:21'),
(35, 6, '1500', '2022-04-05 03:47:33', 109, 1, '2022-04-05 03:47:33', '2022-04-05 03:47:33'),
(36, 6, '1200', '2022-04-12 18:00:00', 108, 1, '2022-04-13 06:24:52', '2022-04-13 06:24:52'),
(37, 6, '1200', '2022-04-12 18:00:00', 109, 1, '2022-04-13 06:24:52', '2022-04-13 06:24:52'),
(38, 6, '120', '2022-04-12 18:00:00', 109, 1, '2022-04-13 06:24:53', '2022-04-13 06:24:53');

-- --------------------------------------------------------

--
-- Table structure for table `thrift_two_win_faq`
--

CREATE TABLE `thrift_two_win_faq` (
  `id` int(11) NOT NULL,
  `question` text DEFAULT NULL,
  `answer` text DEFAULT NULL,
  `in_order` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `thrift_two_win_faq`
--

INSERT INTO `thrift_two_win_faq` (`id`, `question`, `answer`, `in_order`, `created_at`, `updated_at`) VALUES
(1, 'dfg', 'bhgfb', 0, '2022-04-04 08:58:35', '2022-04-04 08:58:35'),
(2, 'Et ab inventore dolo3', 'Voluptate necessitat3', 0, '2022-04-04 08:59:04', '2022-04-04 10:37:15'),
(3, 'Et ab inventore dolo3', 'Voluptate necessitat3', 0, '2022-04-04 08:59:04', '2022-04-04 10:37:15'),
(4, 'dfg', 'bhgfb', 0, '2022-04-04 08:58:35', '2022-04-04 08:58:35'),
(5, 'Et ab inventore dolo3', 'Voluptate necessitat3', 0, '2022-04-04 08:59:04', '2022-04-04 10:37:15'),
(6, 'Et ab inventore dolo3', 'Voluptate necessitat3', 0, '2022-04-04 08:59:04', '2022-04-04 10:37:15'),
(7, 'dfg', 'bhgfb', 0, '2022-04-04 08:58:35', '2022-04-04 08:58:35'),
(8, 'Et ab inventore dolo3', 'Voluptate necessitat3', 0, '2022-04-04 08:59:04', '2022-04-04 10:37:15'),
(9, 'Et ab inventore dolo3', 'Voluptate necessitat3', 0, '2022-04-04 08:59:04', '2022-04-04 10:37:15'),
(10, 'dfg', 'bhgfb', 0, '2022-04-04 08:58:35', '2022-04-04 08:58:35'),
(11, 'Et ab inventore dolo3', 'Voluptate necessitat3', 0, '2022-04-04 08:59:04', '2022-04-04 10:37:15'),
(12, 'Et ab inventore dolo3', 'Voluptate necessitat3', 0, '2022-04-04 08:59:04', '2022-04-04 10:37:15'),
(13, 'dfg', 'bhgfb', 0, '2022-04-04 08:58:35', '2022-04-04 08:58:35'),
(14, 'Et ab inventore dolo3', 'Voluptate necessitat3', 0, '2022-04-04 08:59:04', '2022-04-04 10:37:15'),
(15, 'Et ab inventore dolo3', 'Voluptate necessitat3', 0, '2022-04-04 08:59:04', '2022-04-04 10:37:15'),
(16, 'dfg', 'bhgfb', 0, '2022-04-04 08:58:35', '2022-04-04 08:58:35'),
(17, 'Et ab inventore dolo3', 'Voluptate necessitat3', 0, '2022-04-04 08:59:04', '2022-04-04 10:37:15'),
(18, 'Et ab inventore dolo3', 'Voluptate necessitat3', 0, '2022-04-04 08:59:04', '2022-04-04 10:37:15'),
(19, 'dfg', 'bhgfb', 0, '2022-04-04 08:58:35', '2022-04-04 08:58:35'),
(20, 'Et ab inventore dolo3', 'Voluptate necessitat3', 0, '2022-04-04 08:59:04', '2022-04-04 10:37:15'),
(21, 'Et ab inventore dolo3', 'Voluptate necessitat3', 0, '2022-04-04 08:59:04', '2022-04-04 10:37:15'),
(22, 'dfg', 'bhgfb', 0, '2022-04-04 08:58:35', '2022-04-04 08:58:35'),
(23, 'Et ab inventore dolo3', 'Voluptate necessitat3', 0, '2022-04-04 08:59:04', '2022-04-04 10:37:15'),
(24, 'Et ab inventore dolo3', 'Voluptate necessitat3', 0, '2022-04-04 08:59:04', '2022-04-04 10:37:15'),
(25, 'dfg', 'bhgfb', 0, '2022-04-04 08:58:35', '2022-04-04 08:58:35'),
(26, 'Et ab inventore dolo3', 'Voluptate necessitat3', 0, '2022-04-04 08:59:04', '2022-04-04 10:37:15'),
(27, 'Et ab inventore dolo3', 'Voluptate necessitat3', 0, '2022-04-04 08:59:04', '2022-04-04 10:37:15'),
(28, 'Et ab inventore dolo3', 'Voluptate necessitat3', 0, '2022-04-04 08:59:04', '2022-04-04 10:37:15'),
(29, 'dfg', 'bhgfb', 0, '2022-04-04 08:58:35', '2022-04-04 08:58:35'),
(30, 'Et ab inventore dolo3', 'Voluptate necessitat3', 0, '2022-04-04 08:59:04', '2022-04-04 10:37:15'),
(31, 'Et ab inventore dolo3', 'Voluptate necessitat3', 0, '2022-04-04 08:59:04', '2022-04-04 10:37:15');

-- --------------------------------------------------------

--
-- Table structure for table `thrift_two_win_invited_member`
--

CREATE TABLE `thrift_two_win_invited_member` (
  `id` int(11) NOT NULL,
  `invited_by_user` int(11) UNSIGNED NOT NULL,
  `thrift_id` int(11) NOT NULL,
  `invited_name` varchar(255) NOT NULL,
  `invited_email` varchar(255) NOT NULL,
  `is_join` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(1) DEFAULT 0,
  `invited_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `thrift_two_win_invited_member`
--

INSERT INTO `thrift_two_win_invited_member` (`id`, `invited_by_user`, `thrift_id`, `invited_name`, `invited_email`, `is_join`, `created_at`, `updated_at`, `status`, `invited_date`) VALUES
(1, 1, 1, '', 'khorshed+2@obsvirtual.com', 1, '2022-03-27 12:44:18', '2022-03-27 12:54:57', 0, '2022-03-27 01:44:18'),
(2, 1, 1, '', 'khorshed+3@obsvirtual.com', 1, '2022-03-27 12:44:18', '2022-03-27 13:40:02', 0, '2022-03-27 01:44:18'),
(4, 1, 1, '', 'khorshed+4@obsvirtual.com', 1, '2022-03-28 04:50:52', '2022-03-28 04:55:05', 0, '2022-03-27 17:50:52'),
(5, 10, 1, '', 'khorshed+7@obsvirtual.com', 0, '2022-03-30 10:16:02', '2022-03-30 10:16:02', 0, '2022-03-30 10:16:02'),
(6, 10, 1, '', 'khorshed+6@obsvirtual.com', 0, '2022-03-30 10:16:02', '2022-03-30 10:16:02', 0, '2022-03-30 10:16:02'),
(7, 10, 4, '', 'khorshed+8@obsvirtual.com', 0, '2022-03-30 10:16:48', '2022-03-30 10:16:48', 0, '2022-03-30 10:16:48'),
(8, 10, 4, '', 'khorshed+7@obsvirtual.com', 0, '2022-03-30 10:16:48', '2022-03-30 10:16:48', 0, '2022-03-30 10:16:48'),
(9, 10, 4, '', 'khorshed+6@obsvirtual.com', 0, '2022-03-30 10:16:48', '2022-03-30 10:16:48', 0, '2022-03-30 10:16:48'),
(10, 106, 5, '', 'khorshed+8@obsvirtual.com', 0, '2022-03-30 11:38:57', '2022-03-30 11:38:57', 0, '2022-03-30 11:38:57'),
(11, 106, 5, '', 'khorshed+7@obsvirtual.com', 1, '2022-03-30 11:38:57', '2022-03-30 11:43:34', 0, '2022-03-30 11:38:57'),
(12, 106, 5, '', 'khorshed+6@obsvirtual.com', 0, '2022-03-30 11:38:57', '2022-03-30 11:38:57', 0, '2022-03-30 11:38:57'),
(13, 106, 6, '', 'khorshed+10@obsvirtual.com', 1, '2022-04-03 03:50:33', '2022-04-03 03:56:13', 0, '2022-04-03 03:50:33'),
(14, 106, 6, '', 'khorshed+11@obsvirtual.com', 1, '2022-04-03 03:50:33', '2022-04-03 04:12:20', 0, '2022-04-03 03:50:33'),
(15, 109, 6, '', 'khorshed+100@obsvirtual.com', 0, '2022-04-04 04:25:58', '2022-04-04 04:25:58', 0, '2022-04-04 04:25:58'),
(16, 109, 5, '', 'khorshed+10@obsvirtual.com', 0, '2022-04-04 04:29:42', '2022-04-04 04:29:42', 0, '2022-04-04 04:29:42'),
(17, 109, 5, '', 'khorshed+10@obsvirtual.co', 0, '2022-04-04 04:53:54', '2022-04-04 04:53:54', 0, '2022-04-04 04:53:54');

-- --------------------------------------------------------

--
-- Table structure for table `thrift_two_win_login_logs`
--

CREATE TABLE `thrift_two_win_login_logs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `thrift_two_win_login_logs`
--

INSERT INTO `thrift_two_win_login_logs` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 109, '2022-04-03 12:15:12', '2022-04-03 12:15:12');

-- --------------------------------------------------------

--
-- Table structure for table `thrift_two_win_member`
--

CREATE TABLE `thrift_two_win_member` (
  `id` int(11) NOT NULL,
  `thrift_group_id` int(11) NOT NULL,
  `thrift_group_member_id` int(11) UNSIGNED NOT NULL,
  `thrift_group_member_join_date` int(11) NOT NULL,
  `thrift_group_member_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `thrift_two_win_member`
--

INSERT INTO `thrift_two_win_member` (`id`, `thrift_group_id`, `thrift_group_member_id`, `thrift_group_member_join_date`, `thrift_group_member_number`) VALUES
(1, 1, 1, 1648384994, 1),
(2, 1, 2, 1648385697, 2),
(10, 1, 103, 1648443305, 10),
(11, 2, 103, 1648456117, 1),
(12, 2, 1, 1648456381, 2),
(13, 3, 104, 1648623590, 1),
(14, 3, 102, 1648635221, 2),
(15, 4, 102, 1648635228, 1),
(16, 5, 106, 1648640065, 1),
(24, 5, 107, 1648642292, 9),
(33, 6, 108, 1648958988, 8),
(34, 6, 109, 1648959140, 9),
(35, 5, 109, 1649130011, 10),
(36, 4, 109, 1649130019, 2),
(37, 3, 109, 1649130027, 4),
(38, 2, 109, 1649130226, 3),
(39, 1, 109, 1649130234, 11);

-- --------------------------------------------------------

--
-- Table structure for table `thrift_two_win_message_archive`
--

CREATE TABLE `thrift_two_win_message_archive` (
  `id` int(11) NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `message_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `thrift_two_win_message_archive`
--

INSERT INTO `thrift_two_win_message_archive` (`id`, `ticket_id`, `message_date`) VALUES
(34, 99, '2022-03-28 20:06:23'),
(36, 22, '2022-03-28 20:08:51'),
(37, 33, '2022-03-28 20:09:29'),
(39, 18, '2022-03-29 17:53:00');

-- --------------------------------------------------------

--
-- Table structure for table `thrift_two_win_payment_log`
--

CREATE TABLE `thrift_two_win_payment_log` (
  `id` int(11) NOT NULL,
  `thrift_group_id` int(11) NOT NULL,
  `deposits_amount` decimal(20,0) NOT NULL,
  `paystack_id` varchar(255) NOT NULL,
  `payment_type` varchar(20) NOT NULL,
  `payment_info` varchar(255) NOT NULL,
  `deposits_date` varchar(10) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `status` int(1) UNSIGNED NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `thrift_two_win_payment_log`
--

INSERT INTO `thrift_two_win_payment_log` (`id`, `thrift_group_id`, `deposits_amount`, `paystack_id`, `payment_type`, `payment_info`, `deposits_date`, `user_id`, `status`, `updated_at`) VALUES
(1, 1, '500', '911112121211', 'card', '{test data}', '2022-03-27', 2, 1, '2022-03-27 12:55:03'),
(2, 1, '500', '911112121211', 'card', '{test data}', '2022-03-27', 2, 1, '2022-03-28 04:35:15'),
(3, 2, '500', '911112121211', 'card', '{test data}', '2022-03-28', 1, 1, '2022-03-28 08:33:41'),
(4, 2, '500', '911112121211', 'card', '{test data}', '2022-03-28', 103, 1, '2022-03-28 08:34:38'),
(5, 4, '1600', '911112121211', 'card', '{test data}', '2022-03-30', 102, 1, '2022-03-30 10:22:13'),
(6, 4, '100', '911112121211', 'card', '{test data}', '2022-03-30', 102, 1, '2022-03-30 10:24:55'),
(7, 5, '100', '911112121211', 'card', '{test data}', '2022-03-30', 102, 1, '2022-03-30 11:24:00'),
(8, 5, '300', '911112121211', 'card', '{test data}', '2022-03-30', 106, 1, '2022-03-30 11:30:38'),
(9, 5, '300', '911112121211', 'card', '{test data}', '2022-03-30', 106, 1, '2022-03-30 11:34:25'),
(10, 5, '300', '911112121211', 'card', '{test data}', '2022-03-30', 107, 1, '2022-03-30 11:43:33'),
(11, 5, '300', '911112121211', 'card', '{test data}', '2022-03-30', 107, 1, '2022-03-30 11:47:51'),
(12, 5, '300', '911112121211', 'card', '{test data}', '2022-03-30', 107, 1, '2022-03-30 11:54:16'),
(13, 5, '300', '911112121211', 'card', '{test data}', '2022-03-30', 107, 1, '2022-03-30 12:00:16'),
(14, 5, '300', '911112121211', 'card', '{test data}', '2022-03-30', 107, 1, '2022-03-30 12:03:24'),
(15, 5, '300', '911112121211', 'card', '{test data}', '2022-03-30', 107, 1, '2022-03-30 12:04:13'),
(16, 5, '300', '911112121211', 'card', '{test data}', '2022-03-30', 107, 1, '2022-03-30 12:05:26'),
(17, 5, '300', '911112121211', 'card', '{test data}', '2022-03-30', 107, 1, '2022-03-30 12:08:07'),
(18, 5, '300', '911112121211', 'card', '{test data}', '2022-03-30', 107, 1, '2022-03-30 12:11:32'),
(19, 6, '1000', '21212111111111', 'card', '{test data}', '2022-04-03', 108, 1, '2022-04-03 03:56:19'),
(20, 6, '1000', '21212111111111', 'card', '{test data}', '2022-04-03', 108, 1, '2022-04-03 04:01:06'),
(21, 6, '1000', '21212111111111', 'card', '{test data}', '2022-04-03', 109, 1, '2022-04-03 06:36:21'),
(22, 6, '1000', '21212111111111', 'card', '{test data}', '2022-04-03', 109, 1, '2022-04-03 06:36:24'),
(23, 1, '1000', '21212111111111', 'card', '{test data}', '2022-04-05', 109, 1, '2022-04-05 03:46:19'),
(24, 2, '1100', '21212111111111', 'card', '{test data}', '2022-04-05', 109, 1, '2022-04-05 03:46:35'),
(25, 3, '1200', '21212111111111', 'card', '{test data}', '2022-04-05', 109, 1, '2022-04-05 03:46:49'),
(26, 4, '1300', '21212111111111', 'card', '{test data}', '2022-04-05', 109, 1, '2022-04-05 03:47:09'),
(27, 5, '1400', '21212111111111', 'card', '{test data}', '2022-04-05', 109, 1, '2022-04-05 03:47:21'),
(28, 6, '1500', '21212111111111', 'card', '{test data}', '2022-04-05', 109, 1, '2022-04-05 03:47:33');

-- --------------------------------------------------------

--
-- Table structure for table `thrift_two_win_pins`
--

CREATE TABLE `thrift_two_win_pins` (
  `id` int(11) NOT NULL,
  `pin` varchar(60) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `status` int(1) UNSIGNED NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `thrift_two_win_referral_amount`
--

CREATE TABLE `thrift_two_win_referral_amount` (
  `id` int(11) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `referral_amount` decimal(10,2) NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `thrift_two_win_referral_amount`
--

INSERT INTO `thrift_two_win_referral_amount` (`id`, `user_id`, `referral_amount`, `purpose`, `created_at`, `updated_at`) VALUES
(1, 1, '25.00', 'Referral bonus-userid: 2', '2022-03-27 12:54:57', '2022-03-27 12:54:57'),
(2, 1, '50.00', 'Referral bonus-userid: 3', '2022-03-27 13:40:02', '2022-03-27 13:40:02'),
(3, 1, '55.00', 'Referral bonus-userid: 103', '2022-03-28 04:55:05', '2022-03-28 04:55:05'),
(4, 2, '33.00', 'Referral bonus-userid: 2', '2022-03-28 04:55:05', '2022-03-28 05:44:03'),
(5, 1, '165.00', 'Referral bonus-userid: 103', '2022-03-28 08:28:37', '2022-03-28 08:28:37'),
(6, 10, '99.00', 'Referral bonus-userid: 106', '2022-03-30 11:34:25', '2022-03-30 11:34:25'),
(10, 10, '99.00', 'Referral bonus-userid: 107', '2022-03-30 12:11:32', '2022-03-30 12:11:32'),
(13, 106, '180.00', 'Referral bonus-userid: 108', '2022-04-03 04:09:48', '2022-04-03 04:09:48'),
(14, 106, '180.00', 'Referral bonus-userid: 109', '2022-04-03 04:12:20', '2022-04-03 04:12:20'),
(15, 106, '135.00', 'Referral bonus-userid: 109', '2022-04-05 03:40:11', '2022-04-05 03:40:11'),
(16, 106, '240.00', 'Referral bonus-userid: 109', '2022-04-05 03:40:19', '2022-04-05 03:40:19'),
(17, 106, '180.00', 'Referral bonus-userid: 109', '2022-04-05 03:40:27', '2022-04-05 03:40:27'),
(18, 106, '225.00', 'Referral bonus-userid: 109', '2022-04-05 03:43:46', '2022-04-05 03:43:46'),
(19, 106, '75.00', 'Referral bonus-userid: 109', '2022-04-05 03:43:54', '2022-04-05 03:43:54');

-- --------------------------------------------------------

--
-- Table structure for table `thrift_two_win_user_bvn`
--

CREATE TABLE `thrift_two_win_user_bvn` (
  `id` int(11) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `bank_code` varchar(50) NOT NULL,
  `account_number` varchar(50) DEFAULT NULL,
  `user_bvn` varchar(50) DEFAULT NULL,
  `beneficiary` varchar(255) NOT NULL,
  `report` text DEFAULT NULL,
  `status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `thrift_two_win_user_bvn`
--

INSERT INTO `thrift_two_win_user_bvn` (`id`, `user_id`, `bank_code`, `account_number`, `user_bvn`, `beneficiary`, `report`, `status`) VALUES
(1, 107, '050', '888', '12121212122', '', '{\n  \"event\": \"customeridentification.success\",\n  \"data\": {\n    \"customer_id\": \"9387490384\",\n    \"customer_code\": \"CUS_y4pprvfby50bj7g\",\n    \"email\": \"bojack@horsinaround.com\",\n    \"identification\": {\n      \"country\": \"NG\",\n      \"type\": \"bvn\",\n      \"value\": \"200*****677\" \n    }\n  }\n}', 2),
(2, 102, '050', '777', '12121212121', '', '{\n  \"event\": \"customeridentification.success\",\n  \"data\": {\n    \"customer_id\": \"9387490384\",\n    \"customer_code\": \"CUS_y4pprvfby50bj7g\",\n    \"email\": \"bojack@horsinaround.com\",\n    \"identification\": {\n      \"country\": \"NG\",\n      \"type\": \"bvn\",\n      \"value\": \"200*****677\" \n    }\n  }\n}', 1),
(4, 109, '050', '3772029344', '21234545345', 'John Doe', '{\"event\":\"customeridentification.success\",\"data\":{\"customer_id\":75418138,\"customer_code\":\"cus_4k009ry0npm0ij1\",\"email\":\"khorshed+11@obsvirtual.com\",\"identification\":{\"country\":\"NG\",\"type\":\"bank_account\",\"bvn\":\"212*****345\",\"account_number\":\"377****344\",\"bank_code\":\"050\"}}}', 1);

-- --------------------------------------------------------

--
-- Table structure for table `thrift_two_win_winner`
--

CREATE TABLE `thrift_two_win_winner` (
  `id` int(11) NOT NULL,
  `thrift_group_id` int(11) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `status` int(1) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `thrift_two_win_winner`
--

INSERT INTO `thrift_two_win_winner` (`id`, `thrift_group_id`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 103, 1, '2022-03-28 08:24:19', '2022-03-28 08:24:19'),
(3, 6, 109, 1, '2022-04-13 06:24:53', '2022-04-13 06:24:53');

-- --------------------------------------------------------

--
-- Table structure for table `thrift_two_win_withdraw`
--

CREATE TABLE `thrift_two_win_withdraw` (
  `id` int(11) NOT NULL,
  `withdraw_amount` decimal(20,0) NOT NULL,
  `withdraw_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `bank_code` varchar(50) DEFAULT NULL,
  `bank_name` varchar(100) DEFAULT NULL,
  `account_number` varchar(50) DEFAULT NULL,
  `beneficiary` varchar(100) DEFAULT NULL,
  `status_details` text DEFAULT '',
  `error_status` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `thrift_two_win_withdraw`
--

INSERT INTO `thrift_two_win_withdraw` (`id`, `withdraw_amount`, `withdraw_date`, `user_id`, `status`, `created_at`, `updated_at`, `bank_code`, `bank_name`, `account_number`, `beneficiary`, `status_details`, `error_status`) VALUES
(1, '100', '2022-03-30 13:06:27', 107, 2, '2022-03-30 13:06:27', '2022-04-19 09:21:50', '050', 'Ecobank Nigeria', '2147483647', '', 'jhu1223', NULL),
(2, '100', '2022-03-30 13:13:03', 107, 2, '2022-03-30 13:13:03', '2022-04-19 09:19:58', '050', 'Ecobank Nigeria', '2147483647', 'jhon cena', '', 'You cannot initiate third party payouts as a starter business'),
(3, '200', '2022-03-23 13:13:03', 107, 2, '2022-03-30 13:13:03', '2022-04-19 08:47:39', '050', 'Ecobank Nigeria', '232323', 'jhon cena', '{\n            \"status\": true,\n            \"message\": \"Transfer has been queued\",\n            \"data\": {\n              \"reference\": \"on5hyz9poe\",\n              \"integration\": 428626,\n              \"domain\": \"test\",\n              \"amount\": 3794800,\n              \"currency\": \"NGN\",\n              \"source\": \"balance\",\n              \"reason\": \"Holiday Flexing\",\n              \"recipient\": 6788170,\n              \"status\": \"success\",\n              \"transfer_code\": \"TRF_fiyxvgkh71e717b\",\n              \"id\": 23070321,\n              \"createdAt\": \"2020-05-13T14:22:49.687Z\",\n              \"updatedAt\": \"2020-05-13T14:22:49.687Z\"\n            }\n          }', NULL),
(4, '100', '2022-04-03 06:40:52', 102, 2, '2022-04-03 06:40:52', '2022-04-03 06:49:16', '035', 'ALAT by WEMA', '1212329', 'raka', '', NULL),
(5, '100', '2022-04-03 07:00:19', 102, 2, '2022-04-03 07:00:19', '2022-04-03 07:01:57', '035', 'ALAT by WEMA', '1212329', 'raka', '', NULL),
(6, '100', '2022-04-03 07:02:01', 102, 2, '2022-04-03 07:02:01', '2022-04-03 07:02:24', '035', 'ALAT by WEMA', '1212329', 'raka', '', NULL),
(7, '100', '2022-04-03 07:02:28', 102, 2, '2022-04-03 07:02:28', '2022-04-03 07:03:34', '035', 'ALAT by WEMA', '1212329', 'raka', '', NULL),
(8, '100', '2022-04-03 07:07:58', 102, 2, '2022-04-03 07:07:58', '2022-04-03 07:08:53', '035', 'ALAT by WEMA', '1212329', 'raka', '', NULL),
(9, '100', '2022-04-03 07:08:58', 102, 2, '2022-04-03 07:08:58', '2022-04-03 07:11:57', '035', 'ALAT by WEMA', '1212329', 'raka', '', NULL),
(10, '100', '2022-04-03 07:12:01', 102, 2, '2022-04-03 07:12:01', '2022-04-03 07:27:46', '035', 'ALAT by WEMA', '1212329', 'raka', '', NULL),
(11, '100', '2022-04-03 07:28:37', 102, 2, '2022-04-03 07:28:37', '2022-04-03 07:30:09', '035', 'ALAT by WEMA', '1212321', 'hhhhhhhhhhhh', '', NULL),
(12, '100', '2022-04-03 08:15:59', 102, 2, '2022-04-03 08:15:59', '2022-04-03 08:17:06', '050', 'Ecobank Nigeria', '777', '', '', NULL),
(13, '100', '2022-04-03 08:23:59', 102, 2, '2022-04-03 08:23:59', '2022-04-19 10:05:00', '035', 'ALAT by WEMA', '1212321', 'hhhhhhhhhhhh', '', NULL),
(14, '100', '2022-04-05 04:32:06', 109, 2, '2022-04-05 04:32:06', '2022-04-19 04:45:39', '035', 'ALAT by WEMA', '1212329', 'raka', '', NULL),
(15, '100', '2022-04-19 04:46:10', 109, 2, '2022-04-19 04:46:10', '2022-04-19 09:42:01', '035', 'ALAT by WEMA', '1212329', 'raka', '', NULL),
(20, '100', '2022-04-19 09:58:51', 109, 2, '2022-04-19 09:58:51', '2022-04-19 10:02:56', '050', 'Ecobank Nigeria', '2147483647', 'yy;', '', NULL),
(21, '100', '2022-04-19 10:05:09', 109, 2, '2022-04-19 10:05:09', '2022-04-19 11:11:25', '050', 'Ecobank Nigeria', '3772029344', 'yy;', '', NULL),
(22, '100', '2022-04-19 11:11:28', 109, 2, '2022-04-19 11:11:28', '2022-04-19 11:12:32', '050', 'Ecobank Nigeria', '3772029344', 'John Doe', '', NULL),
(23, '100', '2022-04-19 11:12:38', 109, 4, '2022-04-19 11:12:38', '2022-04-20 04:50:34', '050', 'Ecobank Nigeria', '3772029344', 'John Doe', '', 'You cannot initiate third party payouts as a starter business');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `mem_id_num` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `salt` varchar(255) NOT NULL DEFAULT '',
  `first_name` varchar(100) NOT NULL DEFAULT '',
  `last_name` varchar(100) NOT NULL DEFAULT '',
  `phone` varchar(100) NOT NULL DEFAULT '',
  `activation_code` varchar(100) NOT NULL DEFAULT '',
  `user_dob` varchar(30) NOT NULL DEFAULT '',
  `user_age` int(3) NOT NULL DEFAULT 18,
  `user_gender` varchar(10) NOT NULL DEFAULT '',
  `user_profile_image` text DEFAULT '',
  `forgotten_password_code` varchar(40) NOT NULL DEFAULT '',
  `forgotten_password_time` int(10) UNSIGNED NOT NULL,
  `remember_code` varchar(40) NOT NULL DEFAULT '',
  `last_login` int(10) UNSIGNED NOT NULL,
  `device_id` varchar(255) DEFAULT NULL,
  `device_os` varchar(100) DEFAULT NULL,
  `active` int(10) UNSIGNED NOT NULL,
  `user_bvn` varchar(11) NOT NULL DEFAULT '',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `referred_by` int(11) DEFAULT 0,
  `pay_customer_id` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `mem_id_num`, `email`, `password`, `salt`, `first_name`, `last_name`, `phone`, `activation_code`, `user_dob`, `user_age`, `user_gender`, `user_profile_image`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `last_login`, `device_id`, `device_os`, `active`, `user_bvn`, `created_at`, `updated_at`, `referred_by`, `pay_customer_id`) VALUES
(1, 'T74358RP', 'renju+2@obsvirtual.com', '$2y$10$oL1TTsOJA3Wlnzynjv/JHOQekYLlU/NthvH3hWweb6/XtnQ8GBK0i', '', 'Renju', 'Prem', '9876543209', '', '770274000', 27, 'male', NULL, '', 0, '', 0, 'cexIQDWBQK-ylwk2dZikhA:APA91bGp3KDnpGuXXGEQJzlLaqpRuLD5QSr8oeLFk7PQjbYQfSG2NGaupy3_eKoaDXnsv0YdYIcxb9RaShV0cIyPUtxL4AAjegLTiPDjQxqPJIP099LjJxDt9zrzuBTF6z6MwHCZewi0', 'android', 1, '78909', '2022-03-02 16:57:46', '2022-03-24 15:52:57', 0, 'CUS_r5vle5lm54iajkv'),
(2, 'T82289KA', 'khorshed@obsvirtual.com', '$2y$10$ivglIjIuazqIcDlDY6fDJeoBU0rw8P0WxziOLPEnkDLLu0MgJ193W', '', 'Kamal2', 'Ahmed', '22222221212', '', '342856800', 41, 'male', NULL, '', 0, '', 0, NULL, NULL, 1, '22229', '2022-03-02 17:01:04', '2022-04-13 12:05:03', 0, 'CUS_bxzavcnb3jozgkc'),
(3, 'T34622SO', 'shome.ashraf+1@obsvirtual.com', '$2y$10$G/baHSxwyIHQ4VoodDOHhOUOwjRlDRjWHxtkHSpLdvy/IPulK20Vy', '', 'Shome', 'One', '191212212345', '', '342856800', 41, 'male', NULL, '', 0, '', 0, NULL, NULL, 1, '12345', '2022-03-02 19:31:09', '2022-03-24 15:52:59', 0, 'CUS_s7gxb3ehqo2rb17'),
(4, 'T49269AO', 'akinsola@obsvirtual.com', '$2y$10$3Yo4.aKnrh6N9mL3p5CGzuXbe112SmPZTNN7sZkNX1SsT2nr6Omky', '', 'Akin', 'One', '1234567890', '', '342856800', 41, 'male', NULL, '', 0, '', 0, NULL, NULL, 1, '12345', '2022-03-03 03:33:23', '2022-03-24 15:53:01', 0, 'CUS_xrn8h9ywye756by'),
(6, 'T23597KF', 'khorshed+4@obsvirtual.com', '$2y$10$XwzqtPdqzdPE2ItblMxDaulNBywjYI3tErdPj31oKigmq.tJdUW4K', '', 'Khoshed', 'Alam', '1234123412', '', '437464800', 38, 'male', 'https://d4zd5125vr4p3.cloudfront.net/images/623220e3d4bdf.png', '', 0, '', 0, 'cexIQDWBQK-ylwk2dZikhA:APA91bGp3KDnpGuXXGEQJzlLaqpRuLD5QSr8oeLFk7PQjbYQfSG2NGaupy3_eKoaDXnsv0YdYIcxb9RaShV0cIyPUtxL4AAjegLTiPDjQxqPJIP099LjJxDt9zrzuBTF6z6MwHCZewi0', 'android', 1, '61458', '2022-03-03 19:41:45', '2022-03-24 15:53:02', 3, 'CUS_25taiqyg2hyxmuy'),
(7, 'T58599SS', 'renju+3@obsvirtual.com', '$2y$10$hoUIG6jUlTViVJz.VJL/v.OnQlZpDJblWxRt3PQ8TPDTzpiD50.qO', '', 'Samuel', 'Swift', '8271453579', '', '631951200', 32, 'male', NULL, '', 0, '', 0, 'cexIQDWBQK-ylwk2dZikhA:APA91bGp3KDnpGuXXGEQJzlLaqpRuLD5QSr8oeLFk7PQjbYQfSG2NGaupy3_eKoaDXnsv0YdYIcxb9RaShV0cIyPUtxL4AAjegLTiPDjQxqPJIP099LjJxDt9zrzuBTF6z6MwHCZewi0', 'android', 1, '80093', '2022-03-04 12:46:02', '2022-03-24 15:53:03', 0, 'CUS_pclwapm4at5iy9g'),
(8, 'T41690RP', 'renju+4@obsvirtual.com', '$2y$10$f7Y/UVpMSSluj2PoMTBlSOUtFLZF/jTY92OcAKT65iosOhw1swU2u', '', 'Renju', 'Prem A', '9876543234', '', '1078207200', 18, 'male', NULL, '', 0, '', 0, 'eWdSSzBlQyyA7KJ5wwY1pH:APA91bE7LhPOBC9N5Ia1KWfBP8WX4icVmX8u0k9zi2kvQNEs-YvCRsupw2zmD8PYuiUk3KiD2RgMGiwZ6q_V46i4yFgKR8OFnioGo2dt6PpezArnQvOQvdRmCU_kfYmp9icdu1NtVmpu', 'android', 1, '90075', '2022-03-04 17:43:59', '2022-03-24 15:53:04', 0, 'CUS_fea808vpdbrmq6g'),
(9, 'T53570SS', 'shola.salako@gmail.com', '$2y$10$3YlomJ9UvPEJG2zzH23ODOG3/K/EBppjdtGBAbQQskLS2XK9UnqRi', '', 'Shola', 'Salako', '08154808805', '', '210834000', 45, 'male', NULL, '', 0, '', 0, 'cgCRmmihR-m7cIEBEW2XoD:APA91bGRbW8BbeCDRjQouX9izIGZKxY-Cl4MhDlyjAk_h1C58IHWgtQWs6WTScRrc6CPlbugZ47bNw4PVxhZA0sSFBHB-j4M6zbCkgyVeaCHcQloOPf6fKgXA7L9fXvznFKWtuTHluRl', 'android', 1, '12345', '2022-03-05 12:44:21', '2022-03-24 15:53:05', 0, 'CUS_eh02u7okveeecn0'),
(10, 'T82777XX', 'khorshed+5@obsvirtual.com', '$2y$10$kTvPEuTtQUrLi1.1DgmoIe9jed./sjjZum0ttKcFdCzwApZ1ElgEW', '', 'Khorshed', 'Five', '191212212311', '', '342856800', 41, 'male', NULL, '', 0, '', 0, NULL, NULL, 1, '', '2022-03-22 07:38:25', '2022-03-24 15:53:06', 3, 'CUS_495an1i76jqsv3m'),
(101, 'T38939SD', 'khorshed+101@obsvirtual.com', '$2y$10$JungiTIp0NN1rpUMFsWEmuBn4s0x1xCzM7h2kYfsst6b/utmqF0ea', '', 'Mr Super', 'Admin', '098765432435', '', '949471200', 22, 'male', '', '', 0, 'Tzn6OfVoYDbw8J9SI5jvakhHEiyN1dxRUsMBrGpg', 0, NULL, NULL, 1, '77777', '2022-03-23 14:56:54', '2022-03-24 15:51:30', 0, 'CUS_nai4rzh73c2fj78'),
(102, 'T72341LM', 'khorshed+102@obsvirtual.com', '$2y$10$oyzr.P.hQPpd/2KMALamfuGGL0pxmT0i5vwNFvFIq5QsWFh7XbqUO', '', 'Mr', 'Admin', '098765432435', '', '949471200', 22, 'male', '', '', 0, 'CmIMnfPWT5Z8EOwAtubBXKeGoJxky1L92QlYsUh3', 0, NULL, NULL, 1, '77777', '2022-03-23 14:56:54', '2022-04-13 06:23:13', 0, 'CUS_y4pprvfby50bj7g'),
(103, 'T56025XX', 'khorshed+13@obsvirtual.com', '$2y$10$Zv7XFhg6I0j/CXA.MSHBNu5J.9jCUWLpt.OZatK9LI9z/zLjWgHEy', '', 'Due', 'jana', '098765432435', '', '949428000', 22, 'male', '', '', 0, '', 0, NULL, NULL, 1, '', '2022-04-03 04:11:20', '2022-04-19 11:09:02', 106, NULL),
(105, 'mem_id_num', 'email', 'password', 'salt', 'first_name', 'last_name', 'phone', 'activation_code', 'user_dob', 0, 'user_gende', 'user_profile_image', 'forgotten_password_code', 0, 'remember_code', 0, 'device_id', 'device_os', 0, 'user_bvn', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'pay_customer_id'),
(106, 'T44221XX', 'khorshed+6@obsvirtual.com', '$2y$10$6BF6oBEk5Aj9wPzwA1TZ5uUrDZTmVas9QFWrrWW88NM9g2y4gcYVO', '', 'Will', 'Smith', '098765432435', '', '949428000', 22, 'male', '', '', 0, '', 0, NULL, NULL, 1, '', '2022-03-30 11:25:31', '2022-03-30 11:25:32', 10, 'CUS_iz4wdjo9qum2gh3'),
(107, 'T44451XX', 'khorshed+7@obsvirtual.com', '$2y$10$.QuLRTLEMWQJjjCW.McH8ur6ozNqH.b9xzXG/9NYv8kopnW05eNW.', '', 'jhon', 'cena', '098765432435', '', '949428000', 22, 'male', '', '', 0, '', 0, NULL, NULL, 1, '', '2022-03-30 11:41:44', '2022-03-30 11:41:46', 10, 'CUS_ctrx50t7a10b6mm'),
(108, 'T54724XX', 'khorshed+10@obsvirtual.com', '$2y$10$JWhceA99meEtJkJ2wFExCufbTgf5EBimtAESgVVXRkq9pvstHywLG', '', 'Due', 'place', '098765432435', '', '949428000', 22, 'male', '', '', 0, '', 0, NULL, NULL, 1, '', '2022-04-03 03:52:32', '2022-04-03 03:52:33', 106, 'CUS_w6ui2y0ikcpmf5g'),
(109, 'T38918DJ', 'khorshed+11@obsvirtual.com', '$2y$10$SJk4cRZKLBptiWxA.K0vsuaqpUJmjf2z9zBzZjbcYExrAiS.M8oEG', '', 'Due', 'jhon', '098765432435', '', '949428000', 22, 'male', '', '', 0, '', 0, NULL, NULL, 1, '', '2022-04-03 04:11:20', '2022-04-06 03:26:50', 106, 'CUS_4k009ry0npm0ij1'),
(110, 'T95895ML', 'pyde@mailinator.com', '$2y$10$7RUAQxgcv0uCUd3qsvxiNeVZrQ9OjEkAeOM0r00F2EVGUIZ27fUX2', '', 'Madeson', 'Leblanc', '', '', '', 18, '', '', '', 0, '', 0, NULL, NULL, 0, '', '2022-04-04 08:50:34', '2022-04-04 08:50:34', 0, NULL),
(111, 'T96655AW', 'ryra@mailinator.com', '$2y$10$roi9GQNrOe4JoopzjEf3n.sJqufyqIwtYDoK7YX4XkEvWoSLjdSny', '', 'Arden', 'Wilcox', '', '', '', 18, '', '', '', 0, '', 0, NULL, NULL, 0, '', '2022-04-04 08:50:58', '2022-04-04 08:50:58', 0, NULL),
(112, 'T77335SP', 'voguz@mailinator.com', '$2y$10$P5Sut1NHcTzS2Idqz6.CueZWmY4ewwFfCxuXJAnwSIHUABcGDKSpa', '', 'Stella', 'Pearson', '', '', '', 18, '', '', '', 0, '', 0, NULL, NULL, 0, '', '2022-04-04 08:54:13', '2022-04-04 08:54:13', 0, NULL),
(113, 'T61110LM', 'dikudegiju@mailinator.com', '$2y$10$A5wIeFRThDvN7vvhrTiHzucp5roGPnkIxjW0K7qjR7szGS3xRDAPm', '', 'Lacota', 'Middleton', '', '', '', 18, '', '', '', 0, '', 0, NULL, NULL, 0, '', '2022-04-13 09:09:24', '2022-04-13 09:09:24', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` bigint(20) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 101, 1),
(2, 102, 2),
(3, 10, 3),
(4, 1, 3),
(5, 2, 3),
(6, 3, 3),
(7, 104, 3),
(8, 106, 3),
(9, 107, 3),
(10, 108, 3),
(11, 109, 3),
(12, 112, 2),
(13, 113, 3),
(14, 4, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_sender_id_foreign` (`sender_id`),
  ADD KEY `notifications_receiver_id_foreign` (`receiver_id`);

--
-- Indexes for table `pre_user`
--
ALTER TABLE `pre_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rspm_tbl_settings`
--
ALTER TABLE `rspm_tbl_settings`
  ADD PRIMARY KEY (`settings_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support_message`
--
ALTER TABLE `support_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_email_template`
--
ALTER TABLE `tbl_email_template`
  ADD PRIMARY KEY (`email_template_id`);

--
-- Indexes for table `thrift_two_win`
--
ALTER TABLE `thrift_two_win`
  ADD PRIMARY KEY (`id`),
  ADD KEY `thrift_two_win_created_member_foreign` (`created_member`);

--
-- Indexes for table `thrift_two_win_bank`
--
ALTER TABLE `thrift_two_win_bank`
  ADD PRIMARY KEY (`bank_id`);

--
-- Indexes for table `thrift_two_win_bank_account`
--
ALTER TABLE `thrift_two_win_bank_account`
  ADD PRIMARY KEY (`id`),
  ADD KEY `thrift_two_win_bank_account_user_id_foreign` (`user_id`);

--
-- Indexes for table `thrift_two_win_deposits`
--
ALTER TABLE `thrift_two_win_deposits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `thrift_two_win_deposits_user_id_foreign` (`user_id`),
  ADD KEY `thrift_two_win_deposits_thrift_group_id_foreign` (`thrift_group_id`);

--
-- Indexes for table `thrift_two_win_faq`
--
ALTER TABLE `thrift_two_win_faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thrift_two_win_invited_member`
--
ALTER TABLE `thrift_two_win_invited_member`
  ADD PRIMARY KEY (`id`),
  ADD KEY `thrift_two_win_invited_member_invited_by_user_foreign` (`invited_by_user`),
  ADD KEY `thrift_two_win_invited_member_thrift_id_foreign` (`thrift_id`);

--
-- Indexes for table `thrift_two_win_login_logs`
--
ALTER TABLE `thrift_two_win_login_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thrift_two_win_member`
--
ALTER TABLE `thrift_two_win_member`
  ADD PRIMARY KEY (`id`),
  ADD KEY `thrift_two_win_member_thrift_group_member_id_foreign` (`thrift_group_member_id`),
  ADD KEY `thrift_two_win_member_thrift_group_id_foreign` (`thrift_group_id`);

--
-- Indexes for table `thrift_two_win_message_archive`
--
ALTER TABLE `thrift_two_win_message_archive`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thrift_two_win_payment_log`
--
ALTER TABLE `thrift_two_win_payment_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `thrift_two_win_payment_log_user_id_foreign` (`user_id`),
  ADD KEY `thrift_two_win_payment_log_thrift_group_id_foreign` (`thrift_group_id`);

--
-- Indexes for table `thrift_two_win_pins`
--
ALTER TABLE `thrift_two_win_pins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `thrift_two_win_pins_user_id_foreign` (`user_id`);

--
-- Indexes for table `thrift_two_win_referral_amount`
--
ALTER TABLE `thrift_two_win_referral_amount`
  ADD PRIMARY KEY (`id`),
  ADD KEY `thrift_two_win_referral_amount_user_id_foreign` (`user_id`);

--
-- Indexes for table `thrift_two_win_user_bvn`
--
ALTER TABLE `thrift_two_win_user_bvn`
  ADD PRIMARY KEY (`id`),
  ADD KEY `thrift_two_win_user_bvn_user_id_foreign` (`user_id`);

--
-- Indexes for table `thrift_two_win_winner`
--
ALTER TABLE `thrift_two_win_winner`
  ADD PRIMARY KEY (`id`),
  ADD KEY `thrift_two_win_winner_user_id_foreign` (`user_id`),
  ADD KEY `thrift_two_win_winner_thrift_group_id_foreign` (`thrift_group_id`);

--
-- Indexes for table `thrift_two_win_withdraw`
--
ALTER TABLE `thrift_two_win_withdraw`
  ADD PRIMARY KEY (`id`),
  ADD KEY `thrift_two_win_withdraw_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_groups_user_id_foreign` (`user_id`),
  ADD KEY `users_groups_group_id_foreign` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pre_user`
--
ALTER TABLE `pre_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `rspm_tbl_settings`
--
ALTER TABLE `rspm_tbl_settings`
  MODIFY `settings_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `support_message`
--
ALTER TABLE `support_message`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_email_template`
--
ALTER TABLE `tbl_email_template`
  MODIFY `email_template_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `thrift_two_win`
--
ALTER TABLE `thrift_two_win`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `thrift_two_win_bank`
--
ALTER TABLE `thrift_two_win_bank`
  MODIFY `bank_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `thrift_two_win_bank_account`
--
ALTER TABLE `thrift_two_win_bank_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `thrift_two_win_deposits`
--
ALTER TABLE `thrift_two_win_deposits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `thrift_two_win_faq`
--
ALTER TABLE `thrift_two_win_faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `thrift_two_win_invited_member`
--
ALTER TABLE `thrift_two_win_invited_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `thrift_two_win_login_logs`
--
ALTER TABLE `thrift_two_win_login_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `thrift_two_win_member`
--
ALTER TABLE `thrift_two_win_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `thrift_two_win_message_archive`
--
ALTER TABLE `thrift_two_win_message_archive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `thrift_two_win_payment_log`
--
ALTER TABLE `thrift_two_win_payment_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `thrift_two_win_pins`
--
ALTER TABLE `thrift_two_win_pins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `thrift_two_win_referral_amount`
--
ALTER TABLE `thrift_two_win_referral_amount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `thrift_two_win_user_bvn`
--
ALTER TABLE `thrift_two_win_user_bvn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `thrift_two_win_winner`
--
ALTER TABLE `thrift_two_win_winner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `thrift_two_win_withdraw`
--
ALTER TABLE `thrift_two_win_withdraw`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_receiver_id_foreign` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `notifications_sender_id_foreign` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
