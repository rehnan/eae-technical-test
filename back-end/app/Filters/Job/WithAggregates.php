<?php

namespace App\Filters\Job;

use App\Contracts\IFilter;
use Closure;
use Illuminate\Database\Eloquent\Builder;

class WithAggregates implements IFilter
{
    private $aggregates = [
        'company',
        'contract',
        'location',
        'level',
        'role',
        'languages',
        'tools'
    ];

    /**
     * Attach aggregates entities
     *
     * @param Builder $query
     * @param Closure $next
     *
     * @return mixed
     */
    public function handle(Builder $query, Closure $next)
    {
        $query->with($this->aggregates);

        return $next($query);
    }
}
