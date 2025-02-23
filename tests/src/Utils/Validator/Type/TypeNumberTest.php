<?php

namespace Tests\Utils\Validator\Type;

use Juan\ApoChallenge\Utils\Validator\Type\TypeNumber;
use PHPUnit\Framework\TestCase;

class TypeNumberTest extends TestCase
{
    public function testValidNumberPasses(): void
    {
        $this->assertTrue(TypeNumber::validateType(123));
        $this->assertTrue(TypeNumber::validateType(12.5));
    }

    public function testInvalidNumberFails(): void
    {
        $this->assertFalse(TypeNumber::validateType('abc'));
    }
}