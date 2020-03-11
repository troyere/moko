<?php

namespace App\Controller\Note;

use App\Domain\Note\Adapter\DeleteNote;
use App\Domain\Note\ValueObject\NoteId;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

/**
 * @Route("/note/{id}", name="delete_note", methods={"DELETE"})
 * @ParamConverter("id", converter="note_id.converter")
 */
class DeleteNoteController
{
    public function __invoke(NoteId $id, DeleteNote $deleteNote) : JsonResponse
    {
        return new JsonResponse($deleteNote($id));
    }
}
