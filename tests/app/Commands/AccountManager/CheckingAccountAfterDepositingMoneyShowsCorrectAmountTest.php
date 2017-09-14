<?php

namespace tests;

use App\Commands\AccountManager;

class CheckingAccountAfterDepositingMoneyShowsCorrectAmountTest extends AccountManagerTestCase
{

    public function testAmountIsCorrectAfterDepositingMoney()
    {
        $depositedAmount = 10;
        /** @var AccountManager $accountManager */
        $accountManager = app()->make(AccountManager::class);
        $accountOriginalAmount = $accountManager->getAccountAmount($this->tokenA);
        $accountManager->depositAmount($depositedAmount, $this->tokenA);
        $this->assertEquals(
            $depositedAmount + $accountOriginalAmount,
            $accountManager->getAccountAmount($this->tokenA)
        );
    }

}