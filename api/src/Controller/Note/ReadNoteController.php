<?php

namespace App\Controller\Note;

use App\Domain\Note\Adapter\ReadNote;
use App\Domain\Note\ValueObject\NoteId;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

/**
 * @Route("/note/{id}", name="read_note", methods={"GET"})
 * @ParamConverter("id", converter="note_id.converter")
 */
class ReadNoteController
{
    public function __invoke(NoteId $id, ReadNote $readNote) : JsonResponse
    {
        return new JsonResponse($readNote($id));
    }
}
