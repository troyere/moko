<?php

namespace App\Domain\Note\ValueObject;

use JsonSerializable;

class Note implements JsonSerializable
{
    private NoteId $id;
    private string $title;
    private string $content;

    public function __construct(NoteId $id, string $title, string $content)
    {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
    }

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'content' => $this->content,
        ];
    }
}
