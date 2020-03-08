<?php

namespace App\Controller\Note;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use function json_decode;

/**
 * @Route("/note/{id}", name="delete_note", methods={"DELETE"})
 */
class DeleteNoteController
{
    public function __invoke(int $id) : JsonResponse
    {
        return new JsonResponse(['suppression' => 'oui', 'id' => $id]);
    }
}
