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
            $menus = $this -> getUserMenu(Auth::id());

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

    private function getUserMenu($user_id)
    {
        $menu = array();

        $access_user = DB::table('access as a')
            ->select('a.id','a.name','a.url')
            ->leftJoin('role_access as b','b.access_id','=','a.id')
            ->leftJoin('role as c','c.id','=','b.role_id')
            ->leftJoin('user_role as d','d.role_id','=','c.id')
            ->leftJoin('user as f','f.id','=','d.user_id')
            ->where('f.id',$user_id)
            ->get();
        $access_lv2 = DB::table('access') -> select('name','url','parent_id') -> where('menulv_id',2) -> get();

        foreach ($access_user as $val) {
            $menu[''.$val->id] = ['name'=>$val->name, 'url'=>$val->url,'child'=>array()];
        }

        foreach ($access_lv2 as $val) {
            if (array_key_exists($val->parent_id,$menu)) {
                array_push($menu[''.$val->parent_id]['child'], ['name'=>$val->name, 'url'=>$val->url]);
            }
        }

        return array_values($menu);
    }
}
