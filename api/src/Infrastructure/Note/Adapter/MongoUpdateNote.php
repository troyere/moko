<?php

namespace App\Infrastructure\Note\Adapter;

use App\Domain\Note\Adapter\UpdateNote;
use App\Domain\Note\Exceptions\NoteNotFoundException;
use App\Domain\Note\ValueObject\Note;
use App\Domain\Note\ValueObject\NoteId;
use App\Domain\Note\ValueObject\NoteValues;
use MongoDB\Collection;
use MongoDB\Database;

class MongoUpdateNote implements UpdateNote
{
    private Collection $collection;

    public function __construct(Database $database, string $collectionNotes)
    {
        $this->collection = $database->selectCollection($collectionNotes);
    }

    public function __invoke(NoteId $id, NoteValues $note): Note
    {
        assert($id instanceof NoteId);

        $document = $note->jsonSerialize();
        $result = $this->collection->updateOne(['_id' => $id->getId()], ['$set' => $document]);

        if (!$result->getMatchedCount()) {
            throw new NoteNotFoundException($id);
        }

        return new Note($id, $document['title'], $document['content']);
    }
}
