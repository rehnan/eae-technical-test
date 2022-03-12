<?php

namespace App\Validators;

use App\Exceptions\BadRequestException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\Validator as ValidatorFacade;
use Illuminate\Support\MessageBag;

use function request;

abstract class AbstractValidator
{
    /**
     * Exception class name that will be thrown on validation failed event
     * Default: BadRequestException::class
     *
     * @var string|null
     */
    protected $exceptionClass = BadRequestException::class;

    /**
     * guard validator instance
     *
     * @var Validator
     */
    private $validatorInstance;

    /**
     * Constructor create validator instance
     *
     * @param array|null $data payload to validate
     */
    public function __construct(array $data = null)
    {
        $payload = $data ?? request()->all();
        $this->validatorInstance = $this->buildValidatorInstance($payload);
    }

    /**
     * Build a validator instance with values from abstract methods
     *
     * @param array $data payload to validate
     * @return Validator
     */
    private function buildValidatorInstance(array $data): Validator
    {
        return ValidatorFacade::make(
            $data,
            $this->rules(),
            $this->messages(),
            $this->customAttributes()
        );
    }

    /**
     * Get Validator instance
     *
     * @return Validator
     */
    public function getValidator(): Validator
    {
        return $this->validatorInstance;
    }

    /**
     * Get error messages from validator
     *
     * @return MessageBag
     */
    public function getMessages(): MessageBag
    {
        return $this->validatorInstance->messages();
    }

    /**
     * Check validator fails
     *
     * @return boolean
     */
    public function fails(): bool
    {
        return $this->validatorInstance->fails();
    }

    /**
     * Check result fails and throw validation app exception
     *
     */
    public function validate(): void
    {
        if ($this->fails()) {
            $errors = $this->getErrors();
            throw new $this->exceptionClass($errors);
        }
    }

    /**
     * Get validation errors
     *
     * @return array
     */
    protected function getErrors(): array
    {
        return $this->getMessages()->toArray();
    }

    /**
     * Array of rules for validator
     *
     * @return array
     */
    abstract public function rules(): array;

    /**
     * Array of messages for validator
     *
     * @return array
     */
    abstract public function messages(): array;

    /**
     * Array of custom attributes for validator
     *
     * @return array
     */
    abstract public function customAttributes(): array;

}
