<?php

namespace Infrastructure;

use App\Exceptions\UserNotFoundException;
use App\User;

class UserRepository
{
    public function getUserByUsernameAndPassword(string $username, string $password)
    {
        $user = new User();
        $user = $user->where('username', $username)->where('password', $password)->first();
        if (is_null($user)) {
            throw new UserNotFoundException();
        }
        return $user;
    }

    public function createNewUser($username, $password)
    {
        $user = new User();
        $user->username = $username;
        $user->password = $password;
        $user->token = substr(hash('sha256', mt_rand()), 0, 20);
        $user->save();

        return $user->token;
    }
}