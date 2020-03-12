<?php

namespace App\Domain\Note\ValueObject;

use JsonSerializable;

class NoteValues implements JsonSerializable
{
    public const JSON_SCHEMA_PATH = __DIR__.'/../Resources/json/note.schema.json';

    protected string $title;
    protected string $content;

    public function __construct(string $title, string $content)
    {
        $this->title = $title;
        $this->content = $content;
    }

    /**
     * @return mixed[]
     */
    public function jsonSerialize(): array
    {
        return [
            'title' => $this->title,
            'content' => $this->content,
        ];
    }
}
