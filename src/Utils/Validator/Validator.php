<?php

declare(strict_types=1);

namespace Juan\ApoChallenge\Utils\Validator;

use Juan\ApoChallenge\Utils\Validator\Type\TypeNumber;
use Juan\ApoChallenge\Utils\Validator\Type\Types;
use Juan\ApoChallenge\Utils\Validator\Type\TypeString;

class Validator
{
    /** @var array<string> */
    private array $errors = [];

    /**
     * @param array<string, mixed>                                                    $values
     * @param array<string, array{required: bool, type: Types::NUMBER|Types::STRING}> $schema
     */
    public function validate(array $values, array $schema): bool
    {
        foreach ($schema as $field => $rules) {
            if ($rules['required'] && !isset($values[$field])) {
                $this->errors[$field] = 'Value ' . $field . ' is required';

                continue;
            } elseif (!$rules['required'] && !isset($values[$field])) {
                continue;
            }

            if ($rules['type'] === Types::STRING) {
                if (!TypeString::validateType($values[$field])) {
                    $this->errors[$field] = TypeString::getError();
                }
            }

            if ($rules['type'] === Types::NUMBER) {
                if (!TypeNumber::validateType($values[$field])) {
                    $this->errors[$field] = TypeNumber::getError();
                }
            }
        }

        return \count($this->errors) > 0 ? false : true;
    }

    /**
     * @return array<string>
     */
    public function getErrors(): array
    {
        return $this->errors;
    }
}
