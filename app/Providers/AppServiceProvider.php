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
        $this->bindRepositories();
    }

    protected function bindRepositories() {
        $repositories = [
            TaskRepositoryInterface::class => TaskRepositoryImpl::class,
            EmployeeRepositoryInterface::class => EmployeeRepositoryImpl::class,
            // Register other repositories here
        ];

        foreach ($repositories as $interface => $implementation) {
            $this->app->bind($interface, $implementation);
        }
    }


    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
