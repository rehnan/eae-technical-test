<?php

namespace App\Validators\Job;

use App\Validators\AbstractValidator;

class GetAllJobsValidator extends AbstractValidator
{
    /**
     * array of rules to validator
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'level' => 'string|filled',
            'role' => 'string|filled'
        ];
    }

    public function messages(): array
    {
        return [];
    }

    /**
     * Array of custom attributes for validator
     *
     * @return array
     */
    public function customAttributes(): array
    {
        return [];
    }
}
