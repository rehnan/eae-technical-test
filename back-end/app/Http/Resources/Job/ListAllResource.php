<?php

namespace App\Http\Resources\Job;

use App\Contracts\IResource;
use App\Entities\Job\Job;
use App\Factories\Factory;
use Illuminate\Http\Resources\Json\JsonResource;

class ListAllResource extends JsonResource implements IResource
{
    public function toArray($request)
    {
        return $this->resource->collect()->map(function ($item) {
            return (Factory::create(Job::class, $item->toArray()))->toArray();
        });
    }
}
