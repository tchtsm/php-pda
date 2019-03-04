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
			->paginate(1);
		return view('backend.tag.list',['lists'=>$lists]);
	}

	public function form(Request $request)
	{
		if ($request -> has('id')) {
			$content = DB::table('tag')
				-> select('id','name')
				-> where('id', $request -> id)
				-> first();
			if (is_null($content)) {
				return '无该模块';
			}else{
				return view('backend.tag.form', ['content' => $content]);
			}
		}else{
			return view('backend.tag.form');
		}
	}

	public function store(Request $request)
	{

		$rules = [
			'name' => 'required|max:20|min2|unique'
		];

		$messages = [
			'name.required' => '请输入名称',
			'name.max' => '名称不能多于：max',
			'name.min' => '名称不能少于：min',
			'name.unique' => '名称已经存在'
		];

		$this->validate($request, $rules, $messages);

		$data = [
			'name' => $request -> name
		];

		try {
			if ($request -> has('id')) {
				DB::table('tag')
					-> where('id', $request -> id)
					-> update($data);
			}else {
				DB::table('tag') -> insert('$data');
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