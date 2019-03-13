<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{

	protected $redirectTo = '/admin/login';

	public function __construct(){
	    $this->middleware('auth:admin');
	}

	protected function guard()
	{
	    return Auth::guard('admin');
	}
	
	public function index()
	{
		return view('backend.index');
	}
}
