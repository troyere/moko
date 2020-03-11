<?php

namespace App\Domain\Note\Adapter;

use App\Domain\Note\ValueObject\AddNoteRequest;
use App\Domain\Note\ValueObject\NoteId;

interface AddNote
{
    /**
     * @param AddNoteRequest $addNoteRequest
     * @return NoteId
     */
    public function __invoke(AddNoteRequest $addNoteRequest) : NoteId;
}
