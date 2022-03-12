<?php

namespace App\Filters\Job;

use App\Contracts\IFilter;
use Closure;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Request;

class Level implements IFilter
{
    /**
     * Apply level filter if the input present
     *
     * @param Builder $query
     * @param Closure $next
     *
     * @return mixed
     */
    public function handle(Builder $query, Closure $next)
    {
        if (Request::exists('level')) {
            $query->whereHas('level', function ($q) {
                $q->where('name', Request::input('level'));
            });
        }

        return $next($query);
    }
}
