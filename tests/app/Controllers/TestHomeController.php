<?php

namespace App;

use CodeIgniter\Test\FeatureTestCase;

class TestHomeController extends FeatureTestCase {

    protected function setUp(): void {
        parent::setUp();
    }

    protected function tearDown(): void {
        parent::tearDown();
    }

    public function testGetApi() {

        $result = $this->call('get', 'api');

//        $result->assertOK();
//        $this->assertTrue($result->getJSON() !== false);
        $result->assertStatus(200);
    }

    public function testGetGeneralFields() {

        $result = $this->call('get', 'general/fields');

        $result->assertStatus(200);
    }
    
    public function testGetUsersByRole() {

        $result = $this->call('get', 'users/role/superadmin');

        $result->assertStatus(200);
    }
    
    public function dashboard() {

        $result = $this->call('get', 'dashboard');

        $result->assertStatus(200);
    }


}
