<?php

namespace App\Domain\Note\ValueObject;

use JsonSerializable;

interface NoteId extends JsonSerializable
{
    /**
     * @return mixed
     */
    public function getId();

    public function __toString(): string;
}
