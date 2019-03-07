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
					<input type="text" name="title" required  lay-verify="required" placeholder="用户名" autocomplete="off" class="layui-input {{ $errors->has('name') ? 'red' : ''}}">
				</div>
				@if($errors->has('name'))
				<div class="layui-form-mid layui-word-aux">{{ $errors-first('name') }}</div>
				@endif
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">密码</label>
				<div class="layui-input-inline">
					<input type="password" name="password" required lay-verify="required" placeholder="密码" autocomplete="off" class="layui-input">
				</div>
				<div class="layui-form-mid layui-word-aux">辅助文字</div>
			</div>
			<div class="layui-form-item">
				<div class="layui-input-block">
					<button class="layui-btn" lay-submit lay-filter="formDemo">登录</button>
				</div>
			</div>
		</form>
	</div>
</body>
</html>