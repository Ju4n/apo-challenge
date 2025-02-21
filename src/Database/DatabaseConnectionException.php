<?php

namespace Juan\ApoChallenge\Database;

use Exception;

class DatabaseConnectionException extends Exception
{
    public function __construct(string $message)
    {
        $this->message = 'There is an error executing the query: ' . $message;
    }
}
