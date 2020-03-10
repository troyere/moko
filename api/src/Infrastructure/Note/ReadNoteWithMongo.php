<?php

namespace App\Infrastructure\Note;

use App\Domain\Note\ReadNote;

class ReadNoteWithMongo implements ReadNote
{
    public function __invoke(array $note): array
    {
        return [];
    }
}
