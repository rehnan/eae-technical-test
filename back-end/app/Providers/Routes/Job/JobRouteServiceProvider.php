<?php

namespace App\Providers\Routes\Job;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class JobRouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller router.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers\Job';

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mapApiRoutes();
    }

    /**
     * Define the "api" router for the application.
     *
     * These router all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapApiRoutes(): void
    {
        Route::group([
            'namespace' => $this->namespace,
            'middleware' => 'security-headers'
        ], function () {
            Route::get('/', 'JobController@version');
        });

        Route::group([
            'prefix' => 'v1/jobs',
            'namespace' => $this->namespace,
            'middleware' => 'security-headers'
        ], function () {
            Route::get('/', 'JobController@getAll');
        });
    }
}
