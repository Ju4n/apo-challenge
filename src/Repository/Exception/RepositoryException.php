<?php declare(strict_types=1);

namespace Juan\ApoChallenge\Repository\Exception;

use Exception;

class RepositoryException extends Exception
{
    public function __construct(string $message)
    {
        $this->message = 'There is an error at the repository ' . $message;
    }
}
