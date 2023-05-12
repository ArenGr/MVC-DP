<?php

namespace App\Repositories;

use Core\Repository;

class UserRepository extends Repository
{
    public function getQuery() {
        $a = $this->run("SELECT * FROM users");
        var_dump($a);exit();
    }
}
