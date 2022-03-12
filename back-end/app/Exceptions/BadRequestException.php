<?php

declare(strict_types = 1);

namespace App\Exceptions;

use Symfony\Component\HttpFoundation\Response;

class BadRequestException extends AppException
{
    public function __construct(array $errors)
    {
        parent::__construct($errors, Response::HTTP_BAD_REQUEST);
    }
}
