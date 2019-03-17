<?php

namespace App\Http\Controllers\frontend;

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
			->select('id','name','author','cover','pubtime','introduce','download')
			->orderBy('id','ace')
			->paginate(10);
		return view('frontend.book.list',['lists'=>$lists]);
	}

	public function content($id)
	{
		$content = DB::table('book')
			->select('*')
			->where('id',$id)
			->first();
		return view('frontend.book.content',['content'=>$content]);
	}

	public function search($key)
	{
		$lists = DB::table('book')
			->select('id','name','author','cover','pubtime','introduce','download')
			->where('name','like','%'.$key.'%')
			->orderBy('id','ace')
			->paginate(10);
		return view('frontend.book.list',['lists'=>$lists]);
	}
}