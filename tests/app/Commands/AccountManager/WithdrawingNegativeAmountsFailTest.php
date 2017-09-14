<?php

namespace tests;

use App\Commands\AccountManager;
use App\Exceptions\AmountMustBePositiveException;

class WithdrawingNegativeAmountsFailTest extends AccountManagerTestCase
{
    public function testWithdrawingNegativeAmountsFails()
    {
        $this->expectException(AmountMustBePositiveException::class);

        $withdrawAmount = -10;
        /** @var AccountManager $accountManager */
        $accountManager = app()->make(AccountManager::class);
        $accountManager->withdrawAmount($withdrawAmount, $this->tokenA);
    }
}