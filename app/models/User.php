<?php

namespace App\Models;

use App\Core\Model;

class User extends Model
{
    public function getAllUsers() {
        return $this->run("Select * from users");
    }

}