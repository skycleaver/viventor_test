<?php

namespace tests;

use App\Commands\AccountManager;
use TestCase;

class CheckingAccountAfterWithdrawingMoneyShowsCorrectAmountTest extends TestCase
{

    public function testAmountIsCorrectAfterDepositingMoney()
    {
        $withdrawAmount = 10;
        $accountManager = new AccountManager();
        $accountOriginalAmount = $accountManager->getAccountAmount();
        $accountManager->withdrawAmount($withdrawAmount);
        $this->assertEquals(
            $accountOriginalAmount - $withdrawAmount,
            $accountManager->getAccountAmount()
        );
    }

}