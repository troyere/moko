<?php

namespace App\Infrastructure\JsonSchema\Validation;

use App\Infrastructure\JsonSchema\Exception\InvalidJsonException;
use Opis\JsonSchema\Schema;
use Opis\JsonSchema\ValidationError;
use Opis\JsonSchema\ValidationResult;
use Opis\JsonSchema\Validator;
use StdClass;
use UnexpectedValueException;

class JsonSchemaValidator
{
    private Validator $validator;

    public function __construct(Validator $validator)
    {
        $this->validator = $validator;
    }

    /**
     * @param mixed $data
     *
     * @throws InvalidJsonException
     */
    public function validate($data, string $schema): void
    {
        $result = $this->validator->schemaValidation($data, Schema::fromJsonString($schema));
        if (!$result->isValid()) {
            throw new InvalidJsonException($this->createResult($result));
        }
    }

    private function createResult(ValidationResult $result): JsonSchemaValidationResult
    {
        return new JsonSchemaValidationResult(
            $result->isValid(),
            array_map([$this, 'createValidationError'], $result->getErrors())
        );
    }

    private function createValidationError(ValidationError $error): JsonSchemaValidationError
    {
        if (!$error->schema() instanceof StdClass) {
            throw new UnexpectedValueException('Empty schema.');
        }

        return new JsonSchemaValidationError($error->schema(), $error->keyword(), (object) $error->keywordArgs());
    }
}
