<?php

namespace App;

use CodeIgniter\Test\FeatureTestCase;

class TestAuthController extends FeatureTestCase {

    protected function setUp(): void {
        parent::setUp();
    }

    protected function tearDown(): void {
        parent::tearDown();
    }

    public function testRegister() {

        $result = $this->call('post', 'auth/register');

        $result->assertStatus(200);
    }
    public function testResendVerification() {

        $result = $this->call('post', 'auth/resendverification');

        $result->assertStatus(200);
    }

    public function testCheckVerification() {

        $result = $this->call('post', 'auth/veifycode');

        $result->assertStatus(200);
    }

    public function testAddBasicInfo() {

        $result = $this->call('post', 'auth/basicdetails');

        $result->assertStatus(200);
    }

    public function testSetBvn() {

        $result = $this->call('post', 'auth/setbvn');

        $result->assertStatus(200);
    }
    public function testForgetPassword() {

        $result = $this->call('post', 'auth/forgetpassword');

        $result->assertStatus(200);
    }
    public function testCheckForgotPasswordCode() {

        $result = $this->call('post', 'auth/chkresetpwdcode');

        $result->assertStatus(200);
    }

    public function testUpdateForgetPassword() {

        $result = $this->call('post', 'auth/updforgotpass');

        $result->assertStatus(200);
    }

    public function testUpdateProfile() {

        $result = $this->call('post', 'auth/updateprofile');

        $result->assertStatus(200);
    }
    
    public function testUpdatePassword() {

        $result = $this->call('post', 'auth/updatepassword');

        $result->assertStatus(200);
    }
    public function testUpdateUserPhoto() {

        $result = $this->call('post', 'auth/updatepassword');

        $result->assertStatus(200);
    }
    public function testGetProfile() {

        $result = $this->call('get', 'user/profile');

        $result->assertStatus(200);
    }
    public function testGetMiniProfile() {

        $result = $this->call('get', 'user/profile');

        $result->assertStatus(200);
    }
    public function testLogin() {

        $result = $this->call('post', 'login');

        $result->assertStatus(200);
    }
    
}