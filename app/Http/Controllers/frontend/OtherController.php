<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

/**
 * 简介，关于，免责
 */
class OtherController extends Controller
{

	public function introduce()
	{
		return view('frontend.other.introduce');
	}

	public function about()
	{
		return view('frontend.other.about');
	}

	public function disclaimer()
	{
		return view('frontend.other.disclaimer');
	}
}