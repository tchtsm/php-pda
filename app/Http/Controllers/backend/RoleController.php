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

}