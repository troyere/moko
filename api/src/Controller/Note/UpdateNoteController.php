<?php

namespace App\Controller\Note;

use App\Domain\Note\Adapter\UpdateNote;
use App\Domain\Note\ValueObject\NoteId;
use App\Domain\Note\ValueObject\NoteValues;
use App\Infrastructure\JsonSchema\Annotation\JsonSchema;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/note/{id}", name="update_note", methods={"PUT"})
 * @JsonSchema(path=NoteValues::JSON_SCHEMA_PATH)
 * @ParamConverter("id", converter="note_id.converter")
 * @ParamConverter("note", converter="note_values.converter")
 */
class UpdateNoteController
{
    public function __invoke(UpdateNote $updateNote, NoteId $id, NoteValues $note): JsonResponse
    {
        return new JsonResponse($updateNote($id, $note), Response::HTTP_OK);
    }
}
