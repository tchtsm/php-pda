<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\frontend\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

/**
 * 文章管理
 */
class SoftwareController extends Controller
{

	public function list()
	{
		$lists = DB::table('software')
			->select('id','name','cover','introduce')
			->orderBy('id','asc')
			->paginate(10);
		return view('frontend.software.list',['lists'=>$lists]);
	}

}