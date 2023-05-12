<?php

namespace Core\Database;

use Core\Config\Config;
use Exception;

class PDOConnection
{
    private static ?PDOConnection $instance = null;
    private ?\PDO $pdo;

    /**
     * @throws Exception
     */
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

    public static function getInstance(): ?PDOConnection
    {
        if (!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function getConnection(): ?\PDO
    {
        return $this->pdo;
    }
}
