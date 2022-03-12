<?php

namespace App\Contracts;

interface IRepository
{
    public function findById(string $id): IEntity;
    public function getAll(array $filters = []): IResource;
}
