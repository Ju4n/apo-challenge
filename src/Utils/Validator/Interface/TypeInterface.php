<?php declare(strict_types=1);

namespace Juan\ApoChallenge\Utils\Validator\Interface;

interface TypeInterface
{
    public static function validateType(mixed $value): bool;

    public static function getError(): string;
}
