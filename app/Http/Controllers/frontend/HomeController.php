<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
	public function index()
	{
		$notices = DB::table('notice')
			->select('id','title')
			->orderBy('created_at','desc')
			->limit(5)
			->get();
		$articles = DB::table('article')
			->select('id','title')
			->limit(5)
			->get();
		return view('frontend.home.index',['notices'=>$notices,'articles'=>$articles]);
	}
}
