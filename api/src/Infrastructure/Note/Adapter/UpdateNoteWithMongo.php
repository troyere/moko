<?php

namespace App\Infrastructure\Note\Adapter;

use App\Domain\Note\Adapter\UpdateNote;

class UpdateNoteWithMongo implements UpdateNote
{
    public function __invoke(array $note): array
    {
        return [];
    }
}
