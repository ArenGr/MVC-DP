<?php
namespace Core\Database\Factory;

use Core\Database\Databases\Database;

interface DatabaseFactory
{
    public function createDatabaseConnaction(): Database;
}
