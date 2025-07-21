<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Modules\Task\Repositories\TaskRepositoryInterface;
use App\Modules\Task\Repositories\TaskRepositoryImpl;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            TaskRepositoryInterface::class,
            TaskRepositoryImpl::class
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
