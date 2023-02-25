<?php

namespace App;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;
use CodeIgniter\Test\DatabaseTestTrait;


class ThriftControllerTest extends CIUnitTestCase {
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
        //parent::tearDown();
    }

    public function testListThrifts() {

        $result = $this->withHeaders($this->headers)->get('thrifts');
        $result->assertStatus(200);
    
    }

    public function testSingleThriftInfo() {

        $result = $this->withHeaders($this->headers)->get('thrifts/1');
        $result->assertStatus(200);
    
    }

    public function testCreateThrift() {

        $result = $this->withHeaders($this->headers)->post('thrifts',[
            'thrift_name'=>'My new thrift',
            //'amount_to_thift'=>2000,
            'duration'=> 6,
            'start_date' => '2022-03-12',
            'end_date' => '2022-09-12',
        ]);
        $result->assertStatus(200);
    
    }

    public function testJoinThrift() {

        $result = $this->withHeaders($this->headers)->post('thrifts/1/join');
        $result->assertStatus(200);
    
    }


    public function testSendThriftInvitations() {

        $result = $this->withHeaders($this->headers)->post( 'thrifts/1/invitations',[
            'send_invitation_emails'=>'khorshed+4@obsvirtual.com, khorshed+7@obsvirtual.com'
        ]);
        $result->assertStatus(200);
    
    }

    // public function testCurrentUserlistThrifts() {

    //     $result = $this->call('get', 'thrifts/mythrifts');
    //     $result->assertStatus(200);
    
    // }
    public function testThriftInvitedUser() {

        $result =  $this->withHeaders($this->headers)->get( 'thrifts/1/inviteduser');
        $result->assertStatus(200);
    
    }

    public function testInvitedMeThriftList() {

        $result = $this->withHeaders($this->headers)->get('thrifts/1/inviteduser');

        $result->assertStatus(200);
    
    }

    // public function testThriftend() {

    //     $result = $this->call('get', 'user/profile');

    //     $result->assertStatus(200);
    // }


}