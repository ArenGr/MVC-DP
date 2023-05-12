<?php

namespace App\Repositories;

use Core\Repository;

class UserRepository extends Repository
{
    public function getQuery() {
        return $this->run("SELECT * FROM USERS");
    }
}
