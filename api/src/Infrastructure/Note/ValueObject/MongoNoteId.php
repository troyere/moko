<?php

namespace App\Infrastructure\Note\ValueObject;

use App\Domain\Note\ValueObject\NoteId as BaseNoteId;
use MongoDB\BSON\ObjectId;

class MongoNoteId implements BaseNoteId
{
    private ObjectId $objectId;

    /**
     * @param string|ObjectId $id
     */
    public function __construct($id)
    {
        if ($id instanceof ObjectId) {
            $this->objectId = $id;
        }

        $this->objectId = new ObjectId((string) $id);
    }

    public function getId(): ObjectId
    {
        return $this->objectId;
    }

    public function __toString(): string
    {
        return (string) $this->objectId;
    }

    public function jsonSerialize(): string
    {
        return (string) $this->objectId;
    }
}
