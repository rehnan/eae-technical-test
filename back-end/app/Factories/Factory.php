<?php

namespace App\Factories;

use App\Contracts\IEntity;
use App\Contracts\IFactory;
use Illuminate\Support\Collection;

class Factory implements IFactory
{
    /**
     * Create s single entity instance
     *
     * @param string $entity
     * @param array  $attributes
     *
     * @return IEntity
     */
    static public function create(string $entity, array $attributes = []): IEntity
    {
        return new $entity($attributes);
    }

    /**
     * Create many entity instances
     *
     * @param string     $entity
     * @param array $entities
     *
     * @return Collection
     */
    static public function createMany(string $entity, array $entities): Collection
    {
        return collect($entities)->map(function ($item) use ($entity) {
            return self::create($entity, $item);
        });
    }
}
