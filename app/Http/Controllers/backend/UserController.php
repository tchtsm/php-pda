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
		$lists = DB::table('user as a')
			->select('a.id','a.name','b.name as department','d.name as role','a.account','a.qq','a.phone','a.email','a.college','a.major')
			->leftJoin('department as b','a.department_id','=','b.id')
			->leftJoin('user_role as c','a.id','=','c.user_id')
			->leftJoin('role as d','d.id','=','c.role_id')
			->where('a.id','>','1')
			->orderBy('a.id')
			->get();
		return view('backend.user.member',['lists'=>$lists]);
	}

	public function manager(){
		$lists = DB::table('user as a')
			->select('a.id','a.name','b.name as department','a.last_login_at','a.last_login_ip')
			->leftJoin('department as b','a.department_id','=','b.id')
			->orderBy('a.id')
			->get();
		return view('backend.user.manager',['lists'=>$lists]);
	}
}