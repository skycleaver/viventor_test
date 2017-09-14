<?php

namespace tests;

use App\Account;
use TestCase;

abstract class AccountManagerTestCase extends TestCase
{

    protected $tokenA = '123';

    protected $tokenB = '456';

    public function setUp()
    {
        parent::setUp();
        $accountA = new Account();
        $accountA->token = $this->tokenA;
        $accountA->amount = 10;
        $accountA->save();
        $accountB = new Account();
        $accountB->token = $this->tokenB;
        $accountB->amount = 10;
        $accountB->save();
    }

    public function tearDown()
    {
        $account = new Account();
        $account->where('token', $this->tokenA)->delete();
        $account->where('token', $this->tokenB)->delete();
        parent::tearDown();
    }

}