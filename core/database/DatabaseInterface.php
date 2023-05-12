<?php

namespace Core\Database;
use PDO;

interface DatabaseInterface
{
    /**
     * @return PDO|void
     */
    public function connect();
}

