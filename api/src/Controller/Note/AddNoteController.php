<?php

namespace App\Controller\Note;

use App\Infrastructure\Json\Exceptions\InvalidJsonException;
use App\Infrastructure\Json\Exceptions\JsonDecodeReturnsNullException;
use App\Infrastructure\Note\Json\AddNoteJsonValidator;
use Exception;
use MongoDB\Client;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Throwable;
use function json_decode;

/**
 * @Route("/note", name="add_note", methods={"POST"})
 */
class AddNoteController
{
    public function __invoke(Request $request, AddNoteJsonValidator $validator, Client $client) : JsonResponse
    {
        $validator->validate($request->getContent());

        $content = json_decode($request->getContent());

        $collection = $client->moko->notes;

        $insertOneResult = $collection->insertOne($content);

        return new JsonResponse(['ajout' => 'oui', 'content' => $content]);
    }
}
