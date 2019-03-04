<?php

namespace App\Http\Controllers\backend;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

/**
 * 用戶管理
 */
class UserController extends Controller
{

	protected $redirectTo = 'admin';

	protected function guard()
	{
	    return Auth::guard('guard-name');
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
	            'name' => 'required',
	            'password' => 'required'
	        ];

	        // 自定义消息
	        $messages = [
	            'name.required' => '请输入密码用户名',
	            'password' => '请输入密码'
	        ];

	        $this->validate($request, $rules, $messages);

	        $name = $request->input('name');
	        $password = $request->input('password');

	        if (!\Auth::attempt(['name' => $name, 'password' => $password])) {
	            return ['msg' => '登陆失败'];
	        }
	        return redirect()->route('admin');
		}
    }

    public function register(Request $request)
	{
		if ($request->isMethod('get')) {
	        return view('backend.user.register');
		} else {
			// 规则
	        $rules = [
	            'name' => 'required',
	            'password' => 'required',
	            'con-password' => 'required'
	        ];

	        // 自定义消息
	        $messages = [
	            'name.required' => '请输入密码用户名',
	            'password' => '请输入密码'
	        ];

	        $this->validate($request, $rules, $messages);

	        $name = $request->input('name');
	        $password = $request->input('password');

	        if (!\Auth::attempt(['name' => $name, 'password' => $password])) {
	            return ['msg' => '登陆失败'];
	        }
	        return redirect()->route('admin');
		}
    }

	public function logout()
	{
		Auth::logout();
		return redicte();
	}
}