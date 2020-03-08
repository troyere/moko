<?php

namespace App\Domain\Note;

use App\Domain\Note\ValueObject\AddNoteCommand;
use App\Domain\Note\ValueObject\Note;

interface AddNote
{
    public function __invoke(AddNoteCommand $command) : Note;
}
