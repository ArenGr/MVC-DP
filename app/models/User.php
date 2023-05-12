<?php

namespace App\Models;

use Core\Model;

class User extends Model
{
    public function getAllUsers()
    {
        return $this->run("Select * from users");
    }
}
