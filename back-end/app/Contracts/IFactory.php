<?php

namespace App\Contracts;

use Illuminate\Support\Collection;

interface IFactory
{
    static public function create(string $entity, array $attributes = []): IEntity;
    static public function createMany(string $entity, array $entities): Collection;
}
