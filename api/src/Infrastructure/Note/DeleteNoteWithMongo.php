<?php

namespace App\Infrastructure\Note;

use App\Domain\Note\DeleteNote;

class DeleteNoteWithMongo implements DeleteNote
{
    public function __invoke(int $id): array
    {
        return [];
    }
}
