<?php

namespace tests;

use TestCase;

class CanNotWithdrawFromSomeoneElseAccountTest extends TestCase
{
    public function testCanNotWithdrawFromSomeoneElseAccount()
    {
        $withdrawAmount = 10;
        $token = 'invalidToken';

        $this->post('withdraw', ['withdrawAmount' => $withdrawAmount], ['token' => $token]);
        $content = $this->response->getContent();
        $this->assertEquals($content, json_encode('Unknown or unauthorized account'));
    }
}