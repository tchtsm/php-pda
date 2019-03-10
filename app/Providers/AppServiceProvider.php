<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*',function($view)
        {
            $article_ups = DB::table('article')
                ->select('id','title')
                ->orderBy('created_at','desc')
                ->limit(5)
                ->get();
            $tags = DB::table('tag')
                ->select('id','name')
                ->get();
            $view->with(['tags'=>$tags,'article_ups'=>$article_ups]);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
