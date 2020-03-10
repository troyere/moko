<?php

namespace App\Infrastructure\JsonSchema\Annotation;

use InvalidArgumentException;
use function get_class;

/**
 * @Annotation
 */
class JsonSchema
{
    protected string $path;

    public function __construct(array $values)
    {
        if (empty($values['path'])) {
            throw new InvalidArgumentException(
                sprintf('Required key "path" for annotation "%s".', get_class($this))
            );
        }

        $this->path = $values['path'];

        if (!is_readable($this->path)) {
            throw new InvalidArgumentException(
                sprintf('JSON Schema "%s" not readable for annotation "%s".', $this->path, get_class($this))
            );
        }
    }

    public function getPath(): string
    {
        return $this->path;
    }
}
