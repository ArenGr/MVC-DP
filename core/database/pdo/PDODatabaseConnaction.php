<?php

namespace Core\Database\Pdo;

use Core\Config\Config;
use Core\Database\Factory\MySqlDatabaseFactory;
use Core\Database\Factory\PostgreSqlDatabaseFactory;
use Exception;
use PDO;

class PDODatabaseConnaction
{
    private static ?PDODatabaseConnaction $instance = null;
    private ?PDO $pdo;

    /**
     * @throws Exception
     */
    private function __construct()
    {
        switch (Config::get('database.default')) {
            case 'mysql':
                $factory = new MySqlDatabaseFactory();
                $mysqlConnection = $factory->createDatabaseConnaction();
                $this->pdo = $mysqlConnection->connect();
                break;
            case 'postgre':
                $factory = new PostgreSqlDatabaseFactory();
                $postgresqlConnaction = $factory->createDatabaseConnaction();
                $this->pdo = $postgresqlConnaction->connect();
                break;
            default:
                throw new Exception("Invalid database type.");
        }
    }

    /**
     * @return PDODatabaseConnaction|null
     */
    public static function getInstance(): ?PDODatabaseConnaction
    {
        if (!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * @return PDO|null
     */
    public function getConnection(): ?PDO
    {
        return $this->pdo;
    }
}