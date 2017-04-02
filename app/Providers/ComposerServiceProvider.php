<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Ad;
use App\Category;
class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $ads = Ad::orderBy('created_at','desc')->paginate(8);
        $categories = Category::all();
        view()->share('ads',$ads);
        view()->share('categories',$categories);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
