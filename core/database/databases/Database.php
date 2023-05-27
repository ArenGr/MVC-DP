<?php
namespace Core\Database\Databases;

use PDO;

interface Database
{
    /**
     * @return PDO|void
     */
    public function connect(): ?PDO;
}