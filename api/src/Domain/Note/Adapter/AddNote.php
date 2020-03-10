<?php

namespace App\Domain\Note\Adapter;

use App\Domain\Note\ValueObject\AddNoteRequest;

interface AddNote
{
    public function __invoke(AddNoteRequest $addNoteRequest) : array;
}
