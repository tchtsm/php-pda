<!DOCTYPE html>
<html>
<head>
	<title>程序设计协会@yield('title')</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="/static/default/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/static/default/css/public.css">
	<link rel="icon" type="image/x-icon" href="/static/default/images/icon.png">
	<script type="text/javascript" src="/static/default/js/jquery.min.js"></script>
	<script type="text/javascript" src="/static/default/js/bootstrap.min.js"></script>
</head>
<body>
<div class="bg-top"></div>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
	<div class="container">
		<a class="navbar-brand" href="/" style="padding:0">
		    <img src="/static/default/images/Logo.png" alt="Logo" style="height:40px;">
		</a>
		<ul class="navbar-nav">
		    <li class="nav-item">
				<a class="nav-link" href="{{ route('f_article_list') }}">文章文档</a>
		    </li>
		    <li class="nav-item">
				<a class="nav-link" href="{{ route('f_book_list') }}">看书推荐</a>
		    </li>
		    <li class="nav-item">
				<a class="nav-link" href="{{ route('f_software_list') }}">编辑软件</a>
		    </li>
		    <li class="nav-item">
				<a class="nav-link" href="{{ route('f_other_introduce') }}">协会介绍</a>
		    </li>
		</ul>
		<ul class="navbar-nav ml-auto" style="margin-right:30px;">
			@if(isset(Auth::user() -> name))
			    <li class="nav-item">
					<a class="nav-link" href="{{ route('f_person', ['url' => Auth::user() -> id]) }}">{{ Auth::user() -> name }}</a>
			    </li>
			    <li class="nav-item">
					<a class="nav-link" href="{{ route('f_logout') }}">退出登录</a>
			    </li>
			@else
				<li class="nav-item">
					<a class="nav-link" href="{{ route('f_login') }}">登录</a>
			    </li>
			    <li class="nav-item">
					<a class="nav-link" href="{{ route('f_register') }}">注册</a>
			    </li>
			@endif
		</ul>
	</div>
</nav>
<div class="container">
	<div class="row" style="margin-top:20px">
		@yield('content')
	</div>
</div>
<footer class="bg-dark">
	<div style="color:white;padding:12px 0;text-align:center">
		© 2015-2018 Powered By Laravel 5.6
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="{{ route('f_other_about') }}" style="color:white">关于我们</a>
		&nbsp;&nbsp;
		<a href="{{ route('f_other_disclaimer') }}" style="color:white">免责声明</a>
	</div>
</footer>
</body>
</html>