<?php

namespace App\Domain\Note\Adapter;

use App\Domain\Note\ValueObject\Note;
use App\Domain\Note\ValueObject\NoteValues;

interface AddNote
{
    public function __invoke(NoteValues $content) : Note;
}
