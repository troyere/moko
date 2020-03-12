<?php

namespace App\Infrastructure\Note\Adapter;

use App\Domain\Note\Adapter\UpdateNote;
use App\Domain\Note\Exceptions\NoteNotFoundException;
use App\Domain\Note\ValueObject\NoteId;
use App\Domain\Note\ValueObject\NoteValues;
use MongoDB\Client;

class MongoUpdateNote implements UpdateNote
{
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function __invoke(NoteId $id, NoteValues $note): NoteId
    {
        assert($id instanceof NoteId);

        $collection = $this->client->selectCollection('moko', 'notes');
        $result = $collection->updateOne(['_id' => $id->getId()], ['$set' => $note->jsonSerialize()]);

        if (!$result->getMatchedCount()) {
            throw new NoteNotFoundException($id);
        }

        return $id;
    }
}
