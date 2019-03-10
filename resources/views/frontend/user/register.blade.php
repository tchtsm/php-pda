@extends('frontend.user.layout')

@section('title')
程序设计协会 | 注册
@endsection

@section('content')
<h1>欢迎加入</h1>
<form class="login" action="{{ route('f_register') }}" method="post">
	@csrf
	<div class="form-group">
		<label>姓名</label><br>
		<input type="text" name="name" placeholder="姓名">
	</div>
	<div class="form-group">
		<label>密码</label><br>
		<input type="password" name="password" placeholder="密码">
	</div>
	<div class="form-group">
		<button>登 录</button>
	</div>
	<div class="form-group">
		<a href="">忘记密码？</a>
	</div>
</form>
@endsection