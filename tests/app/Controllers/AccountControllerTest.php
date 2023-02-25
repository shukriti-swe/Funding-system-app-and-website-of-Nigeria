<?php

namespace App;

use CodeIgniter\Test\FeatureTestCase;
use CodeIgniter\Test\DatabaseTestTrait;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;

class AccountControllerTest extends CIUnitTestCase {
    //use DatabaseTestTrait, FeatureTestTrait;
    use  FeatureTestTrait;
    var $headers;
    
    protected function setUp(): void {
       parent::setUp();
       $this->headers = [
        'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6Imtob3JzaGVkKzRAb2JzdmlydHVhbC5jb20iLCJpYXQiOjE2NDYzOTc2MDUsImV4cCI6MTY4MjM5NzYwNX0.EzP9oGUGPAef6ev9CUgNiOx0OF7Am1U53-dSuErRY4Q',
    ];

    }

    protected function tearDown(): void {
       // parent::tearDown();
    }


    public function testDepositsList() {

        $result = $this->withHeaders($this->headers)->get('account/deposits');

        $result->assertStatus(200);
    }

    public function testWithdrawals() {

        $result = $this->withHeaders($this->headers)->post('account/withdrawals',['withdraw_amount'=>100]);

        $result->assertStatus(200);
    }

    public function testWithdrawalsList() {

        $result = $this->withHeaders($this->headers)->get('account/withdrawals');

        $result->assertStatus(200);
    }

    public function testGetAmount() {

        $result = $this->withHeaders($this->headers)->get('account/getAmount');

        $result->assertStatus(200);
    }


}