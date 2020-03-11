<?php

namespace App\Domain\Note\Adapter;

use App\Domain\Note\ValueObject\Note;
use App\Domain\Note\ValueObject\NoteId;

interface ReadNote
{
    public function __invoke(NoteId $id) : Note;
}
