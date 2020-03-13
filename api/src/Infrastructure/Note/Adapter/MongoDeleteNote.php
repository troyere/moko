<?php

namespace App\Infrastructure\Note\Adapter;

use App\Domain\Note\Adapter\DeleteNote;
use App\Domain\Note\ValueObject\NoteId;
use MongoDB\Collection;
use MongoDB\Database;

class MongoDeleteNote implements DeleteNote
{
    private Collection $collection;

    public function __construct(Database $database, string $collectionNotes)
    {
        $this->collection = $database->selectCollection($collectionNotes);
    }

    public function __invoke(NoteId $id): void
    {
        $this->collection->deleteOne(['_id' => $id->getId()]);
    }
}
