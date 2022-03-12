<?php

declare(strict_types=1);

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;

class AppException extends Exception
{
    /**
     * Define http status code return
     *
     * @var int
     */
    public $httpStatusCode;


    /**
     * Error list
     *
     * @var $errors array
     */
    private $errors;

    public function __construct(array $errors = [], int $status = Response::HTTP_INTERNAL_SERVER_ERROR)
    {
        // parent::__construct($genericDetail, 0, $sourceException);
        $this->setErrors($errors);
        $this->setHttpStatusCode($status);
    }

    /**
     * Get http status code
     *
     * @return int
     */
    public function getHttpStatusCode(): int
    {
        return $this->httpStatusCode;
    }

    /**
     * Set http status code
     *
     * @param int $status
     */
    public function setHttpStatusCode(int $status): void
    {
        $this->httpStatusCode = $status;
    }

    /**
     * Get errors
     *
     * @return array
     */
    public function getErrors(): array
    {
        return $this->errors;
    }

    /**
     * Set errors
     *
     * @param array $errors
     *
     * @return array
     */
    public function setErrors(array $errors): array
    {
        return $this->errors = $errors;
    }
}
