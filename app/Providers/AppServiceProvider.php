<?php

namespace App\Providers;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Support\Facades\View;

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
        // $author=User::auth()->first();
        $categories = Category::take(5)->get();
        View::share('categories', $categories);
        $setting = Setting::first();
        View::share('setting', $setting);
        Paginator::useBootstrap();
    }
}
