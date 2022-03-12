<?php

namespace App\Http\Controllers\Job;

use App\Http\Controllers\Controller;
use App\Services\Job\JobService;
use App\Validators\Job\GetAllJobsValidator;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Get version
     *
     * @return string
     */
    public function version(): string
    {
        return App()->version();
    }

    /**
     * Get all jobs
     *
     * @param Request    $request
     * @param JobService $service
     * @param GetAllJobsValidator $validator
     *
     * @return JsonResponse
     */
    public function getAll(GetAllJobsValidator $validator, JobService $service): JsonResponse
    {
        $validator->validate();
        return response()->json($service->getAll());
    }
}
