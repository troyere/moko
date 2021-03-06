<?php

namespace App\Infrastructure\Note\ParamConverter;

use App\Domain\Note\ValueObject\NoteValues;
use App\Infrastructure\JsonSchema\Exception\JsonDecodeReturnsNullException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterInterface;
use Symfony\Component\HttpFoundation\Request;

class NoteValuesParamConverter implements ParamConverterInterface
{
    public function apply(Request $request, ParamConverter $configuration): bool
    {
        assert(is_string($request->getContent()));

        $content = json_decode($request->getContent());
        if ($content === null) {
            throw new JsonDecodeReturnsNullException();
        }

        $request->attributes->set($configuration->getName(), new NoteValues($content->title, $content->content));

        return true;
    }

    public function supports(ParamConverter $configuration): bool
    {
        return $configuration->getClass() === NoteValues::class;
    }
}
