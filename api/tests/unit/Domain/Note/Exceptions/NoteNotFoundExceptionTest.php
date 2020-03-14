<?php

namespace App\Tests\unit\Domain\Note\Exceptions;

use App\Domain\Note\Exceptions\NoteNotFoundException;
use App\Domain\Note\ValueObject\NoteId;
use PHPUnit\Framework\TestCase;

class NoteNotFoundExceptionTest extends TestCase
{
    public function testShouldThrowAnErrorFromNoteId(): void
    {
        $noteId = $this->getMockBuilder(NoteId::class)->getMock();
        $noteId->method('__toString')->willReturn('123');

        assert($noteId instanceof NoteId);

        $exception = new NoteNotFoundException($noteId);

        $this->assertEquals('Note 123 not found.', $exception->getMessage());
    }
}
