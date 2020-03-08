<?php

namespace App\Infrastructure\Json\Exceptions;

use App\Infrastructure\Json\JsonValidationResult;
use Exception;
use Throwable;

class InvalidJsonException extends Exception
{
    private JsonValidationResult $result;

    public function __construct(JsonValidationResult $result, Throwable $previous = null)
    {
        parent::__construct('Invalid JSON schema.', 0, $previous);
        $this->result = $result;
    }

    public function getResult(): JsonValidationResult
    {
        return $this->result;
    }
}
