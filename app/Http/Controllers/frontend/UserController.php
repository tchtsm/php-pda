<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\frontend\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

/**
 * 文章管理
 */
class UserController extends Controller
{

	public function login()
	{
		return view('frontend.user.login');
	}

	public function logout($id)
	{
		$content = DB::table('article')
			->select('title','tag','user','createtime')
			->where('id',$id)
			->first();
		return view('frontend.article.content',['content'=>$content]);
	}

	public function register(Request $request)
	{
		if ($request -> isMethod('get')) {
			return view('frontend.user.register');
		} else {
			$rules = [
				'name' => 'required|min:2|max10|unique',
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