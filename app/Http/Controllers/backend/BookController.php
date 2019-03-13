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

	public function form(Request $request)
	{
		if ($request -> has('id')) {
			$data = DB::table('book')
				-> select('id','name','author','cover','publish','pubtime','intro','menu','download')
				-> where('id', $request -> id)
				-> first();
			if (is_null($data)) {
				return '不存在次书籍';
			}else{
				return view('backend.book.form', ['data' => $data]);
			}
		}else{
			return view('backend.book.form');
		}
	}

	public function store(Request $request)
	{
		$data = [
			'name' => $request -> name,
			'author' => $request -> author,
			'cover' => $request -> file,
			'publish' => $request -> publish,
			'pubtime' => $request -> pubtime,
			'intro' => $request -> intro,
			'menu' => $request -> menu,
			'download' => $request -> download,
		];

		try {
			if ($request -> has('id')) {
				DB::table('book')
					-> where('id', $request -> id)
					-> update($data);
			}else {
				DB::table('book') -> insert($data);
			}
			return json_encode(array('txt'=>"保存成功",'status'=>200));
		} catch (Exception $e) {
			return json_encode(array('txt'=>"保存失败",'status'=>500));
		}
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