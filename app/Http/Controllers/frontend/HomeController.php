<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\frontend\Controller;

class HomeController extends Controller
{
	public function index()
	{
		return view('frontend.home.index');
	}
}
