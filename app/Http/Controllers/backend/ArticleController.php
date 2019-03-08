<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\backend\Controller;
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
			->select('id','title','tag','cover','user','createtime')
			->orderBy('createtime','desc')
			->paginate(1);
		return view('backend.article.list',['lists'=>$lists]);
	}

	public function add()
	{
		return view('backend.article.add');
	}

	public function edit($id)
	{
		$lists = DB::table('article')
			->select('title','tag','user','createtime')
			->orderBy('createtime','desc')
			->paginate(1);
		return view('backend.article.list',['lists'=>$lists]);
	}

	public function search($txt)
	{
		$lists = DB::table('article')
			->select('title','tag','user','createtime')
			->where('title',$txt)
			->orderBy('createtime','desc')
			->paginate(1);
		return view('backend.article.list',['lists'=>$lists]);
	}

	public function delete($id)
	{
		$lists = DB::table('article')
			->select('title','tag','user','createtime')
			->orderBy('createtime','desc')
			->paginate(1);
		return view('backend.article.list',['lists'=>$lists]);
	}
}