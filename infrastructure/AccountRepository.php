<?php

namespace Infrastructure;

use App\Account;
use App\Exceptions\InvalidCredentialsException;

class AccountRepository
{

    /**
     * @var Account $account
     */
    private $account;

    public function __construct(Account $account)
    {
        $this->account = $account;
    }

    public function getAccountByToken(string $token): Account
    {
        $account = $this->account->where('token', $token)->first();
        if (is_null($account)) {
            throw new InvalidCredentialsException();
        }
        return $account;
    }

    public function persist(Account $account)
    {
        $account->save();
    }

    public function withdrawAmount(string $token, int $amount)
    {
        $account = $this->getAccountByToken($token);
        $account->amount = (string)($account->amount - $amount);
        $account->save();
    }

    public function depositAmount(string $token, int $amount)
    {
        $account = $this->getAccountByToken($token);
        $account->amount = (string)($account->amount + $amount);
        $account->save();
    }

    public function getAccountAmount(string $token): int
    {
        $account = $this->getAccountByToken($token);
        return $account->amount;
    }
}