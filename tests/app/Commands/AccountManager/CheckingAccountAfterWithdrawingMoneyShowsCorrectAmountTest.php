<?php

namespace tests;

use App\Commands\AccountManager;

class CheckingAccountAfterWithdrawingMoneyShowsCorrectAmountTest extends AccountManagerTestCase
{

    public function testAmountIsCorrectAfterDepositingMoney()
    {
        $withdrawAmount = 10;
        /** @var AccountManager $accountManager */
        $accountManager = app()->make(AccountManager::class);
        $accountOriginalAmount = $accountManager->getAccountAmount($this->tokenA);
        $accountManager->withdrawAmount($withdrawAmount, $this->tokenA);
        $this->assertEquals(
            $accountOriginalAmount - $withdrawAmount,
            $accountManager->getAccountAmount($this->tokenA)
        );
    }

}