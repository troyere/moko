<?php

namespace App\Infrastructure\Json;

use App\Infrastructure\Json\Exceptions\InvalidJsonException;
use App\Infrastructure\Json\Exceptions\JsonDecodeReturnsNullException;
use Opis\JsonSchema\Schema;
use Opis\JsonSchema\ValidationError;
use Opis\JsonSchema\ValidationResult;
use Opis\JsonSchema\Validator;

abstract class JsonValidator
{
    private Validator $validator;

    public function __construct(Validator $validator)
    {
        $this->validator = $validator;
    }

    abstract function getSchema(): string;

    /**
     * @param string $json
     * @throws JsonDecodeReturnsNullException
     * @throws InvalidJsonException
     */
    public function validate(string $json)
    {
        $data = json_decode($json);
        if ($data === null) {
            throw new JsonDecodeReturnsNullException();
        }

        $result = $this->validator->schemaValidation($data, $this->createSchema());
        if (!$result->isValid()) {
            throw new InvalidJsonException($this->createResult($result));
        }
    }

    private function createSchema(): Schema
    {
        return Schema::fromJsonString($this->getSchema());
    }

    private function createResult(ValidationResult $result): JsonValidationResult
    {
        return new JsonValidationResult(
            $result->isValid(),
            array_map(
                fn(ValidationError $error) => new JsonValidationError(
                    $error->schema(),
                    $error->keyword(),
                    (object) $error->keywordArgs()
                ),
                $result->getErrors()
            )
        );
    }
}
