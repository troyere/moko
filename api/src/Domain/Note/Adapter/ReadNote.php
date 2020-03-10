<?php

namespace App\Domain\Note\Adapter;

interface ReadNote
{
    public function __invoke(array $note) : array;
}
