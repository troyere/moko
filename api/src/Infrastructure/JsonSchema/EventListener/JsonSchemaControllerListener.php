<?php

namespace App\Infrastructure\JsonSchema\EventListener;

use App\Infrastructure\JsonSchema\Annotation\JsonSchema;
use App\Infrastructure\JsonSchema\Exception\JsonDecodeReturnsNullException;
use App\Infrastructure\JsonSchema\Exception\SchemaFileNotReadableException;
use App\Infrastructure\JsonSchema\Validation\JsonSchemaValidator;
use Closure;
use Doctrine\Common\Annotations\Reader;
use ReflectionClass;
use ReflectionException;
use ReflectionFunction;
use ReflectionMethod;
use Reflector;
use Symfony\Component\HttpKernel\Event\ControllerEvent;
use UnexpectedValueException;

class JsonSchemaControllerListener
{
    private Reader $annotationReader;
    private JsonSchemaValidator $validator;

    public function __construct(Reader $annotationReader, JsonSchemaValidator $validator)
    {
        $this->annotationReader = $annotationReader;
        $this->validator = $validator;
    }

    public function onKernelController(ControllerEvent $event): void
    {
        $annotation = $this->getAnnotation($event->getController(), JsonSchema::class);

        if ($annotation instanceof JsonSchema) {
            $content = $event->getRequest()->getContent();
            assert(is_string($content));

            $jsonData = json_decode($content);
            if (null === $jsonData) {
                throw new JsonDecodeReturnsNullException();
            }

            $jsonSchema = file_get_contents($annotation->getPath());
            if (false === $jsonSchema) {
                throw new SchemaFileNotReadableException();
            }

            $this->validator->validate($jsonData, $jsonSchema);
        }
    }

    private function getAnnotation(callable $controller, string $annotationName): ?object
    {
        $reflection = $this->getReflectionController($controller);

        if ($reflection instanceof ReflectionMethod) {
            return $this->annotationReader->getMethodAnnotation($reflection, $annotationName);
        } elseif ($reflection instanceof ReflectionClass) {
            return $this->annotationReader->getClassAnnotation($reflection, $annotationName);
        }

        return null;
    }

    private function getReflectionController(callable $controller): ?Reflector
    {
        try {
            if (is_array($controller)) {
                return new ReflectionMethod($controller[0], $controller[1]);
            } elseif (is_object($controller) && is_callable([$controller, '__invoke'])) {
                return new ReflectionClass($controller);
            } elseif (is_string($controller) || $controller instanceof Closure) {
                return new ReflectionFunction($controller);
            }

            return null;
        } catch (ReflectionException $e) {
            throw new UnexpectedValueException('Invalid controller.', 0, $e);
        }
    }
}
