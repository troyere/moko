<?php

namespace App\Infrastructure\Note\ParamConverter;

use App\Domain\Note\ValueObject\NoteId;
use App\Infrastructure\Note\ValueObject\MongoNoteId;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterInterface;
use Symfony\Component\HttpFoundation\Request;

class NoteIdParamConverter implements ParamConverterInterface
{
    public function apply(Request $request, ParamConverter $configuration): bool
    {
        $request->attributes->set($configuration->getName(), new MongoNoteId($request->get('id')));

        return true;
    }

    public function supports(ParamConverter $configuration): bool
    {
        return NoteId::class === $configuration->getClass();
    }
}
