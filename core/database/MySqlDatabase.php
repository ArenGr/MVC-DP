<?php

namespace Core\Database;

use PDO;
use PDOException;
use Core\Config\Config;

class MySqlDatabase implements DatabaseInterface
{
    /**
     * @return PDO|void
     */
    public function connect()
    {
        $host = Config::get('databases.postgresql.host');
        $port = Config::get('databases.postgresql.port');
        $name = Config::get('databases.postgresql.name');
        $user = Config::get('databases.postgresql.user');
        $pass = Config::get('databases.postgresql.pass');

        $dsn = "mysql:host={$host};port={$port};dbname={$name}";

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
