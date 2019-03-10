<?php

namespace App\Http\Controllers\backend;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

/**
 * 通知公告
 */
class NoticeController extends Controller
{

	public function list()
	{
		$lists = DB::table('notice')
			->select('id','title','content','created_at')
			->orderBy('created_at','desc')
			->paginate(10);
		return view('backend.notice.list',['lists'=>$lists]);
	}

	public function form(Request $request)
	{
		if ($request -> has('id')) {
			$data = DB::table('notice')
				-> select('id','title','content')
				-> where('id', $request -> id)
				-> first();
			if (is_null($data)) {
				return '不存在的通知';
			}else{
				return view('backend.notice.form', ['data' => $data]);
			}
		}else{
			return view('backend.notice.form');
		}
	}

	public function store(Request $request)
	{

		$data = [
			'title' => $request -> title,
			'content' => $request -> content,
			'user_id' => 1,
			'department_id' => 1,
		];

		try {
			if ($request -> has('id')) {
				DB::table('notice')
					-> where('id', $request -> id)
					-> update($data);
			}else {
				DB::table('notice') -> insert($data);
			}
			return json_encode(array('txt'=>"保存成功",'status'=>200));
		} catch (Exception $e) {
			return json_encode(array('txt'=>"保存失败",'status'=>500));
		}
	}

	public function delete($id)
	{
		$lists = DB::table('notice')
			->select('title','tag','user','createtime')
			->orderBy('createtime','desc')
			->paginate(1);
		return view('backend.article.list',['lists'=>$lists]);
	}

	public function search($title)
	{
		$lists = DB::table('article')
			->select('title','tag','user','created_at')
			->orderBy('created_at','desc')
			->paginate(10);
		return view('backend.article.list',['lists'=>$lists]);
	}
}