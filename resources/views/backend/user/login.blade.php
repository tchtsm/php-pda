<!DOCTYPE html>
<html>
<head>
	<title>程序设计协会</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="/static/admin/layui/css/layui.css">
	<link rel="stylesheet" type="text/css" href="/static/admin/css/login.css">
</head>
<body>
	<div class="form">
		<h1>程序设计协会后台管理</h1>
		<form class="layui-form" action="{{ route('b_login') }}" method="post">
			{{ csrf_field() }}
			<div class="layui-form-item">
				<label class="layui-form-label">用户</label>
				<div class="layui-input-inline">
					<input type="text" name="name" placeholder="用户名" autocomplete="off" class="layui-input {{ $errors->has('name') ? 'red' : ''}}">
				</div>
				@if($errors->has('name'))
					<div class="layui-form-mid text-red">{{ $errors->first('name') }}</div>
				@endif
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">密码</label>
				<div class="layui-input-inline">
					<input type="password" name="password" placeholder="密码" autocomplete="off" class="layui-input {{ $errors->has('password') ? 'red' : ''}}">
				</div>
				@if($errors->has('password'))
					<div class="layui-form-mid text-red">{{ $errors->first('password') }}</div>
				@endif
			</div>
			<div class="layui-form-item">
				<div class="layui-input-block">
					<button class="layui-btn">登录</button>
					@if(isset($msg))
						<span class="text-red">{{ $msg }}</span>
					@endif
				</div>
			</div>
		</form>
	</div>
</body>
</html>