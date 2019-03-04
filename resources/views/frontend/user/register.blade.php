@extends('frontend.user.layout')

@section('title')
程序设计协会 | 注册
@endsection

@section('content')
<h1>欢迎登录</h1>
<form class="login" action="" method="post">
	<div class="form-group">
		<label>学号</label><br>
		<input type="text" name="accout" placeholder="学号">
	</div>
	<div class="form-group">
		<label>密码</label><br>
		<input type="text" name="accout" placeholder="密码">
	</div>
	<div class="form-group">
		<button>登 录</button>
	</div>
	<div class="form-group">
		<a href="">忘记密码？</a>
	</div>
</form>
@endsection