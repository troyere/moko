<?php

namespace App\Domain\Note\ValueObject;

use JsonSerializable;

interface NoteId extends JsonSerializable
{
    public function getId();
}
