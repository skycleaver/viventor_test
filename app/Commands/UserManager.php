<?php

namespace App\Commands;

use Infrastructure\UserRepository;

class UserManager
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function createNewUser(string $username, string $password): string
    {
        return $this->userRepository->createNewUser($username, $password);
    }

    public function getUserByUsernameAndPassword(string $username, string $password)
    {
        return $this->userRepository->getUserByUsernameAndPassword($username, $password);
    }

}