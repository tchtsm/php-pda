<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
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
            //前台
            $article_ups = DB::table('article')
                ->select('id','title')
                ->orderBy('created_at','desc')
                ->limit(5)
                ->get();
            $tags = DB::table('tag')
                ->select('id','name')
                ->get();
            //后台
            $menus = DB::table('access as a')
                ->select('a.name','a.url')
                ->leftJoin('role_access as b','b.access_id','=','a.id')
                ->leftJoin('role as c','c.id','=','b.role_id')
                ->leftJoin('user_role as d','d.role_id','=','c.id')
                ->leftJoin('user as f','f.id','=','d.user_id')
                ->where('f.id','=',Auth::id())
                ->get();
            $view->with(['tags'=>$tags,'article_ups'=>$article_ups,'menus'=>$menus]);
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
