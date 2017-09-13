<?php

namespace tests;

use TestCase;
use App\Commands\AccountManager;

class CheckingAccountAfterDepositingMoneyShowsCorrectAmountTest extends TestCase
{

    public function testAmountIsCorrectAfterDepositingMoney()
    {
        $depositedAmount = 10;
        $accountManager = new AccountManager();
        $accountOriginalAmount = $accountManager->getAccountAmount();
        $accountManager->depositAmount($depositedAmount);
        $this->assertEquals(
            $depositedAmount + $accountOriginalAmount,
            $accountManager->getAccountAmount()
        );
    }

}