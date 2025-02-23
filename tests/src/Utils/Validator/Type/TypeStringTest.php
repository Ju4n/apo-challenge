<?php

namespace Tests\Utils\Validator\Type;

use Juan\ApoChallenge\Utils\Validator\Type\TypeString;
use PHPUnit\Framework\TestCase;

class TypeStringTest extends TestCase
{
    public function testValidStringPasses(): void
    {
        $this->assertTrue(TypeString::validateType('Hello'));
    }

    public function testInvalidStringFails(): void
    {
        $this->assertFalse(TypeString::validateType(123));
    }
}