<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\backend\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

/**
 * 软件管理
 */
class SoftwareController extends Controller
{

	public function list()
	{
		$lists = DB::table('software')
			->select('id','name')
			->orderBy('id','asc')
			->paginate(10);
		return view('backend.software.list',['lists'=>$lists]);
	}

	public function form(Request $request)
	{
		if ($request -> has('id')) {
			$data = DB::table('software')
				-> select('id','name','cover','introduce')
				-> where('id', $request -> id)
				-> first();
			if (is_null($data)) {
				return '不存在次软件';
			}else{
				return view('backend.software.form', ['data' => $data]);
			}
		}else{
			return view('backend.software.form');
		}
	}

	public function store(Request $request)
	{
		$data = [
			'name' => $request -> name,
			'cover' => $request -> file,
			'introduce' => $request -> introduce,
		];

		try {
			if ($request -> has('id')) {
				DB::table('software')
					-> where('id', $request -> id)
					-> update($data);
			}else {
				DB::table('software') -> insert($data);
			}
			return json_encode(array('txt'=>"保存成功",'status'=>200));
		} catch (Exception $e) {
			return json_encode(array('txt'=>"保存失败",'status'=>500));
		}
	}

	public function search($key)
	{
		$lists = DB::table('software')
			->select('id','name','author','cover','pubtime','introduce','download')
			->where('name','like',$key)
			->orderBy('id','ace')
			->paginate(1);
		return view('backend.software.list',['lists'=>$lists]);
	}
}