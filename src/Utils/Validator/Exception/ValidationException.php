<?php declare(strict_types=1);

namespace Juan\ApoChallenge\Utils\Validator\Exception;

use Exception;

class ValidationException extends Exception
{
    public function __construct(string $message)
    {
        $this->message = 'Validation Error: ' . $message;
    }
}
