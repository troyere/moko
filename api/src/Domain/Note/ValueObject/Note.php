<?php

namespace App\Domain\Note\ValueObject;

use JsonSerializable;

class Note extends NoteValues implements JsonSerializable
{
    private NoteId $id;

    public function __construct(NoteId $id, string $title, string $content)
    {
        $this->id = $id;
        parent::__construct($title, $content);
    }

    /**
     * @return mixed[]
     */
    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'content' => $this->content,
        ];
    }
}
