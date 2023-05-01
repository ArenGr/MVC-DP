<?php

namespace App\Core;

use App\Models\Database\PDOConnection;
use App\Models\Database\PDOInterface;
use PDO;


abstract class Model implements PDOInterface
{
    private $pdo;
    protected $stmt;

    public function __construct()
    {
        $this->pdo = PDOConnection::getInstance()->getConnection();
    }

    private function prepare(string $statement)
    {
        $this->stmt = $this->pdo->prepare($statement);

        return $this;
    }

    private function bind($params)
    {
        if (!empty($params)) {
            foreach ($params as $param => $value) {
                $this->stmt->bindValue(`:${param}`, $value);
            }
            return $this;
        }

        return $this;
    }


    private function execute()
    {
        $this->stmt->execute();
        return $this;
    }

    private function fetchAll()
    {
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function run($statement, $params = [])
    {
        $result = $this->prepare($statement)->bind($params)->execute()->fetchAll();
        return $result;
    }
}