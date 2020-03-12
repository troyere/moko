<?php

namespace App\Domain\Note\Adapter;

use App\Domain\Note\ValueObject\NoteId;
use App\Domain\Note\ValueObject\NoteValues;

interface UpdateNote
{
    public function __invoke(NoteId $id, NoteValues $note) : NoteId;
}
