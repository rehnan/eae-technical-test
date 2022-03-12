<?php

namespace App\Entities\Aggregates;

use App\Contracts\IEntity;
use App\Contracts\IValueObject;

class Contract implements IEntity, IValueObject
{
    /**
     * @var string
     */
    public $type;

    public function __construct(array $params)
    {
        $this->type = data_get($params, 'type');
    }

    public function toArray(): array
    {
        return [
            'name' => $this->type
        ];
    }
}
