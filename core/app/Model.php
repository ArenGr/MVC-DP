<?php

namespace Core\App;

use Core\Database\Pdo\PDODatabaseConnaction;
use PDO;

class Model extends PDODatabaseConnaction
{
    private $pdo;
    protected $stmt;

    public function __construct()
    {
        $this->pdo = self::getInstance()->getConnection();
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
                $this->stmt->bindValue(`:{$param}`, $value);
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

    public function getQuery($statement, $params = [])
    {
        $result = $this->prepare($statement)->bind($params)->execute()->fetchAll();
        return $result;
    }
}