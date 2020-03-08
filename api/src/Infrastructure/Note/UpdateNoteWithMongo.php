<?php

namespace App\Infrastructure\Note;

use App\Domain\Note\UpdateNote;
use App\Domain\Note\ValueObject\Note;
use App\Domain\Note\ValueObject\UpdateNoteCommand;

class UpdateNoteWithMongo implements UpdateNote
{
    public function __invoke(UpdateNoteCommand $command): Note
    {
        return new Note();
    }
}
