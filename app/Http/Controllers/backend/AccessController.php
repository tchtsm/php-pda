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
		$lists = DB::table('access as a')
			->select('a.id','a.name','a.url','b.name as menu')
			->leftJoin('menu as b','b.id','=','a.menu_id')
			->orderBy('a.id','asc')
			->paginate(10);
		return view('backend.access.list',['lists'=>$lists]);
	}

	public function form(Request $request)
	{

		$menus = DB::table('menu')
			->select('id','name')
			->get();
		$parents = DB::table('access')
			->select('id','name')
			->where('menu_id','=',1)
			->get();

		if ($request -> has('id')) {
			$data = DB::table('access')
				-> select('id','name','url','menu_id','parent_id')
				-> where('id', $request -> id)
				-> first();
			if (is_null($data)) {
				return '不存在';
			}else{
				return view('backend.access.form', ['data'=>$data,'menus'=>$menus,'parents'=>$parents]);
			}
		}else{
			return view('backend.access.form',['menus'=>$menus,'parents'=>$parents]);
		}
	}

	public function store(Request $request)
	{
		$data = [
			'name' => $request -> name,
			'url' => $request -> url,
			'menu_id' => $request -> menu_id,
			'parent_id' =>$request -> parent_id
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