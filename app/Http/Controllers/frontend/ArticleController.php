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

	public function list()
	{
		$lists = DB::table('article')
			->select('title','tag','user','created_at')
			->orderBy('created_at','desc')
			->get();
		return view('frontend.article.list',['lists'=>$lists]);
	}

	public function content($id)
	{
		$content = DB::table('article')
			->select('title','tag','user','createtime')
			->where('id',$id)
			->first();
		return view('frontend.article.content',['content'=>$content]);
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