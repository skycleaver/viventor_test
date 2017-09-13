<?php

namespace tests;

use App\Commands\Logger;
use App\Exceptions\InvalidCredentialsException;
use TestCase;

class LoginFailsOnInvalidCredentialsTest extends TestCase
{

    public function testLoginFailsOnInvalidUsername() {
        $this->expectException(InvalidCredentialsException::class);

        $username = "wrong_username";
        $password = "password";
        $logger = new Logger();
        $logger->login($username, $password);
    }

    public function testLoginFailsOnInvalidPassword() {
        $this->expectException(InvalidCredentialsException::class);

        $username = "username";
        $password = "wrong_password";
        $logger = new Logger();
        $logger->login($username, $password);
    }

}