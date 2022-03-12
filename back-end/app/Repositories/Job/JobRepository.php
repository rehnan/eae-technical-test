<?php

namespace App\Repositories\Job;

use App\Contracts\IEntity;
use App\Contracts\IRepository;
use App\Contracts\IResource;
use App\Entities\Job\Job;
use App\Factories\Factory;
use App\Http\Resources\Job\ListAllResource;
use App\Models\JobDto;
use DomainException;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pipeline\Pipeline;

class JobRepository implements IRepository
{
    /**
     * DB connection interface
     *
     * @var Builder $client
     */
    private $client;

    /**
     * Aggregates entities
     *
     * @var string[]
     */
    private $aggregates = [
      'company',
      'contract',
      'language',
      'level',
      'role',
      'tool'
    ];

    public function __construct()
    {
        $this->client = JobDto::on(env('DB_CONNECTION', 'pgsql'));
    }

    /**
     * Find job by ID
     *
     * @param string $id
     *
     * @return IEntity
     */
    public function findById(string $id): IEntity
    {
        $job = $this->client->where('id', $id)->with($this->aggregates)->first();

        if (!$job) {
            throw new DomainException('Job not found');
        }

        return Factory::create(Job::class, $job->toArray());
    }

    /**
     * Get all jobs resource
     *
     * @param array $filters
     *
     * @return IResource
     */
    public function getAll(array $filters = []): IResource
    {
        $jobs = app(Pipeline::class)
            ->send($this->client)
            ->through($filters)
            ->thenReturn();

        return new ListAllResource($jobs->get());
    }
}
