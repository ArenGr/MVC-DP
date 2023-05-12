<?php

namespace Core\Database;

use Core\Config\Config;
use Exception;

class PDOConnection
{
    private static $instance = null;
    private $pdo;

    private function __construct()
    {
        switch (Config::get('databases.default')) {
            case 'mysql':
                $mySql = new MySqlDatabase();
                $this->pdo = $mySql->connect();
                break;
            case 'postgre':
                $postgreSql = new PostgreSqlDatabase();
                $this->pdo = $postgreSql->connect();
                break;
            default:
                throw new Exception("Invalid database type.");
        }
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function getConnection()
    {
        return $this->pdo;
    }
}
