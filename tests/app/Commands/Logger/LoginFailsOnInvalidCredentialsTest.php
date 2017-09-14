<?php

namespace tests;

use App\Commands\LoginManager;
use App\Exceptions\InvalidCredentialsException;
use TestCase;

class LoginFailsOnInvalidCredentialsTest extends TestCase
{

    public function testLoginFailsOnInvalidUsername() {
        $this->expectException(InvalidCredentialsException::class);

        $username = "wrong_username";
        $password = "password";
        $logger = new LoginManager();
        $logger->login($username, $password);
    }

    public function testLoginFailsOnInvalidPassword() {
        $this->expectException(InvalidCredentialsException::class);

        $username = "username";
        $password = "wrong_password";
        $logger = new LoginManager();
        $logger->login($username, $password);
    }

}