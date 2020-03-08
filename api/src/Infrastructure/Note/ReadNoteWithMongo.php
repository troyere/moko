<?php

namespace App\Infrastructure\Note;

use App\Domain\Note\ReadNote;
use App\Domain\Note\ValueObject\Note;
use App\Domain\Note\ValueObject\ReadNoteCommand;

class ReadNoteWithMongo implements ReadNote
{
    public function __invoke(ReadNoteCommand $command): Note
    {
        return new Note();
    }
}
