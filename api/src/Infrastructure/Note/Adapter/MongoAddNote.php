<?php

namespace App\Infrastructure\Note\Adapter;

use App\Domain\Note\Adapter\AddNote;
use App\Domain\Note\ValueObject\NoteValues;
use App\Infrastructure\Note\ValueObject\MongoNoteId;
use MongoDB\Client;

class MongoAddNote implements AddNote
{
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function __invoke(NoteValues $note): MongoNoteId
    {
        $collection = $this->client->selectCollection('moko', 'notes');
        $result = $collection->insertOne($note->jsonSerialize());

        return new MongoNoteId($result->getInsertedId());
    }
}
