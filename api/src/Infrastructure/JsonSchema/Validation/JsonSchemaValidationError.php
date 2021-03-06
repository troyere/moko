<?php

namespace App\Infrastructure\JsonSchema\Validation;

use JsonSerializable;
use StdClass;

class JsonSchemaValidationError implements JsonSerializable
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

    /**
     * @return mixed[]
     */
    public function jsonSerialize(): array
    {
        return [
            'schema' => $this->schema,
            'keyword' => $this->keyword,
            'keyword_args' => $this->keywordArgs,
        ];
    }
}
