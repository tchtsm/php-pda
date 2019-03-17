<?php

namespace App\Http\Controllers\backend;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

/**
 * 权限管理
 */
class AccessController extends Controller
{

	public function list()
	{
		$lists = DB::table('access')
			->select('id','name','url','route')
			->orderBy('id','asc')
			->paginate(10);
		return view('backend.access.list',['lists'=>$lists]);
	}

	public function form(Request $request)
	{
		if ($request -> has('id')) {
			$data = DB::table('access')
				-> select('id','name','url','route')
				-> where('id', $request -> id)
				-> first();
			if (is_null($data)) {
				return '不存在';
			}else{
				return view('backend.access.form', ['data' => $data]);
			}
		}else{
			return view('backend.access.form');
		}
	}

	public function store(Request $request)
	{
		$data = [
			'name' => $request -> name,
			'url' => $request -> url,
			'route' => $request -> route,
		];

		try {
			if ($request -> has('id')) {
				DB::table('access')
					-> where('id', $request -> id)
					-> update($data);
			}else {
				DB::table('access') -> insert($data);
			}
			return json_encode(array('txt'=>"保存成功",'status'=>200));
		} catch (Exception $e) {
			return json_encode(array('txt'=>"保存失败",'status'=>500));
		}
	}
}