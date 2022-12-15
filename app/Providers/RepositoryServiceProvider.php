<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Contracts\EloquentInterface', 'App\Repositories\EloquentRepository');
        $this->app->bind('App\Contracts\Models\MenuInterface', 'App\Repositories\Models\MenuRepository');
        $this->app->bind('App\Contracts\Models\PageInterface', 'App\Repositories\Models\PageRepository');
        $this->app->bind('App\Contracts\Models\RoleInterface', 'App\Repositories\Models\RoleRepository');
        $this->app->bind('App\Contracts\Models\UserInterface', 'App\Repositories\Models\UserRepository');
        $this->app->bind('App\Contracts\Models\AuditInterface', 'App\Repositories\Models\AuditRepository');
        $this->app->bind('App\Contracts\Models\GradeInterface', 'App\Repositories\Models\GradeRepository');
        $this->app->bind('App\Contracts\Models\VotingInterface', 'App\Repositories\Models\VotingRepository');
        $this->app->bind('App\Contracts\Models\LanguageInterface', 'App\Repositories\Models\LanguageRepository');
        $this->app->bind('App\Contracts\Models\CandidateInterface', 'App\Repositories\Models\CandidateRepository');
        $this->app->bind('App\Contracts\Models\PermissionInterface', 'App\Repositories\Models\PermissionRepository');
        $this->app->bind('App\Contracts\Models\ApplicationInterface', 'App\Repositories\Models\ApplicationRepository');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // 
    }
}