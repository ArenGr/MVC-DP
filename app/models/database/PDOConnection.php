<?php

namespace App\Models\Database;

use PDO;
use PDOException;


class PDOConnection
{
    private static $instance = null;
    private $pdo;

    private function __construct()
    {
        $dbhost = $_ENV["DBHOST"];
        $dbport = $_ENV["DBPORT"];
        $dbname = $_ENV["DBNAME"];
        $dbuser = $_ENV["DBUSER"];
        $dbpass = $_ENV["DBPASS"];

        $dsn = "pgsql:host={$dbhost};port={$dbport};dbname={$dbname}";

        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        try {
            $this->pdo = new PDO($dsn, $dbuser, $dbpass, $options);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
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