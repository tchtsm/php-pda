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

	public function register($key)
	{
		return view('frontend.user.register');
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