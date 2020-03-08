<?php

namespace App\Infrastructure\Json;

use JsonSerializable;

class JsonValidationResult implements JsonSerializable
{
    private bool $isValid;

    /**
     * @var JsonValidationError[]
     */
    private array $errors;

    /**
     * @param bool $isValid
     * @param JsonValidationError[] $errors
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
