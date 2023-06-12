<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator as PaginationPaginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
          // PaginationPaginator::useBootstrap();
          Model::unguard();
        //   dd (Gate:: allows ('admin'));

          Gate::define('admin', function(User $user) {
              return $user->email == 'fafafavd@gmail.com';
          });
  
          // we made a blade component named admin 
          // sar fini 2oll @admin ww @endadmin
          Blade::if('admin', function() {
              return request()->user()?->can('admin');
              // if we have a user and if the user is the admin
          });
    }
}
