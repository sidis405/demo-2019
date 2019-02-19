<?php

namespace App\Providers;

use App\Tag;
use App\Post;
use App\Category;
use App\Observers\PostObserver;
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
        // Post::observe(PostObserver::class);
        View::composer('layouts.app', function ($view) {
            $categories = Category::withCount('posts')->whereHas('posts')->orderBy('posts_count', 'DESC')->get();
            $tags = Tag::withCount('posts')->whereHas('posts')->get();
            $archive = Post::selectRaw('year(created_at) as year, monthname(created_at) as month, count(*) as published')->groupBy('year', 'month')
            ->orderByRaw('min(created_at) DESC')->take(12)->get();

            return $view->with(compact('categories', 'tags', 'archive'));
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
