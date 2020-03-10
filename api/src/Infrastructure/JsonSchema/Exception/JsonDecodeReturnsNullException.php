<?php

namespace App\Infrastructure\JsonSchema\Exception;

use Exception;
use Throwable;

class JsonDecodeReturnsNullException extends Exception
{
    public function __construct(Throwable $previous = null)
    {
        parent::__construct('json_decode() returns null.', 0, $previous);
    }
}
