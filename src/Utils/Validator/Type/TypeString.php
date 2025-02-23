<?php declare(strict_types=1);

namespace Juan\ApoChallenge\Utils\Validator\Type;

use Juan\ApoChallenge\Utils\Validator\Interface\TypeInterface;

class TypeString implements TypeInterface
{
    public static function validateType(mixed $value): bool
    {
        return \is_string($value);
    }

    public static function getError(): string
    {
        return 'The value is not a string';
    }
}
