<?php

namespace App\Providers;

use App\Models\tag;
use App\Models\post;
use App\Models\category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        // To Display All About News
        View::composer(['home','home2'],function($view) {
            $tags = tag::all();
            $news = post::with(['tags'])->get();
            $category = category::with(['posts'])->get();
            // $view->with('category',$category);
            $view->with('news',$news)
            ->with('category',$category);
        });
    }
}
