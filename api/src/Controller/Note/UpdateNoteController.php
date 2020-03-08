<?php

namespace App\Controller\Note;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use function json_decode;

/**
 * @Route("/note/{id}", name="update_note", methods={"PUT"})
 */
class UpdateNoteController
{
    public function __invoke(Request $request) : JsonResponse
    {
        $content = json_decode($request->getContent(), true);

        return new JsonResponse(['modification' => 'oui', 'id' => $request->get('id'), 'content' => $content]);
    }
}
