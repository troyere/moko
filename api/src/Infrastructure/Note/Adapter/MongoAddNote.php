<?php

namespace App\Infrastructure\Note\Adapter;

use App\Domain\Note\Adapter\AddNote;
use App\Domain\Note\ValueObject\Note;
use App\Domain\Note\ValueObject\NoteValues;
use App\Infrastructure\Note\ValueObject\MongoNoteId;
use MongoDB\Collection;
use MongoDB\Database;

class MongoAddNote implements AddNote
{
    private Collection $collection;

    public function __construct(Database $database, string $collectionNotes)
    {
        $this->collection = $database->selectCollection($collectionNotes);
    }

    public function __invoke(NoteValues $note): Note
    {
        $document = $note->jsonSerialize();
        $result = $this->collection->insertOne($document);
        $id = new MongoNoteId($result->getInsertedId());

        return new Note($id, $document['title'], $document['content']);
    }
}
