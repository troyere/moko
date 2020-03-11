<?php

namespace App\Domain\Note\Exceptions;

use App\Domain\Note\ValueObject\NoteId;
use Exception;
use Throwable;

class NoteIdNotFoundException extends Exception
{
    public function __construct(NoteId $id, Throwable $previous = null)
    {
        parent::__construct(sprintf('Note id %s not found.', $id), 0, $previous);
    }
}