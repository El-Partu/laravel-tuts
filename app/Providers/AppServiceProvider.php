<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator as PaginationPaginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        // Gate::define('edit-job',function( User $user, $job){
        //     return $job->employer->user->is($user);
        // });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Model::preventLazyLoading(false);
        // PaginationPaginator::useBootstrapFive();
    }
}
