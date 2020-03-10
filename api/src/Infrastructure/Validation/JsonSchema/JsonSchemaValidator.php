<?php

namespace App\Infrastructure\Validation\JsonSchema;

use Opis\JsonSchema\Schema;
use Opis\JsonSchema\ValidationError;
use Opis\JsonSchema\ValidationResult;
use Opis\JsonSchema\Validator;

abstract class JsonSchemaValidator
{
    private Validator $validator;

    public function __construct(Validator $validator)
    {
        $this->validator = $validator;
    }

    abstract function getSchema(): string;

    /**
     * @param mixed $data
     * @throws InvalidJsonException
     */
    public function validate($data)
    {
        $result = $this->validator->schemaValidation($data, $this->createSchema());
        if (!$result->isValid()) {
            throw new InvalidJsonException($this->createResult($result));
        }
    }

    private function createSchema(): Schema
    {
        return Schema::fromJsonString($this->getSchema());
    }

    private function createResult(ValidationResult $result): JsonSchemaValidationResult
    {
        return new JsonSchemaValidationResult(
            $result->isValid(),
            array_map(
                fn(ValidationError $error) => new JsonSchemaValidationError(
                    $error->schema(),
                    $error->keyword(),
                    (object) $error->keywordArgs()
                ),
                $result->getErrors()
            )
        );
    }
}
