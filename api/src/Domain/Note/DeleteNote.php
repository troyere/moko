<?php

namespace App\Domain\Note;

use App\Domain\Note\ValueObject\DeleteNoteCommand;
use App\Domain\Note\ValueObject\Note;

interface DeleteNote
{
    public function __invoke(DeleteNoteCommand $command) : Note;
}
