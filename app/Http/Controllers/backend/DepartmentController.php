<?php

namespace App\Http\Controllers\backend;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

/**
 * 部门管理
 */
class DepartmentController extends Controller
{
	public function list()
	{
		$lists = DB::table('department')
			->select('id','name')
			->orderBy('id')
			->get();
		return view('backend.department.list',['lists'=>$lists]);
	}

	public function form(Request $request)
	{
		if ($request -> has('id')) {
			$data = DB::table('department')
				-> select('id','name')
				-> where('id', $request -> id)
				-> first();
			if (is_null($data)) {
				return '无该部门';
			}else{
				return view('backend.department.form', ['data' => $data]);
			}
		}else{
			return view('backend.department.form');
		}
	}

	public function store(Request $request)
	{
		$data = [
			'name' => $request -> name
		];

		try {
			if ($request -> has('id')) {
				DB::table('department')
					-> where('id', $request -> id)
					-> update($data);
			}else {
				DB::table('department') -> insert($data);
			}
			return json_encode(array('status'=>200, 'txt'=>'保存成功'));
		} catch (Exception $e) {
			return json_encode(array('status'=>500, 'txt'=>'保存失败，请联系管理员'));
		}
	}
}