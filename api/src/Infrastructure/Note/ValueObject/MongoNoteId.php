<?php

namespace App\Infrastructure\Note\ValueObject;

use App\Domain\Note\ValueObject\NoteId as BaseNoteId;
use MongoDB\BSON\ObjectId;

class MongoNoteId implements BaseNoteId
{
    private ObjectId $id;

    public function __construct(ObjectId $id)
    {
        $this->id = $id;
    }

    public function getId(): ObjectId
    {
        return $this->id;
    }

    static public function createFromString(string $id): self
    {
        return new self(new ObjectId($id));
    }

    public function __toString(): string
    {
        return (string) $this->id;
    }

    public function jsonSerialize(): string
    {
        return (string) $this->id;
    }
}
