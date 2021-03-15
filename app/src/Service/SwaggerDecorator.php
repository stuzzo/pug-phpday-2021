<?php

declare(strict_types=1);

namespace App\Service;


use Symfony\Component\Serializer\Exception\CircularReferenceException;
use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Exception\LogicException;
use Symfony\Component\Serializer\Normalizer\NormalizableInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class SwaggerDecorator
{

//    public function normalize($object, string $format = null, array $context = [])
//    {
//        // TODO: Implement normalize() method.
//    }
//
//    public function supportsNormalization($data, string $format = null)
//    {
//        return true;
//    }
}