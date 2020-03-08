<?php

namespace App\EventListener;

use App\Infrastructure\Json\Exceptions\InvalidJsonException;
use App\Infrastructure\Json\Exceptions\JsonDecodeReturnsNullException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;

class ExceptionListener
{
    public function onKernelException(ExceptionEvent $event): void
    {
//        $e = $event->getThrowable();
//
//        $statusCode = Response::HTTP_INTERNAL_SERVER_ERROR;
//        $message = $e->getMessage();
//        $context = [];
//        $headers = [];
//
//        if ($e instanceof HttpExceptionInterface) {
//            $statusCode = $e->getStatusCode();
//            $headers = $e->getHeaders();
//        } else if ($e instanceof JsonDecodeReturnsNullException) {
//            $statusCode = Response::HTTP_BAD_REQUEST;
//        } else if ($e instanceof InvalidJsonException) {
//            $statusCode = Response::HTTP_BAD_REQUEST;
//            $context = $e->getResult();
//        }
//
//        $data = [];
//        if (!empty($message)) {
//            $data['message'] = $message;
//        }
//        if (!empty($context)) {
//            $data['context'] = $context;
//        }
//
//        $event->setResponse(new JsonResponse($data, $statusCode, $headers));
    }
}
