<?php

namespace App\Infrastructure\Note\Json;

use App\Infrastructure\Json\JsonValidator;

class AddNoteJsonValidator extends JsonValidator
{
    public function getSchema(): string
    {
        return file_get_contents(__DIR__.'/schema/addNote.schema.json');
    }
}
