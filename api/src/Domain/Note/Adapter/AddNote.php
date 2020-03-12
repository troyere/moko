<?php

namespace App\Domain\Note\Adapter;

use App\Domain\Note\ValueObject\NoteValues;
use App\Domain\Note\ValueObject\NoteId;

interface AddNote
{
    public function __invoke(NoteValues $content) : NoteId;
}
