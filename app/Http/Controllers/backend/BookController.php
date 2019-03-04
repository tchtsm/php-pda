<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\backend\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

/**
 * 文章管理
 */
class BookController extends Controller
{

	public function list()
	{
		$lists = DB::table('book')
			->select('id','name','author','publish','pubtime')
			->orderBy('id','asc')
			->paginate(1);
		return view('backend.book.list',['lists'=>$lists]);
	}

	public function content($id)
	{
		
		$content = DB::table('book')
			->select('*')
			->where('id',$id)
			->first();
		return view('backend.book.content',['content'=>$content]);
	}

	public function search($key)
	{
		$lists = DB::table('book')
			->select('id','name','author','cover','pubtime','introduce','download')
			->where('name','like',$key)
			->orderBy('id','ace')
			->paginate(1);
		return view('backend.book.list',['lists'=>$lists]);
	}
}