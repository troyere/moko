<?php

namespace App\EventListener;

use App\Infrastructure\Exceptions\JsonDecodeReturnsNullException;
use App\Infrastructure\Validation\JsonSchema\InvalidJsonException;
use Symfony\Component\ErrorHandler\Exception\FlattenException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;

class ExceptionListener
{
    private string $env;

    public function __construct(string $env)
    {
        $this->env = $env;
    }

    public function onKernelException(ExceptionEvent $event): void
    {
        $domainJsonResponse = $this->getDomainJsonResponse($event);

        if ($domainJsonResponse !== null) {
            $event->setResponse($domainJsonResponse);
            return;
        }

        $event->setResponse($this->getJsonResponse($event));
    }

    private function getDomainJsonResponse(ExceptionEvent $event): ?JsonResponse
    {
        $t = $event->getThrowable();

        if ($t instanceof JsonDecodeReturnsNullException) {
            return new JsonResponse(
                ['message' => $t->getMessage()],
                Response::HTTP_BAD_REQUEST
            );
        } else if ($t instanceof InvalidJsonException) {
            return new JsonResponse(
                ['message' => $t->getMessage(), 'result' => $t->getResult()],
                Response::HTTP_BAD_REQUEST
            );
        }

        return null;
    }

    private function getJsonResponse(ExceptionEvent $event): JsonResponse
    {
        $t = FlattenException::createFromThrowable($event->getThrowable());

        if ($this->env === 'prod') {
            $message = sprintf('The server returned a %s %s.', $t->getStatusCode(), $t->getStatusText());

            return new JsonResponse(['message' => $message], $t->getStatusCode());
        }

        return new JsonResponse(['message' => $t->getMessage(), 'trace' => $t->getTrace()], $t->getStatusCode());
    }
}
