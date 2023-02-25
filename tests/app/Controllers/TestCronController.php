<?php

namespace App;

use CodeIgniter\Test\FeatureTestCase;

class TestCronController extends FeatureTestCase {

    protected function setUp(): void {
        parent::setUp();
    }

    protected function tearDown(): void {
        parent::tearDown();
    }

    public function testEmailInvites() {

        $result = $this->call('get', 'user/profile');

        $result->assertStatus(200);
    }
    public function testThriftend() {

        $result = $this->call('get', 'user/profile');

        $result->assertStatus(200);
    }


}