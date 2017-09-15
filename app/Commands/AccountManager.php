<?php

namespace App\Commands;

use App\Account;
use App\Exceptions\AmountMustBePositiveException;
use Infrastructure\AccountRepository;

class AccountManager
{
    /**
     * @var AccountRepository $accountRepository
     */
    private $accountRepository;

    public function __construct(AccountRepository $accountRepository)
    {
        $this->accountRepository = $accountRepository;
    }

    public function getAccountAmount(string $token): int
    {
        return $this->accountRepository->getAccountAmount($token);
    }

    public function depositAmount(int $depositedAmount, string $token)
    {
        if ($depositedAmount < 0) {
            throw new AmountMustBePositiveException();
        }
        $this->accountRepository->depositAmount($token, $depositedAmount);
    }

    public function withdrawAmount(int $withdrawAmount, string $token)
    {
        if ($withdrawAmount < 0) {
            throw new AmountMustBePositiveException();
        }
        $this->accountRepository->withdrawAmount($token, $withdrawAmount);
    }

    public function createNewAccount($token)
    {
        $account = new Account();
        $account->token = $token;
        $account->amount = 0;
        $account->save();
    }
}