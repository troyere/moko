<?php

namespace App\Infrastructure\Note\Adapter;

use App\Domain\Note\Adapter\ReadNote;
use App\Domain\Note\Exceptions\NoteNotFoundException;
use App\Domain\Note\ValueObject\Note;
use App\Domain\Note\ValueObject\NoteId;
use ArrayObject;
use MongoDB\Collection;
use MongoDB\Database;

class MongoReadNote implements ReadNote
{
    private Collection $collection;

    public function __construct(Database $database, string $collectionNotes)
    {
        $this->collection = $database->selectCollection($collectionNotes);
    }

    public function __invoke(NoteId $id): Note
    {
        $found = $this->collection->findOne(['_id' => $id->getId()]);

        if (!$found instanceof ArrayObject) {
            throw new NoteNotFoundException($id);
        }

        return new Note($id, $found['title'], $found['content']);
    }
}
