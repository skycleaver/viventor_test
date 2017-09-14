<?php

namespace tests;

use App\Commands\AccountManager;

class CheckOrderOfTransactionsDoesNotAffectAccountAmountsTest extends AccountManagerTestCase
{
    public function testOrderOfTransactionsDoesNotAffectAccountAmounts()
    {

        $depositedAmountA = 10;
        $depositedAmountB = 20;
        /** @var AccountManager $accountManager */
        $accountManager = app()->make(AccountManager::class);

        $accountOriginalAmountA = $accountManager->getAccountAmount($this->tokenA);
        $accountOriginalAmountB = $accountManager->getAccountAmount($this->tokenB);
        $accountManager->depositAmount($depositedAmountA, $this->tokenA);
        $accountManager->depositAmount($depositedAmountB, $this->tokenB);
        $this->assertEquals(
            $depositedAmountA + $accountOriginalAmountA,
            $accountManager->getAccountAmount($this->tokenA)
        );
        $this->assertEquals(
            $depositedAmountB + $accountOriginalAmountB,
            $accountManager->getAccountAmount($this->tokenB)
        );
    }
}