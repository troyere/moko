<?php

namespace App\Infrastructure\Note\Adapter;

use App\Domain\Note\Adapter\ReadNote;

class ReadNoteWithMongo implements ReadNote
{
    public function __invoke(array $note): array
    {
        return [];
    }
}
