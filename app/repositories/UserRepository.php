<?php

namespace App\Repositories;

class UserRepository implements UserRepositoriesInterface
{
    public function getQuery() {
        echo 'Data from db recieved';
        return 1;
    }

}