<?php

namespace App\Commands;


use App\User;

class UserManager
{

    public function createNewUser($username, $password): string
    {
        $user = new User();
        $user->username = $username;
        $user->password = $password;
        $user->token = substr(hash('sha256', mt_rand()), 0, 20);
        $user->save();

        return $user->token;
    }

    public function getUserByUsernameAndPassword($username, $password)
    {
        $user = new User();
        $user = $user->where('username', $username)->where('password', $password)->first();
        return $user;
    }

}