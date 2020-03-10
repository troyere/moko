<?php

namespace App\Domain\Note;

interface ReadNote
{
    public function __invoke(array $note) : array;
}
