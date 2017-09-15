<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
$router->get(
    '/',
    function () use ($router) {
        return $router->app->version();
    }
);

$router->post(
    '/withdraw',
    [
        'as' => 'withdraw', 'uses' => 'AccountController@withdraw'
    ]
);

$router->post(
    '/deposit',
    [
        'as' => 'deposit', 'uses' => 'AccountController@deposit'
    ]
);

$router->get(
    '/getAmount',
    [
        'as' => 'getAmount', 'uses' => 'AccountController@getAmount'
    ]
);

$router->post(
    '/signUp',
    [
        'as' => 'signUp', 'uses' => 'LoginController@signUp'
    ]
);

$router->post(
    '/login',
    [
        'as' => 'login', 'uses' => 'LoginController@login'
    ]
);
