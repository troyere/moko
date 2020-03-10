<?php

namespace App\Infrastructure\Validation\JsonSchema;

use JsonSerializable;

class JsonSchemaValidationResult implements JsonSerializable
{
    private bool $isValid;

    /**
     * @var JsonSchemaValidationError[]
     */
    private array $errors;

    /**
     * @param bool $isValid
     * @param JsonSchemaValidationError[] $errors
     */
    public function __construct(bool $isValid, array $errors)
    {
        $this->isValid = $isValid;
        $this->errors = $errors;
    }

    /**
     * @return bool
     */
    public function isValid(): bool
    {
        return $this->isValid;
    }

    public function jsonSerialize(): array
    {
        return [
            'is_valid' => $this->isValid,
            'errors' => $this->errors,
        ];
    }
}