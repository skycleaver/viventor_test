<?php

namespace tests;

use App\Commands\AccountManager;
use App\Exceptions\AmountMustBePositiveException;
use TestCase;

class WithdrawingNegativeAmountsFailTest extends TestCase
{
    public function testWithdrawingNegativeAmountsFails()
    {
        $this->expectException(AmountMustBePositiveException::class);

        $withdrawAmount = -10;
        $accountManager = new AccountManager();
        $accountManager->withdrawAmount($withdrawAmount);
    }
}