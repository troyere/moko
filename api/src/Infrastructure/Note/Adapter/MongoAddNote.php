<?php

namespace App\Infrastructure\Note\Adapter;

use App\Domain\Note\Adapter\AddNote;
use App\Domain\Note\ValueObject\AddNoteRequest;
use App\Infrastructure\Note\ValueObject\MongoNoteId;
use MongoDB\Client;

class MongoAddNote implements AddNote
{
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function __invoke(AddNoteRequest $addNoteRequest): MongoNoteId
    {
        $collection = $this->client->selectCollection('moko', 'notes');
        $insertOneResult = $collection->insertOne($addNoteRequest->jsonSerialize());

        return new MongoNoteId($insertOneResult->getInsertedId());
    }
}
