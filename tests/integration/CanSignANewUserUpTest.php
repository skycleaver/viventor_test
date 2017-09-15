<?php

namespace tests;

use TestCase;

class CanSignANewUserUpTest extends TestCase
{
    public function testANewUserCanBeSignedUp()
    {
        $username = 'foo';
        $password = 'bar';
        $this->post('signUp', ['username' => $username, 'password' => $password]);
        $this->post('login', ['username' => $username, 'password' => $password]);
        $response = $this->response->getContent();
        $this->get('getAmount', ['token' => json_decode($response, true)['token']]);
        $this->assertEquals(json_encode(['amount' => 0]), $this->response->getContent());
    }
}