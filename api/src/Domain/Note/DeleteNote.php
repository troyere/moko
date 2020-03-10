<?php

namespace App\Domain\Note;

interface DeleteNote
{
    public function __invoke(int $id) : array;
}
