<?php

namespace App\Infrastructure\Note;

use App\Domain\Note\AddNote;
use App\Domain\Note\ValueObject\AddNoteRequest;
use MongoDB\Client;

class AddNoteWithMongo implements AddNote
{
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function __invoke(AddNoteRequest $addNoteRequest): array
    {
        $collection = $this->client->selectCollection('moko', 'notes');
        $insertOneResult = $collection->insertOne($addNoteRequest->jsonSerialize());

        // TOTO : gerer mes propres id ?

        return [];
    }
}
