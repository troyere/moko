<?php

namespace App\Infrastructure\Note\Adapter;

use App\Domain\Note\Adapter\DeleteNote;
use App\Domain\Note\Exceptions\NoteNotFoundException;
use App\Domain\Note\ValueObject\Note;
use App\Domain\Note\ValueObject\NoteId;
use MongoDB\Client;

class MongoDeleteNote implements DeleteNote
{
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function __invoke(NoteId $id): void
    {
        $collection = $this->client->selectCollection('moko', 'notes');
        $collection->deleteOne(['_id' => $id->getId()]);
    }
}
