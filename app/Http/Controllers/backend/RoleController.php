<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\backend\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

/**
 * 角色管理
 */
class RoleController extends Controller
{

	public function list()
	{
		$lists = DB::table('role')
			->select('id','name')
			->orderBy('id','asc')
			->paginate(10);
		return view('backend.role.list',['lists'=>$lists]);
	}

	public function json(Request $request)
	{
		$josn_arr = array();

		$res = DB::table('access as a')
			->select('a.id','a.name')
			->leftJoin('role_access as b','b.access_id','=','a.id')
			->leftJoin('role as c','c.id','=','b.role_id')
			->where('c.id','=',$request -> id)
			->get();
		
		foreach ($res as $key => $val) {
			$josn_arr[$key] = array('title':$val -> name,'')
		}
		return json_encode($res);
	}

	public function edit(Request $request)
	{
		// try {
		// 		DB::table('notice')
		// 			-> where('id', $request -> id)
		// 			-> update($data);
		// 	}else {
		// 		DB::table('notice') -> insert($data);
		// 	}
		// 	return json_encode(array('txt'=>"保存成功",'status'=>200));
		// } catch (Exception $e) {
		// 	return json_encode(array('txt'=>"保存失败",'status'=>500));
		// }
	}

}