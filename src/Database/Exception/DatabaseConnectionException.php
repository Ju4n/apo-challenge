<?php declare(strict_types=1);

namespace Juan\ApoChallenge\Database\Exception;

use Exception;

class DatabaseConnectionException extends Exception
{
    public function __construct(string $message)
    {
        $this->message = 'There is an error executing the query: ' . $message;
    }
}
