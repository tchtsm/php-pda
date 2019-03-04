<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\backend\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

/**
 * 通知公告
 */
class ArticleController extends Controller
{

	public function list()
	{
		$lists = DB::table('article')
			->select('title','tag','user','createtime')
			->orderBy('createtime','desc')
			->paginate(1);
		return view('backend.article.list',['lists'=>$lists]);
	}

	public function content($id)
	{
		$lists = DB::table('article')
			->select('title','content','user','createtime')
			->where('title',$txt)
			->orderBy('createtime','desc')
			->paginate(1);
		return view('backend.article.list',['lists'=>$lists]);
	}
}