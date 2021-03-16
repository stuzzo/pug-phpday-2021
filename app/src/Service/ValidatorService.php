<?php

declare(strict_types=1);

namespace App\Service;

use App\DTO\Request\RequestDTO;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\ConstraintViolationListInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

final class ValidatorService
{
    private ValidatorInterface $validator;
    private SerializerInterface $serializer;

    public function __construct(ValidatorInterface $validator, SerializerInterface $serializer)
    {
        $this->validator = $validator;
        $this->serializer = $serializer;
    }

    public function validateData(RequestDTO $requestDTO): array
    {
        $errors = [];
        $violationList = $this->validator->validate($requestDTO);
        if ($violationList->count()) {
            $errors = $this->serializeErrors($violationList);
        }

        return $errors;
    }

    private function serializeErrors(ConstraintViolationListInterface $violationList): array
    {
        $data = [];
        foreach ($violationList as $violation) {
            //$data[] = ['error' => $violation->]
            $data[$violation->getPropertyPath()][] = [
                'error' => $violation->getMessage(),
            ];
        }

        return $data;
    }
}