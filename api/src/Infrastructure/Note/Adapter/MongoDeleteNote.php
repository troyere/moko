<?php

namespace App\Infrastructure\Note\Adapter;

use App\Domain\Note\Adapter\DeleteNote;

class MongoDeleteNote implements DeleteNote
{
    public function __invoke(int $id): array
    {
        return [];
    }
}
