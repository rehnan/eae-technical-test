<?php

namespace App\Entities\Aggregates;

use App\Contracts\IEntity;
use App\Contracts\IValueObject;

class Level implements IEntity, IValueObject
{
    /**
     * @var string
     */
    public $name;

    public function __construct(array $params)
    {
        $this->name = data_get($params, 'name');
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name
        ];
    }
}
