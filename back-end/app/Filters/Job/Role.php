<?php

namespace App\Filters\Job;

use App\Contracts\IFilter;
use Closure;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Request;

class Role implements IFilter
{
    /**
     * Apply role filter if the input present
     *
     * @param Builder $query
     * @param Closure $next
     *
     * @return mixed
     */
    public function handle(Builder $query, Closure $next)
    {
        if (Request::exists('role')) {
            $query->whereHas('role', function ($q) {
                $q->where('name', Request::input('role'));
            });
        }

        return $next($query);
    }
}
