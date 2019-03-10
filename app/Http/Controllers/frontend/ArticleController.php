<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\frontend\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

/**
 * 文章管理
 */
class ArticleController extends Controller
{

	public function list(Request $request)
	{
		if ($request -> has('tag')) {
			$lists = DB::table('article')
			->select('title','cover','user_id','tag_id','content','created_at')
			->where('tag_id',$request -> tag)
			->orderBy('created_at','desc')
			->get();
		} else {
			$lists = DB::table('article')
			->select('title','cover','user_id','tag_id','content','created_at')
			->orderBy('created_at','desc')
			->get();
		}
		return view('frontend.article.list',['lists'=>$lists]);
	}

	public function content($id)
	{
		$data = DB::table('article as a')
			->select('a.title','b.name as tag','a.user_id as user','a.cover','a.content','a.created_at')
			->leftJoin('tag as b', 'a.tag_id', '=', 'b.id')
			->where('a.id',$id)
			->first();
		return view('frontend.article.content',['data'=>$data]);
	}

	public function search($key)
	{
		$lists = DB::table('article')
			->select('title','tag','user','createtime')
			->where('title',$txt)
			->orderBy('createtime','desc')
			->paginate(1);
		return view('backend.article.list',['lists'=>$lists]);
	}
}