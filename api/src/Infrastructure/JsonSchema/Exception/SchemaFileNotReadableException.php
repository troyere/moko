<?php

namespace App\Infrastructure\JsonSchema\Exception;

use RuntimeException;
use Throwable;

class SchemaFileNotReadableException extends RuntimeException
{
    public function __construct(Throwable $previous = null)
    {
        parent::__construct('Schema file not readable.', 0, $previous);
    }
}
