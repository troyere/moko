<?php

namespace App\Domain\Note;

use App\Domain\Note\ValueObject\Note;
use App\Domain\Note\ValueObject\UpdateNoteCommand;

interface UpdateNote
{
    public function __invoke(UpdateNoteCommand $command) : Note;
}
