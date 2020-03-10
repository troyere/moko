<?php

namespace App\Infrastructure\Note\Validation\JsonSchema;

use App\Infrastructure\Validation\JsonSchema\JsonSchemaValidator;

class AddNoteJsonSchemaValidator extends JsonSchemaValidator
{
    public function getSchema(): string
    {
        return file_get_contents(__DIR__ . '/addNote.schema.json');
    }
}
