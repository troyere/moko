<?php

namespace App\Domain\Note\Adapter;

use App\Domain\Note\ValueObject\NoteId;

interface DeleteNote
{
    public function __invoke(NoteId $id) : void;
}
