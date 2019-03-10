@extends('frontend.user.layout')

@section('title')
程序设计协会 | 登录
@endsection

@section('content')
<h1>欢迎登录</h1>
<form class="login" action="{{ route('f_login') }}" method="post">
	@csrf
	<div class="form-group">
		<label for="name">用户名</label>
		<input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" id="name" placeholder="用户名">
		@if ($errors->has('name'))
			<span class="help-block" role="alert">
				<p class="text-danger">{{ $errors->first('name') }}</p>
			</span>
		@endif
	</div>
	<div class="form-group">
		<label for="pwd">密码</label>
		<input type="password" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="password" id="pwd" placeholder="密码">
		@if ($errors->has('password'))
			<span class="help-block" role="alert">
				<p class="text-danger">{{ $errors->first('password') }}</p>
			</span>
		@endif
	</div>
	<div class="form-check">
		<label class="form-check-label">
			<input class="form-check-input" type="checkbox" name="re"> 记住我
		</label>
	</div>
	<div class="form-group row" style="margin-top:15px">
		<div class="col-md-6">
			<button type="submit" class="btn btn-primary">登录</button>
		</div>
		<div class="col-md-6">
			<a class="btn btn-danger" href="{{ route('f_reset_pass') }}">忘记密码？</a>
		</div>
	</div>
	@if(isset($msg))
		<p class="text-danger">{{ $msg }}</p>
	@endif
</form>
@endsection