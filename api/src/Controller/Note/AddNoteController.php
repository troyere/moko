<?php

namespace App\Controller\Note;

use App\Domain\Note\Adapter\AddNote;
use App\Domain\Note\ValueObject\AddNoteRequest;
use App\Infrastructure\JsonSchema\Annotation\JsonSchema;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/note", name="add_note", methods={"POST"})
 * @JsonSchema(path=AddNoteRequest::JSON_SCHEMA_PATH)
 * @ParamConverter("addNoteRequest", converter="add_note.converter")
 */
class AddNoteController
{
    public function __invoke(AddNoteRequest $addNoteRequest, AddNote $addNote) : JsonResponse
    {
        return new JsonResponse($addNote($addNoteRequest));
    }
}
