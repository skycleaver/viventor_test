<?php

namespace App\Commands;


use App\Exceptions\InvalidCredentialsException;

class Logger
{
    public function login(string $username, string $password)
    {
        if ($username !== 'username' || $password !== 'password') {
            throw new InvalidCredentialsException();
        }

    }
}