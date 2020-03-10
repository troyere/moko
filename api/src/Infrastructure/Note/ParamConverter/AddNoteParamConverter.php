<?php

namespace App\Infrastructure\Note\ParamConverter;

use App\Domain\Note\ValueObject\AddNoteRequest;
use App\Infrastructure\Exceptions\JsonDecodeReturnsNullException;
use App\Infrastructure\Note\Validation\JsonSchema\AddNoteJsonSchemaValidator;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterInterface;
use Symfony\Component\HttpFoundation\Request;

class AddNoteParamConverter implements ParamConverterInterface
{
    private AddNoteJsonSchemaValidator $validator;

    public function __construct(AddNoteJsonSchemaValidator $validator)
    {
        $this->validator = $validator;
    }

    public function apply(Request $request, ParamConverter $configuration): bool
    {
        $content = json_decode($request->getContent());
        if ($content === null) {
            throw new JsonDecodeReturnsNullException();
        }

        $this->validator->validate($content);

        $request->attributes->set($configuration->getName(), new AddNoteRequest($content->title, $content->content));

        return true;
    }

    public function supports(ParamConverter $configuration): bool
    {
        return $configuration->getClass() === AddNoteRequest::class;
    }
}
