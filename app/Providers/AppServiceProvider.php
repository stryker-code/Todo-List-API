<?php

namespace App\Providers;

use App\Contracts\TaskRepositoryInterface;
use App\Contracts\TaskServiceInterface;
use App\Repositories\TaskRepository;
use App\Services\TaskServiceService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(TaskServiceInterface::class, TaskServiceService::class);
        $this->app->bind(TaskRepositoryInterface::class, TaskRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
    }
}
