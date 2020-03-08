<?php

namespace App\Infrastructure\Note;

use App\Domain\Note\AddNote;
use App\Domain\Note\ValueObject\AddNoteCommand;
use App\Domain\Note\ValueObject\Note;

class AddNoteWithMongo implements AddNote
{
    public function __invoke(AddNoteCommand $command): Note
    {


        return new Note();
    }
}
