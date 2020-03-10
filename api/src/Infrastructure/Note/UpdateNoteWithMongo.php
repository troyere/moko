<?php

namespace App\Infrastructure\Note;

use App\Domain\Note\UpdateNote;

class UpdateNoteWithMongo implements UpdateNote
{
    public function __invoke(array $note): array
    {
        return [];
    }
}
