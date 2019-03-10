<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

/**
 * 文章管理
 */
class BookController extends Controller
{

	public function content($id)
	{
		$data = DB::table('notice')
			->select('title','content')
			->where('id',$id)
			->first();
		return view('frontend.book.content',['data'=>$data]);
	}

}