<?php

namespace App\Http\Controllers;

use App\Commands\AccountManager;
use App\Commands\UserManager;
use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class LoginController extends BaseController
{

    /**
     * @var UserManager
     */
    private $userManager;
    /**
     * @var AccountManager
     */
    private $accountManager;

    public function __construct(UserManager $userManager, AccountManager $accountManager)
    {

        $this->userManager = $userManager;
        $this->accountManager = $accountManager;
    }

    public function signUp(Request $request)
    {
        $username = $request->get('username');
        $password = $request->get('password');

        $token = $this->userManager->createNewUser($username, $password);
        $this->accountManager->createNewAccount($token);
    }

    public function login(Request $request): string
    {
        $username = $request->get('username');
        $password = $request->get('password');

        $user = $this->userManager->getUserByUsernameAndPassword($username, $password);
        return json_encode(['token' => $user->token]);
    }

}