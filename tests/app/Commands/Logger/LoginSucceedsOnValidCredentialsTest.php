<?php

namespace tests;

use App\Commands\LoginManager;
use TestCase;

class LoginSucceedsOnValidCredentialsTest extends TestCase
{

    public function testLoginSucceedsOnValidCredentialsTest() {
        $username = "username";
        $password = "password";
        $logger = new LoginManager();
        $logger->login($username, $password);
    }

}