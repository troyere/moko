<?php

namespace App\Domain\Note\ValueObject;

use JsonSerializable;

class AddNoteRequest implements JsonSerializable
{
    public const JSON_SCHEMA_PATH = __DIR__.'/../Resources/json/add_note.schema.json';

    private string $title;
    private string $content;

    public function __construct(string $title, string $content)
    {
        $this->title = $title;
        $this->content = $content;
    }

    public function jsonSerialize(): array
    {
        return [
            'title' => $this->title,
            'content' => $this->content,
        ];
    }
}
