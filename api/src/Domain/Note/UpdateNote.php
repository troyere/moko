<?php

namespace App\Domain\Note;

interface UpdateNote
{
    public function __invoke(array $note) : array;
}
