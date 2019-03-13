<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

/**
 * 用戶管理
 */
class UserController extends Controller
{

	protected function guard()
	{
	    return Auth::guard('admin');
	}

	public function list() 
	{
		$lists = DB::table('user')
			->select('name','','')
			->get();
	}

	public function login(Request $request)
	{
		if ($request->isMethod('get')) {
	        return view('backend.user.login');
		} else {
			// 规则
	        $rules = [
	            'name' => 'required|exists:user|between:2,10',
	            'password' => 'required|between:6,16'
	        ];

	        // 自定义消息
	        $messages = [
	            'name.required' => '请输入用户名',
	            'name.exists' => '不存在此用户',
	            'name.between' => '请输入2-10位用户名',
	            'password.required' => '请输入密码',
	            'password.between' => '请输入6-16位密码'
	        ];

	        $this->validate($request, $rules, $messages);

	        $name = $request -> name;
	        $password = $request -> password;

	        if (Auth::attempt(['name' => $name, 'password' => $password])) {
		        return redirect() -> route('admin');
	        } else {
	            return view('backend.user.login', ['msg' => '密码错误']);
	        }
		}
    }

	public function logout()
	{
		Auth::logout();
		return view('backend.user.login', ['msg' => '退出成功']);
	}
}