<?php

namespace tests;

use App\Commands\Logger;
use TestCase;

class LoginSucceedsOnValidCredentialsTest extends TestCase
{

    public function testLoginFailsOnInvalidUsername() {
        $username = "username";
        $password = "password";
        $logger = new Logger();
        $logger->login($username, $password);
    }

}