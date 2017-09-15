<?php

namespace tests;

use TestCase;

class LoggingInWithInvalidCredentialFailsTest extends TestCase
{
    public function testLoggingInWithInvalidCredentialFails()
    {
        $username = 'invalidUsername';
        $password = 'bar';
        $this->post('login', ['username' => $username, 'password' => $password]);
        $this->assertEquals(
            json_encode("The specified credentials don't match any user"),
            $this->response->getContent()
        );
    }
}