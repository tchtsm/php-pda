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
				'account' => 'required|regex:/\d{12}/',
				'name' => 'required|min:2|max:10',
				'password' => 'required|min:6|max:16|confirmed',
				'password_confirmation' => 'required|same:password',
				'college' => 'required|string',
				'major' => 'required|string',
				'phone' => 'required|regex:/^1\d{10}/',
				'qq' => 'required|regex:/\d{8,12}/',
				'email' => 'required|email|unique:user',
			];

			$messages = [
				'account.required' => '请填写学号',
				'account.regex' => '学号必须是12位纯数字',
				'name.required' => '请填写姓名',
				'name.min' => '姓名不能少于2位',
				'name.max' => '姓名多能多于10位',
				'password.required' => '请填写密码',
				'password.min' => '密码不能少于6位',
				'password.max' => '密码多能多于16位',
				'password.confirmed' => '请填写确认密码',
				'password_confirmation.required' => '请填写确认密码',
				'password_confirmation.same' => '两次密码不一致',
				'college.required' => '请填写学院',
				'college.string' => '学院不能有数字',
				'major.required' => '请填写专业',
				'major.string' => '专业不能有数字',
				'phone.required' => '请填写手机号',
				'phone.size' => '请填写正确的手机号',
				'qq.required' => '请填写qq',
				'qq.regex' => 'qq必须是8-12纯数字',
				'email.required' => '请填写邮箱',
				'email.email' => '邮箱地址不正确',
				'email.unique' => '邮箱已存在',
			];

			$request->session()->reflash();
			$this -> validate($request, $rules, $messages);

			$data = [
				'account' => $request -> account,
				'name' => $request -> name,
				'password' => bcrypt($request -> password),
				'college' => $request -> college,
				'major' => $request -> major,
				'phone' => $request -> phone,
				'qq' => $request -> qq,
				'email' => $request -> email,
				'department_id' => 5,
				'last_login_at' => '2019-01-11 00:00:00',
				'last_login_ip' => '[::1]',
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