<?php

namespace Juan\ApoChallenge\Database;

use Exception;
use mysqli;

class MysqlDriver implements DriverInterface
{
    public function __construct(protected string $host, protected string $username, protected string $password, protected string $database)
    {
    }

    public function getConnection()
    {
        try {
            $connection =  new mysqli($this->host, $this->username, $this->password, $this->database);
        } catch (Exception $e) {
            throw new DatabaseConnectionException($e->getMessage());
        }
    }
}
