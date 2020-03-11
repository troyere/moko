<?php

namespace App\Infrastructure\Note\Adapter;

use App\Domain\Note\Adapter\ReadNote;
use App\Domain\Note\Exceptions\NoteIdNotFoundException;
use App\Domain\Note\ValueObject\Note;
use App\Domain\Note\ValueObject\NoteId;
use MongoDB\Client;

class MongoReadNote implements ReadNote
{
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function __invoke(NoteId $id): Note
    {
        $collection = $this->client->selectCollection('moko', 'notes');
        $found = $collection->findOne(['_id' => $id->getId()]);

        if ($found === null) {
            throw new NoteIdNotFoundException($id);
        }

        return new Note($id, $found['title'], $found['content']);
    }
}