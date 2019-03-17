<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
	public function index()
	{
		$notices = DB::table('notice as a')
			->select('a.id','a.title','b.name as department','a.created_at')
			->leftJoin('department as b','b.id','=','a.department_id')
			->orderBy('a.created_at','desc')
			->limit(7)
			->get();
		$articles = DB::table('article')
			->select('id','title','cover')
			->limit(5)
			->get();
		return view('frontend.home.index',['notices'=>$notices,'articles'=>$articles]);
	}
}
