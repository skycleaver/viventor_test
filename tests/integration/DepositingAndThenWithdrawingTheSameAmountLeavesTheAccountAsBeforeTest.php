<?php

namespace tests;

class DepositingAndThenWithdrawingTheSameAmountLeavesTheAccountAsBeforeTest extends AccountManagerTestCase
{
    public function testDepositingAndThenWithdrawingTheSameAmountLeavesTheAccountAsBefore()
    {
        $accountOriginalAmount = $this->getAccountAmount($this->tokenA);
        $depositAmount = 20;
        $withdrawAmount = 10;

        $this->post('deposit', ['depositAmount' => $depositAmount], ['token' => $this->tokenA]);
        $this->post('withdraw', ['withdrawAmount' => $withdrawAmount], ['token' => $this->tokenA]);

        $this->assertEquals(
            $accountOriginalAmount + $depositAmount - $withdrawAmount,
            $this->getAccountAmount($this->tokenA)
        );
    }

    private function getAccountAmount(string $token): int
    {
        $this->get('getAmount', ['token' => $token]);
        $response = $this->response->getContent();
        return json_decode($response, true)['amount'];
    }
}