<?php

namespace App\Http\Controllers\backend;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

/**
 * 用户管理
 */
class UserController extends Controller
{
	public function member(){

		$departments  = DB::table('department')
			->select('id','name')
			->orderBy('id')
			->get();

		$roles = DB::table('role')
			->select('id','name')
			->orderBy('id')
			->get();

		$lists = DB::table('user as a')
			->select('a.id','a.name','b.name as department','d.name as role','a.account','a.qq','a.phone','a.email','a.college','a.major')
			->leftJoin('department as b','a.department_id','=','b.id')
			->leftJoin('user_role as c','a.id','=','c.user_id')
			->leftJoin('role as d','d.id','=','c.role_id')
			->where('a.id','>','1')
			->orderBy('a.id')
			->paginate(10);
		return view('backend.user.member',['lists'=>$lists,'departments'=>$departments,'roles'=>$roles]);
	}

	public function department_edit(Request $request)
	{
		try {
			DB::table('user')
				->where('id',$request -> id)
				->update(['department_id'=>$request -> department_id]);
			return json_encode(array('status'=>200, 'txt'=>'保存成功'));
		} catch (Exception $e) {
			return json_encode(array('status'=>500, 'txt'=>'保存失败，请联系管理员'));
		}
	}

	public function role_edit(Request $request)
	{
		try {
			DB::table('user_role') -> where('user_id',$request -> id) -> delete();
			DB::table('user_role') -> insert(['user_id'=>$request -> id,'role_id'=>$request -> role_id]);
			return json_encode(array('status'=>200, 'txt'=>'保存成功'));
		} catch (Exception $e) {
			return json_encode(array('status'=>500, 'txt'=>'保存失败，请联系管理员'));
		}
	}

	public function manager(){
		$lists = DB::table('user as a')
			->select('a.id','a.name','b.name as department','a.last_login_at','a.last_login_ip')
			->leftJoin('department as b','a.department_id','=','b.id')
			->orderBy('a.id')
			->paginate(10);
		return view('backend.user.manager',['lists'=>$lists]);
	}
}