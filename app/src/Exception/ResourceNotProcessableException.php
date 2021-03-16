<?php

declare(strict_types=1);

namespace App\Exception;

use JetBrains\PhpStorm\Pure;
use Throwable;

final class ResourceNotProcessableException extends \Exception
{
    #[Pure] public function __construct(string $resourceClass, string $id, int $code = 0, Throwable $previous = null)
    {
        $message = sprintf(sprintf('%s with id %s not found.', ucfirst($resourceClass), $id));

        parent::__construct($message, $code, $previous);
    }
}