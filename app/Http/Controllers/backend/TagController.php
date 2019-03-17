<?php

namespace App\Http\Controllers\backend;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

/**
 * 标签管理
 */
class TagController extends Controller
{

	public function list()
	{
		$lists = DB::table('tag')
			->select('id','name')
			->whereNull('deleted_at')
			->orderBy('id','asc')
			->paginate(10);
		return view('backend.tag.list',['lists'=>$lists]);
	}

	public function form(Request $request)
	{
		if ($request -> has('id')) {
			$data = DB::table('tag')
				-> select('id','name')
				-> where('id', $request -> id)
				-> first();
			if (is_null($data)) {
				return '无该标签';
			}else{
				return view('backend.tag.form', ['data' => $data]);
			}
		}else{
			return view('backend.tag.form');
		}
	}

	public function store(Request $request)
	{

		$data = [
			'name' => $request -> name
		];

		try {
			if ($request -> has('id')) {
				DB::table('tag')
					-> where('id', $request -> id)
					-> update($data);
			}else {
				DB::table('tag') -> insert($data);
			}
			return json_encode(array('status'=>200, 'txt'=>'保存成功'));
		} catch (Exception $e) {
			return json_encode(array('status'=>500, 'txt'=>'保存失败，请联系管理员'));
		}
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