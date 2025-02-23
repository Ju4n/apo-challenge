<?php
declare(strict_types = 1);

namespace Juan\ApoChallenge\Utils\Validator\Type;

use Juan\ApoChallenge\Utils\Validator\Interface\TypeInterface;

class TypeNumber implements TypeInterface
{
    public static function validateType(mixed $value): bool
    {
        return filter_var($value, FILTER_VALIDATE_INT) || filter_var($value, FILTER_VALIDATE_FLOAT);
    }

    public static function getError(): string
    {
        return 'The value is not a number';
    }
}
