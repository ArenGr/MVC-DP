<?php
namespace Core\Database\Factory;

use Core\Database\Databases\MySqlDatabase;

class MySqlDatabaseFactory implements DatabaseFactory
{
    /**
     * @return MySqlDatabase
     */
    public function createDatabaseConnaction()
    {
        return new MySqlDatabase();
    }
}