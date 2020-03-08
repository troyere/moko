<?php

namespace App\Controller\Note;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use function json_decode;

/**
 * @Route("/note/{id}", name="read_note", methods={"GET"})
 */
class ReadNoteController
{
    public function __invoke(int $id) : JsonResponse
    {
        return new JsonResponse(['lecture' => 'oui', 'id' => $id]);
    }
}
