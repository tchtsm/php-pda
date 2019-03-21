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

		$access_all = DB::table('access')
			->select('id','name')
			->where('menulv_id','=',1)
			->orderBy('id')
			->get();

		$access_one = DB::table('access as a')
			->select('a.id')
			->leftJoin('role_access as b','b.access_id','=','a.id')
			->leftJoin('role as c','c.id','=','b.role_id')
			->where('c.id','=',$request -> id)
			->get();
		
		foreach ($access_all as $val) {
			$josn_arr[''.$val->id] = array('title'=>$val -> name,'value'=>$val->id);
		}
		foreach ($access_one as $val) {
			$josn_arr[''.$val->id]['checked'] = 'true';
		}

		return json_encode(array_values($josn_arr));
	}

	public function edit(Request $request)
	{
		try {
			DB::table('role_access')
				-> where('role_id', $request -> id)
				-> delete();
			if ($request -> access != null) {
				$data = array();
				$access = $request -> access;
				for ($i=0; $i < count($access); $i++) { 
					array_push($data, array('role_id'=>$request -> id, 'access_id' => $access[$i]));
				}
				// return $data;
				DB::table('role_access') -> insert($data);
			}
			return json_encode(array('txt'=>"保存成功",'status'=>200));
		} catch (Exception $e) {
			return json_encode(array('txt'=>"保存失败",'status'=>500));
		}
	}

}