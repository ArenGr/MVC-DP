<?php

namespace Core\Database;

use Exception;

class DatabaseFactory
{
    /**
     * @param $dbType
     * @return MySqlDatabase|PostgreSqlDatabase
     * @throws Exception
     */
    public static function createDatabase($dbType)
    {
        switch ($dbType) {
            case 'mysql':
                return new MySqlDatabase();
            case 'postgres':
                return new PostgreSqlDatabase();
            default:
                throw new Exception("Invalid database type.");
        }
    }
}