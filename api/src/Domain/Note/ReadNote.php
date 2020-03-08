<?php

namespace App\Domain\Note;

use App\Domain\Note\ValueObject\Note;
use App\Domain\Note\ValueObject\ReadNoteCommand;

interface ReadNote
{
    public function __invoke(ReadNoteCommand $command) : Note;
}
