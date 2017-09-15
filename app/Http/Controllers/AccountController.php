<?php

namespace App\Http\Controllers;

use App\Commands\AccountManager;
use App\Exceptions\AmountMustBePositiveException;
use App\Exceptions\InvalidCredentialsException;
use App\Exceptions\TokenNotFoundInHeaderException;
use Exception;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class AccountController extends BaseController
{

    /**
     * @var AccountManager $accountManager
     */
    private $accountManager;

    public function __construct(AccountManager $accountManager)
    {
        $this->accountManager = $accountManager;
    }

    public function withdraw(Request $request)
    {
        $token = $this->getToken($request);
        try {
            $this->accountManager->withdrawAmount($request->get('withdrawAmount'), $token);
        } catch (AmountMustBePositiveException $e) {
            return json_encode('Amount must be positive');
        } catch (InvalidCredentialsException $e) {
            return json_encode('Unknown or unauthorized account');
        }
    }

    public function deposit(Request $request)
    {
        $token = $this->getToken($request);
        try {
            $this->accountManager->depositAmount($request->get('depositAmount'), $token);
        } catch (AmountMustBePositiveException $e) {
            return json_encode('Amount must be positive');
        } catch (InvalidCredentialsException $e) {
            return json_encode('Unknown or unauthorized account');
        }
    }

    public function getAmount(Request $request)
    {
        $token = $this->getToken($request);
        return json_encode(['amount' => $this->accountManager->getAccountAmount($token)]);
    }

    private function getToken(Request $request): string
    {
        try {
            return $request->header()['token'][0];
        } catch (Exception $e) {
            throw new TokenNotFoundInHeaderException();
        }
    }
}