<?php

namespace App\Controller\Note;

use App\Domain\Note\AddNote;
use App\Domain\Note\ValueObject\AddNoteRequest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/note", name="add_note", methods={"POST"})
 * @ParamConverter("note", converter="add_note.converter")
 */
class AddNoteController
{
    public function __invoke(AddNoteRequest $note, AddNote $addNote) : JsonResponse
    {
        return new JsonResponse($addNote($note));
    }
}
