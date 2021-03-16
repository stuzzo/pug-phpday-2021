<?php

declare(strict_types=1);

namespace App\Service;

use Ramsey\Uuid\Uuid;

final class UuidService
{
    public function getUuid(): string
    {
        return Uuid::uuid4()->toString();
    }
}