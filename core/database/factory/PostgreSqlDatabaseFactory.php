<?php

namespace Core\Database\Factory;

use Core\Database\Databases\PostgreSqlDatabase;

class PostgreSqlDatabaseFactory implements DatabaseFactory
{
    /**
     * @return PostgreSqlDatabase
     */
    public function createDatabaseConnaction()
    {
        return new PostgreSqlDatabase();
    }
}