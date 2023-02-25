<?php

namespace Config;
use App\Controllers\Auth;
use App\Controllers\Product;

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

$routes->get('/', 'HomeController::index');
$routes->get('/api', 'HomeController::getApi');
$routes->post('/api/post', 'HomeController::postApi');

$routes->post('/emailtest', 'HomeController::emailtest');

$routes->group('auth', function ($routes) {

    $routes->post('login', 'AuthController::login');

    $routes->post('register', 'AuthController::register');
    $routes->post('veifycode', 'AuthController::checkVerification');
    $routes->post('resendverification', 'AuthController::resendVerification');
    $routes->post('basicdetails', 'AuthController::addBasicInfo');
    $routes->post('setbvn', 'AuthController::setBvn');

    $routes->post('forgetpassword', 'AuthController::forgetPassword');
    $routes->post('chkresetpwdcode','AuthController::checkForgotPasswordCode');
    $routes->post('updforgotpass','AuthController::updateForgetPassword');
});

$routes->group('auth', ['filter' => 'auth'], function ($routes) {
    $routes->post('updateprofile', 'AuthController::updateProfile');
    $routes->post('updatepassword', 'AuthController::updatePassword');
});

$routes->get('user/profile', 'AuthController::getProfile', ['filter' => 'auth']);
$routes->get('user/profile/(:any)', 'AuthController::getMiniProfile/$1', ['filter' => 'auth']);
$routes->post('user/profile/image', 'AuthController::updateUserPhoto', ['filter' => 'auth']);
$routes->post('user/profile/device', 'ProfileController::updateDeviceId', ['filter' => 'auth']);
$routes->get('emailinvites', 'CronController::emailInvites');
$routes->get('thriftend', 'CronController::thriftend');
$routes->get('balanceinfo', 'ProfileController::balanceInfo', ['filter' => 'auth']);

/**
 * Thrifts Related
 */ 

$routes->group('thrifts', ['filter' => 'auth'], function ($routes) {
    $routes->get('products', 'ThriftController::listProducts');
    $routes->post('/', 'ThriftController::createThrift');
    $routes->get('/', 'ThriftController::listThrifts'); 
    $routes->get('mythrifts', 'ThriftController::currentUserlistThrifts', ['filter' => 'auth']);
    $routes->post('join', 'ThriftController::joinThrift', ['filter' => 'auth']);
    $routes->post('invitations', 'ThriftController::sendThriftInvitations', ['filter' => 'auth']);
    $routes->get('invitedme', 'ThriftController::invitedMe', ['filter' => 'auth']);
    $routes->get('invitedme/(:num)', 'ThriftController::invitedMe/$1', ['filter' => 'auth']);
    $routes->get('(:any)/inviteduser', 'ThriftController::invitedUser/$1', ['filter' => 'auth']);
    $routes->get('(:any)/inviteduser/(:num)', 'ThriftController::invitedUser/$1/$2/$3', ['filter' => 'auth']);
    $routes->get('(:any)', 'ThriftController::singleThriftInfo/$1', ['filter' => 'auth']); 
});

/** 
 * Deposits/ Withdrawals / Banks
 */

$routes->group('account', ['filter' => 'auth'], function ($routes) {
        $routes->get('banks', 'AccountController::getBanks');
        $routes->post('addbank', 'AccountController::addbank');
        $routes->post('addpymentinfo', 'AccountController::addPaymentInfo');
        $routes->post('deposits', 'AccountController::deposits');
        $routes->get('deposits', 'AccountController::depositsList');
        $routes->post('withdrawals', 'AccountController::withdrawals');
        $routes->get('withdrawals', 'AccountController::withdrawalsList');
        $routes->get('getAmount', 'AccountController::getAmount');
        $routes->post('test', 'AccountController::testAccount');

        //New API endpoint added as per Renju's Request
        $routes->get('deposits_and_withdrawals', 'AccountController::depositsAndWithdrawalList');
});

/**
 * Pins
 */

$routes->post('pin', 'PinController::createPin', ['filter' => 'auth']);
$routes->post('verifypin', 'PinController::verifyPin', ['filter' => 'auth']);

$routes->get('dashboard', 'AccountController::dashboard', ['filter' => 'auth']); // get general data

$routes->get('general/fields', 'HomeController::getGeneralFields', ['filter' => 'auth']); // get general data
$routes->get('users/role/(:any)', 'HomeController::getUsersByRole/$1', ['filter' => 'auth']); // get users by role
$routes->get('users/invitee/thrft/(:num)', 'HomeController::getUsersThirftInvite/$1', ['filter' => 'auth']);
 
$routes->get('message/list', 'MessageController::messageList', ['filter' => 'auth']);
$routes->post('message/send', 'MessageController::messageSend', ['filter' => 'auth']);

$routes->post('notification/send', 'ProfileController::sendPushNotification', ['filter' => 'auth']);
$routes->get('notifications', 'ProfileController::notifications', ['filter' => 'auth']);

/**
 * BANKS
 */

$routes->post('addbank', 'BankController::addBank',['filter' => 'auth']);
$routes->get('getbank', 'BankController::getBank',['filter' => 'auth']); 
$routes->post('editbank', 'BankController::editBank',['filter' => 'auth']);
$routes->post('deletebank', 'BankController::deleteBank',['filter' => 'auth']);
$routes->post('userbvn', 'BankController::userBvn',['filter' => 'auth']);
$routes->get('getbvn', 'BankController::getBvn',['filter' => 'auth']);
$routes->add('webhookpaystack', 'BankController::webHookPaystack');
$routes->add('userbvnstatus', 'BankController::userBvnStatus',['filter' => 'auth']);

$routes->match(['get', 'post'],'getemptypaycustomer', 'CronController::getEmptyPayCustomer');
$routes->match(['get', 'post'],'getsettings', 'HomeController::getSettings',['filter' => 'auth']);

// FAQ
$routes->match(['get', 'post'],'faqlist', 'HomeController::faqList', ['filter' => 'auth']);
$routes->match(['get', 'post'],'termsandconditions', 'HomeController::termsAndConditions', ['filter' => 'auth']);

$routes->match(['get', 'post'],'withdrawcheckandtransfer', 'CronController::withdrawCheckAndTransfer');

/*  01521239166(misu da)
 * ------------------------------------- -------------------------------
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
