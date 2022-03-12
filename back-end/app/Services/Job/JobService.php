<?php

namespace App\Services\Job;

use App\Contracts\IResource;
use App\Contracts\IService;
use App\Filters\Job\Level;
use App\Filters\Job\Role;
use App\Filters\Job\WithAggregates;
use App\Repositories\Job\JobRepository;

class JobService implements IService
{
    /**
     * @var JobRepository
     */
    private $repository;

    /**
     * @param JobRepository $repository
     */
    public function __construct(JobRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Get all jobs
     *
     * @return IResource
     */
    public function getAll(): IResource
    {
        return $this->repository->getAll([WithAggregates::class, Role::class, Level::class]);
    }
}
