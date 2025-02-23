<?php

namespace Tests\Utils\Validator;

use Juan\ApoChallenge\Utils\Validator\Type\Types;
use Juan\ApoChallenge\Utils\Validator\Validator;
use PHPUnit\Framework\TestCase;

class ValidatorTest extends TestCase
{
    private Validator $validator;

    protected function setUp(): void
    {
        $this->validator = new Validator();
    }

    public function testValidDataPassesValidation(): void
    {
        $data = [
            'name' => 'Aspirin',
            'started_at' => '2025-02-22',
            'dosage' => 100,
            'note' => 'Take with food'
        ];

        $schema = [
            'name' => ['type' => Types::STRING, 'required' => true],
            'started_at' => ['type' => Types::STRING, 'required' => true],
            'dosage' => ['type' => Types::NUMBER, 'required' => true],
            'note' => ['type' => Types::STRING, 'required' => false],
        ];

        $this->assertTrue($this->validator->validate($data, $schema));
    }

    public function testMissingRequiredFieldFailsValidation(): void
    {
        $data = [
            'started_at' => '2025-02-22',
            'dosage' => 100
        ];

        $schema = [
            'name' => ['type' => Types::STRING, 'required' => true],
            'started_at' => ['type' => Types::STRING, 'required' => true],
            'dosage' => ['type' => Types::NUMBER, 'required' => true],
        ];

        $this->assertFalse($this->validator->validate($data, $schema));
        $this->assertArrayHasKey('name', $this->validator->getErrors());
    }

    public function testInvalidTypeFailsValidation(): void
    {
        $data = [
            'name' => 123,
            'started_at' => '2025-02-22',
            'dosage' => 'invalid_number'
        ];

        $schema = [
            'name' => ['type' => Types::STRING, 'required' => true],
            'started_at' => ['type' => Types::STRING, 'required' => true],
            'dosage' => ['type' => Types::NUMBER, 'required' => true],
        ];

        $this->assertFalse($this->validator->validate($data, $schema));
        $this->assertArrayHasKey('name', $this->validator->getErrors());
        $this->assertArrayHasKey('dosage', $this->validator->getErrors());
    }
}