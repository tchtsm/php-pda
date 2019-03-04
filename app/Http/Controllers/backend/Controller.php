<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller as BaseController;

class Controller extends BaseController
{

	public function __construct(){
	    $this->middleware('auth');
	}
	
	public function index()
	{
		return view('backend.index');
	}
}
