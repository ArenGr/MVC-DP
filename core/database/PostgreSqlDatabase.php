<?php

namespace Core\Database;

use Core\Config\Config;
use Core\Database\DatabaseInterface;
use PDO;
use PDOException;

class PostgreSqlDatabase implements DatabaseInterface
{
    /**
     * @return PDO|void
     */
    public function connect()
    {

        $host = Config::get('databases.postgre.host');
        $port = Config::get('databases.postgre.port');
        $name = Config::get('databases.postgre.name');
        $user = Config::get('databases.postgre.user');
        $pass = Config::get('databases.postgre.pass');

        $dsn = "pgsql:host={$host};port={$port};dbname={$name}";

        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        try {
            return new PDO($dsn, $user, $pass, $options);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}
