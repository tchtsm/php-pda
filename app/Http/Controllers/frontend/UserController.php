<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use URL;

/**
 * 文章管理
 */
class UserController extends Controller
{

	public function login(Request $request)
	{
		if ($request -> isMethod('get')) {
			return view('frontend.user.login');
		} else {
			$rules = [
				'name' => 'required|min:2|max:10|exists:user',
				'password' => 'required|min:6|max:16',
			];

			$messages = [
				'name.required' => '请填写用户名',
				'name.min' => '用户名不能少于2位',
				'name.max' => '用户名多能多于10位',
				'name.exists' => '用户名不已存在',
				'password.required' => '请填写密码',
				'password.min' => '密码不能少于6位',
				'password.max' => '密码多能多于16位',
			];

			$validate = $this -> validate($request, $rules, $messages);
 			
			$name = $request -> name;
			$password = $request -> password;
			$remember = $request -> remember;

			if (Auth::attempt(['name' => $name, 'password' => $password], $remember)) {
				return redirect('/');
	        } else {
	        	return view('frontend.user.login', ['msg'=>'用户名或密码错误']);
	        }
		}
	}

	public function register(Request $request)
	{
		if ($request -> isMethod('get')) {
			return view('frontend.user.register');
		} else {
			$rules = [
				'name' => 'required|min:2|max:10|unique:user',
				'password' => 'required|min:6|max:16',
			];

			$messages = [
				'name.required' => '请填写用户名',
				'name.min' => '用户名不能少于2位',
				'name.max' => '用户名多能多于10位',
				'name.unique' => '用户名已存在',
				'password.required' => '请填写密码',
				'password.min' => '密码不能少于6位',
				'password.max' => '密码多能多于16位',
			];

			$this -> validate($request, $rules, $messages);

			$data = [
				'name' => $request -> name,
				'password' => bcrypt($request -> password),
				'email' => '2388467590@qq.com'
			];

			try {
				DB::table('user') -> insert($data);
				return redirect() -> route('f_login');
			} catch (Exception $e) {
				return '注册失败，请联系管理员';
			}
		}
	}

	public function logout()
	{
		Auth::logout();
		return redirect(URL::previous());
	}

	public function person(Request $request)
	{
		if ($request -> has('id')) {
			return view('frontend.user.person');
		}else{
			return redirect('/');
		}
	}

	public function changePassword($id)
	{
		return view('frontend.user.change-password');
	}

	public function resetPassword($id)
	{
		return view('frontend.user.reset-password');
	}
}