<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository extends User
{
    public function getUserById($id)
    {
        $query = sprintf("SELECT * FROM %s WHERE id = %d", $this->table, $id);
        return $this->getQuery($query);
    }

    public function getAllUsers()
    {
        $query = sprintf("SELECT * FROM %s", $this->table);
        return $this->getQuery($query);
    }
}