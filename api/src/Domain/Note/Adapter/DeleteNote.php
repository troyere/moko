<?php

namespace App\Domain\Note\Adapter;

interface DeleteNote
{
    public function __invoke(int $id) : array;
}
