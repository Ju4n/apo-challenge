<?php

namespace Juan\ApoChallenge\Database;

use Exception;
use QueryException;

class DatabaseHandler
{
    public function __construct(protected readonly DriverInterface $driver)
    {
        //
    }

    public function query(string $query, array $params = [])
    {
        try {
            $stmt = $this->driver->getConnection()->prepare($query);

            if ($params) {
                $stmt->bind_param($params);
            }

            $stmt->execute();
            $result = $stmt->fetch();
        } catch (Exception $e) {
            new QueryException($e->getMessage());
        }

        return $result;
    }
}
