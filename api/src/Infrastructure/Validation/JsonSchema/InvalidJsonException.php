<?php

namespace App\Infrastructure\Validation\JsonSchema;

use Exception;
use Throwable;

class InvalidJsonException extends Exception
{
    private JsonSchemaValidationResult $result;

    public function __construct(JsonSchemaValidationResult $result, Throwable $previous = null)
    {
        parent::__construct('Invalid JSON.', 0, $previous);
        $this->result = $result;
    }

    public function getResult(): JsonSchemaValidationResult
    {
        return $this->result;
    }
}
