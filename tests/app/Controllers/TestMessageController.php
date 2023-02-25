<?php

namespace App;

use CodeIgniter\Test\FeatureTestCase;

class TestMessageController extends FeatureTestCase {

    protected function setUp(): void {
        parent::setUp();
    }

    protected function tearDown(): void {
        parent::tearDown();
    }

    public function testMessageList() {

        $result = $this->call('get', 'message/list');

        $result->assertStatus(200);
    }

    public function testMessageSend() {

        $result = $this->call('post', 'message/send');

        $result->assertStatus(200);
    }

}
