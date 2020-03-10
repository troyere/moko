<?php

namespace App\Domain\Note\Adapter;

interface UpdateNote
{
    public function __invoke(array $note) : array;
}
