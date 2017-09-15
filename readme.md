# Viventor test

This is a test for Viventor.

It is a really simple API that allows the creation and logging
in of users and the depositing or withdrawal of money from
their accounts.

## Installing it and running it
It runs on Lumen, so you should be sure to satisfy its
[requirements](https://lumen.laravel.com/docs/master/installation#server-requirements).
You should also download [SQLite](https://www.sqlite.org/snapshot/sqlite-snapshot-201709121505.tar.gz)
so the database can, you know, run.
You should then run `composer install` and then `php -S localhost:8000 -t public` to get
the server up and running.

## Usage
The available endpoints are:
1. POST signup (username, password)
2. POST login (username, password) token
3. GET getAmount (HEADER: token) int
4. POST deposit (depositAmount, HEADER: token)
5. POST withdraw (withdrawAmount, HEADER: token)

You can see the tests running by typing `vendor/bin/phpunit tests`

## Further considerations
To say this a prototype is to fall short. A lot of things
should be improved:
* Lumen Auth should be used. It isn't much more complicated
than returning a token and it's tested and maintained.
* Lumen validators should be used. See above, exchanging 'token'
by 'JSONized string'.
* Dividing into Domains should be considered in the future -
the application as it is is simple enough not to need it.