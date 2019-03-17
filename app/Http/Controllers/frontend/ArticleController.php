<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

/**
 * 文章管理
 */
class ArticleController extends Controller
{

	public function list_tag($tag)
	{
		$tag_id = DB::table("tag")
			->select('id')
			->where('name','=',$tag)
			->first();

		$lists = DB::table('article as a')
			->select('a.id','a.title','a.cover','b.name as user','c.name as tag','a.content','a.created_at')
			->leftJoin('user as b','b.id','=','a.user_id')
			->leftJoin('tag as c','c.id','=','a.tag_id')
			->where('c.id','=',$tag_id->id)
			->orderBy('created_at','desc')
			->paginate(10);
		return view('frontend.article.list',['lists'=>$lists]);
	}

	public function list()
	{
		$lists = DB::table('article as a')
			->select('a.id','a.title','a.cover','b.name as user','c.name as tag','a.content','a.created_at')
			->leftJoin('user as b','b.id','=','a.user_id')
			->leftJoin('tag as c','c.id','=','a.tag_id')
			->orderBy('created_at','desc')
			->paginate(10);
		return view('frontend.article.list',['lists'=>$lists]);
	}

	public function content($id)
	{
		$data = DB::table('article as a')
			->select('a.title','b.name as user','c.name as tag','a.content','a.created_at')
			->leftJoin('user as b','b.id','=','a.user_id')
			->leftJoin('tag as c','c.id','=','a.tag_id')
			->where('a.id','=',$id)
			->first();
		return view('frontend.article.content',['data'=>$data]);
	}

	public function search($key)
	{
		$lists = DB::table('article as a')
			->select('a.id','a.title','a.cover','b.name as user','c.name as tag','a.content','a.created_at')
			->leftJoin('user as b','b.id','=','a.user_id')
			->leftJoin('tag as c','c.id','=','a.tag_id')
			->where('a.title','like','%'.$key.'%')
			->paginate(10);
		return view('frontend.article.list',['lists'=>$lists]);
	}
}