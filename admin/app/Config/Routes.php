<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('HomeController');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->match(['get', 'post'],'/', 'HomeController::index');
$routes->match(['get', 'post'],'/auth/login', 'HomeController::index');

$routes->add('/auth/forgot_password', 'AuthController::forgetPassword');
$routes->add('/auth/reset_password', 'AuthController::resetPassword');
$routes->add('/auth/update_forget_password/(:any)', 'AuthController::updateForgetPassword/$1');
$routes->add('/auth/update_forget_password', 'AuthController::updateForgetPassword');
  
$routes->match(['get', 'post'],'/dashboard', 'DashboardController::home', ['filter' => 'auth']);
 
$routes->match(['get', 'post'],'/admin/user/create', 'UserController::userCreate', ['filter' => 'auth']);
$routes->get('/admin/user/list', 'UserController::userList', ['filter' => 'auth']);
$routes->post('/admin/getUsersByAjax', 'UserController::getUsersByAjax', ['filter' => 'auth']);
 
$routes->get('/admin/profile', 'UserController::userProfile', ['filter' => 'auth']);
$routes->get('/admin/user/profile/(:num)', 'UserController::userProfile/$1', ['filter' => 'auth']);
$routes->match(['get', 'post'],'/admin/user/edit/(:num)','UserController::userEdit/$1', ['filter' => 'auth']);
$routes->match(['get', 'post'],'/getThriftsByAjax/(:num)', 'UserController::getThriftsByAjax/$1', ['filter' => 'auth']);

$routes->get('/setting', 'HomeController::setting', ['filter' => 'auth']);
$routes->get('/test', 'ThriftController::test');

// Reports
$routes->match(['get', 'post'],'/alljoinedthrifers', 'ReportController::allJoinedThrifers', ['filter' => 'auth']);
$routes->match(['get', 'post'],'/getalljoinedthrifers', 'ReportController::getAllJoinedThrifers', ['filter' => 'auth']);
$routes->match(['get', 'post'],'/joinedthriferspdf', 'ReportController::joinedThrifersPdf', ['filter' => 'auth']);
$routes->match(['get', 'post'],'/allpaymentreport', 'ReportController::allPaymentReport', ['filter' => 'auth']);
$routes->match(['get', 'post'],'/alluserbvnreport', 'ReportController::allUserBvnReport', ['filter' => 'auth']);
$routes->match(['get', 'post'],'/getalluserbvn', 'ReportController::getAllUserBvn', ['filter' => 'auth']);
$routes->match(['get', 'post'],'/getbvnstatusreport', 'ReportController::getbvnstatusreport', ['filter' => 'auth']);

$routes->match(['get', 'post'],'/getallpayments', 'ReportController::getAllPayments', ['filter' => 'auth']);
$routes->match(['get', 'post'],'/thriftinfo/(:any)', 'ReportController::thriftInfo/$1', ['filter' => 'auth']);
$routes->match(['get', 'post'],'/getthriftlistinfo/(:any)', 'ReportController::getThriftListInfo/$1', ['filter' => 'auth']);
$routes->match(['get', 'post'],'/referralids', 'ReportController::referralids', ['filter' => 'auth']);
$routes->match(['get', 'post'],'/getallreferralids', 'ReportController::getAllReferralIds', ['filter' => 'auth']);

// Setting
$routes->match(['get', 'post'],'/generalsettings', 'SettingController::generalSettings', ['filter' => 'auth']);
$routes->match(['get', 'post'],'/updategeneralsettings', 'SettingController::updateGeneralSettings', ['filter' => 'auth']); 

$routes->match(['get', 'post'],'/emailtemplate', 'SettingController::emailTemplate', ['filter' => 'auth']);
$routes->match(['get', 'post'],'/editemailtemplate/(:any)', 'SettingController::editEmailTemplate/$1', ['filter' => 'auth']);

$routes->match(['get', 'post'],'/paymentsettings', 'SettingController::paymentSettings', ['filter' => 'auth']);
$routes->match(['get', 'post'],'/systemsettings', 'SettingController::systemSettings', ['filter' => 'auth']);
$routes->match(['get', 'post'],'/othersetting', 'SettingController::otherSetting', ['filter' => 'auth']);
$routes->match(['get', 'post'],'/termsandconditions', 'SettingController::termsAndConditions', ['filter' => 'auth']);

// FAQ
$routes->match(['get', 'post'],'/addfaq', 'FaqController::add_faq', ['filter' => 'auth']);
$routes->match(['get', 'post'],'/faqlist', 'FaqController::faq_list', ['filter' => 'auth']);
$routes->match(['get', 'post'],'/getFaqByAjax', 'FaqController::getFaqByAjax', ['filter' => 'auth']);
$routes->match(['get', 'post'],'/faqedit/(:any)', 'FaqController::faqEdit/$1', ['filter' => 'auth']);
$routes->match(['get', 'post'],'/faqdelete/(:any)', 'FaqController::faqDelete/$1', ['filter' => 'auth']);

// Archive Message
$routes->match(['get', 'post'],'/messagearchive', 'MessageController::messageArchive', ['filter' => 'auth']);

$routes->get('/write_message', 'MessageController::writeMessage', ['filter' => 'auth']);
$routes->add('/outbox', 'MessageController::outbox', ['filter' => 'auth']);
$routes->get('/inbox', 'MessageController::inbox', ['filter' => 'auth']);
$routes->add('/view_message/(:any)/(:any)', 'MessageController::viewMessage/$1/$2', ['filter' => 'auth']);
$routes->add('/inbox_view_message/(:any)/(:any)', 'MessageController::inboxViewMessage/$1/$2', ['filter' => 'auth']);

$routes->get('/thriftlist', 'ThriftController::thriftList', ['filter' => 'auth']);
$routes->get('/paymentissue', 'ThriftController::paymentIssue', ['filter' => 'auth']);
$routes->post('/paymentstatus', 'ThriftController::paymentStatus', ['filter' => 'auth']);
$routes->get('/paymentrecieveissue', 'HomeController::paymentRecieveIssue', ['filter' => 'auth']);
$routes->get('/withdrawstatus/(:any)/(:any)', 'ThriftController::withdrawstatus/$1/$2', ['filter' => 'auth']);
$routes->match(['get', 'post'],'/updatewithdrawstatus', 'ThriftController::updateWithdrawStatus', ['filter' => 'auth']);
 
$routes->get('/allbank', 'HomeController::allBank', ['filter' => 'auth']);
$routes->get('/addbank', 'HomeController::addBank', ['filter' => 'auth']);
  
$routes->post('/getwithdrawsdata', 'ThriftController::getWithdrawsData', ['filter' => 'auth']);
$routes->post('/getallthrifts', 'ThriftController::getAllThrifts', ['filter' => 'auth']);
$routes->get('/thriftdetails/(:num)', 'ThriftController::thriftDetails/$1', ['filter' => 'auth']);
$routes->post('/getthriptmember/(:num)', 'ThriftController::getThriptMember/$1', ['filter' => 'auth']);
$routes->post('invatation_users/(:any)', 'ThriftController::invatationUsers/$1', ['filter' => 'auth']);

$routes->match(['get', 'post'],'/logout', 'SettingController::logout', ['filter' => 'auth']);

$routes->match(['get', 'post'],'/webhooks', 'WebhooksController::index');



/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
