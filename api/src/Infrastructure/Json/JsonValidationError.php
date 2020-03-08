<?php

namespace App\Infrastructure\Json;

use StdClass;
use JsonSerializable;

class JsonValidationError implements JsonSerializable
{
    private StdClass $schema;
    private string $keyword;
    private StdClass $keywordArgs;

    public function __construct(StdClass $schema, string $keyword, StdClass $keywordArgs)
    {
        $this->schema = $schema;
        $this->keyword = $keyword;
        $this->keywordArgs = $keywordArgs;
    }

    public function jsonSerialize(): array
    {
        return [
            'schema' => $this->schema,
            'keyword' => $this->keyword,
            'keyword_args' => $this->keywordArgs,
        ];
    }
}
