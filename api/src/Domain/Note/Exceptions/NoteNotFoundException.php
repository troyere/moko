<?php

namespace App\Domain\Note\Exceptions;

use App\Domain\Note\ValueObject\NoteId;
use Exception;
use Throwable;

class NoteNotFoundException extends Exception
{
    public function __construct(NoteId $id, Throwable $previous = null)
    {
        parent::__construct(sprintf('Note %s not found.', (string) $id), 0, $previous);
    }
}
