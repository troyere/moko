<?php

namespace App\Infrastructure\Note;

use App\Domain\Note\DeleteNote;
use App\Domain\Note\ValueObject\DeleteNoteCommand;
use App\Domain\Note\ValueObject\Note;

class DeleteNoteWithMongo implements DeleteNote
{
    public function __invoke(DeleteNoteCommand $command): Note
    {
        return new Note();
    }
}
