<?php

namespace App\Controller\Note;

use App\Domain\Note\Adapter\AddNote;
use App\Domain\Note\ValueObject\NoteValues;
use App\Infrastructure\JsonSchema\Annotation\JsonSchema;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/note", name="add_note", methods={"POST"})
 * @JsonSchema(path=NoteValues::JSON_SCHEMA_PATH)
 * @ParamConverter("note", converter="note_values.converter")
 */
class AddNoteController
{
    public function __invoke(AddNote $addNote, NoteValues $note): JsonResponse
    {
        return new JsonResponse($addNote($note), Response::HTTP_CREATED);
    }
}
