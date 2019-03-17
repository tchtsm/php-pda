<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Support\Facades\DB;

/**
 * 通知
 */
class NoticeController extends Controller
{

	public function content($id)
	{
		$data = DB::table('notice')
			->select('title','content','created_at')
			->where('id','=',$id)
			->first();
		return view('frontend.notice.content',['data'=>$data]);
	}

}