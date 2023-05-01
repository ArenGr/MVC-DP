<?php

namespace App\Models\Database;

use PDO;
use PDOStatement;

interface PDOInterface
{
    public function run(string $statement, array $params);
}