@extends('frontend.user.layout')

@section('title')
程序设计协会 | 注册
@endsection

@section('content')
<h1 style="bottom:80vh">欢迎加入</h1>
<form class="login" action="{{ route('f_register') }}" method="post" style="margin-top:20vh">
	@csrf
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label for="account">学号</label>
				<input type="text" class="form-control {{ $errors->has('account') ? 'is-invalid' : '' }}" name="account" id="account" placeholder="学号" value="{{ old('name') }}">
				@if ($errors->has('account'))
					<span class="help-block" role="alert">
						<p class="text-danger">{{ $errors->first('account') }}</p>
					</span>
				@endif
			</div>
			<div class="form-group">
				<label for="password">密码</label>
				<input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" name="password" id="password" placeholder="密码">
				@if ($errors->has('password'))
					<span class="help-block" role="alert">
						<p class="text-danger">{{ $errors->first('password') }}</p>
					</span>
				@endif
			</div>
			<div class="form-group">
				<label for="college">学院</label>
				<input type="text" class="form-control {{ $errors->has('college') ? 'is-invalid' : '' }}" name="college" id="college" placeholder="学院">
				@if ($errors->has('college'))
					<span class="help-block" role="alert">
						<p class="text-danger">{{ $errors->first('college') }}</p>
					</span>
				@endif
			</div>
			<div class="form-group">
				<label for="phone">手机</label>
				<input type="text" class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" name="phone" id="phone" placeholder="手机">
				@if ($errors->has('phone'))
					<span class="help-block" role="alert">
						<p class="text-danger">{{ $errors->first('phone') }}</p>
					</span>
				@endif
			</div>
			<div class="form-group">
				<label for="email">邮箱</label>
				<input type="text" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" id="email" placeholder="邮箱">
				@if ($errors->has('email'))
					<span class="help-block" role="alert">
						<p class="text-danger">{{ $errors->first('email') }}</p>
					</span>
				@endif
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label for="name">姓名</label>
				<input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" id="name" placeholder="姓名">
				@if ($errors->has('name'))
					<span class="help-block" role="alert">
						<p class="text-danger">{{ $errors->first('name') }}</p>
					</span>
				@endif
			</div>
			<div class="form-group">
				<label for="password_confirmation">确认密码</label>
				<input type="password" class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}" name="password_confirmation" id="password_confirmation" placeholder="确认密码">
				@if ($errors->has('password_confirmation'))
					<span class="help-block" role="alert">
						<p class="text-danger">{{ $errors->first('password_confirmation') }}</p>
					</span>
				@endif
			</div>
			<div class="form-group">
				<label for="major">专业</label>
				<input type="text" class="form-control {{ $errors->has('major') ? 'is-invalid' : '' }}" name="major" id="major" placeholder="专业">
				@if ($errors->has('major'))
					<span class="help-block" role="alert">
						<p class="text-danger">{{ $errors->first('major') }}</p>
					</span>
				@endif
			</div>
			<div class="form-group">
				<label for="qq">QQ</label>
				<input type="text" class="form-control {{ $errors->has('qq') ? 'is-invalid' : '' }}" name="qq" id="qq" placeholder="QQ">
				@if ($errors->has('qq'))
					<span class="help-block" role="alert">
						<p class="text-danger">{{ $errors->first('qq') }}</p>
					</span>
				@endif
			</div>
		</div>
	</div>
	<div class="row" style="margin-top:15px">
		<div class="col-md-6">
			<button type="submit" class="btn btn-primary">注册</button>
		</div>
		<div class="col-md-6">
			<a class="btn btn-danger" href="{{ route('f_login') }}">已有账号去登陆</a>
		</div>
	</div>
	@if(isset($msg))
		<p class="text-danger">{{ $msg }}</p>
	@endif
</form>
@endsection