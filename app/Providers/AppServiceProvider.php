<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Modules\Task\Repositories\TaskRepositoryInterface;
use App\Modules\Task\Repositories\TaskRepositoryImpl;
use App\Modules\Employee\Repositories\EmployeeRepositoryInterface;
use App\Modules\Employee\Repositories\EmployeeRepositoryImpl;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            TaskRepositoryInterface::class,
            TaskRepositoryImpl::class,
            EmployeeRepositoryInterface::class,
            EmployeeRepositoryImpl::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
