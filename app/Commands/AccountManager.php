<?php

namespace App\Commands;


use App\Exceptions\AmountMustBePositiveException;

class AccountManager
{

    /**
     * @var int
     */
    private $accountAmount = 0;

    public function getAccountAmount(): int
    {
        return $this->accountAmount;
    }

    public function depositAmount(int $depositedAmount)
    {
        if ($depositedAmount < 0) {
            throw new AmountMustBePositiveException();
        }
        $this->accountAmount += $depositedAmount;
    }

    public function withdrawAmount(int $withdrawAmount)
    {
        if ($withdrawAmount < 0) {
            throw new AmountMustBePositiveException();
        }
        $this->accountAmount -= $withdrawAmount;
    }
}