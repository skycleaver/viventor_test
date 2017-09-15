<?php

namespace tests;

use TestCase;

class SigningUpWithIncompleteDataFailsTest extends TestCase
{
    public function testsSigningUpWithIncompleteDataFailsTest()
    {
        $username = '';
        $password = 'bar';
        $this->post('signUp', ['username' => $username, 'password' => $password]);
        $this->assertEquals(
            json_encode('Both username and password must be filled'),
            $this->response->getContent()
        );
    }
}