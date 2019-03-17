<!DOCTYPE html>
<html>
<head>
	<title>程序设计协会@yield('title')</title>
	<meta charset="utf-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" type="text/css" href="/static/admin/layui/css/layui.css">
	<link rel="icon" type="image/x-icon" href="/static/default/images/icon.png">
	<script type="text/javascript" src="/static/admin/layui/layui.js"></script>
</head>
<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">
	<div class="layui-header">
	    <div class="layui-logo">程序设计协会</div>
	    <!-- 头部区域（可配合layui已有的水平导航） -->
	    <ul class="layui-nav layui-layout-left">
	     	<li class="layui-nav-item"><a href="/" target="blank">网站首页</a></li>
	     	<li class="layui-nav-item"><a href="javascript:location.reload(true);">刷新</a></li>
	    </ul>
	    <ul class="layui-nav layui-layout-right">
	     	<li class="layui-nav-item">
	        	<a href="javascript:;">{{ Auth::user() -> name }}</a>
	    	</li>
	    	<li class="layui-nav-item"><a href="{{ route('b_logout') }}">退出</a></li>
	    </ul>
	</div>
	<div class="layui-side layui-bg-black">
	    <div class="layui-side-scroll">
			<!-- 左侧导航区域（可配合layui已有的垂直导航） -->
			<ul class="layui-nav layui-nav-tree"  lay-filter="test">
				<li class="layui-nav-item"><a href="{{ route('b_notice_list') }}">通知公告</a></li>
				<li class="layui-nav-item"><a href="{{ route('b_article_list') }}">文章管理</a></li>
				<li class="layui-nav-item"><a href="{{ route('b_book_list') }}">书籍管理</a></li>
				<li class="layui-nav-item"><a href="{{ route('b_software_list') }}">软件管理</a></li>
				<li class="layui-nav-item"><a href="{{ route('b_user_member') }}">会员管理</a></li>
				<li class="layui-nav-item"><a href="javascript:;">日志管理</a></li>
				<li class="layui-nav-item">
		        	<a class="" href="javascript:;">基本管理</a>
		        	<dl class="layui-nav-child">
			            <dd><a href="{{ Route('b_tag_list') }}">标签管理</a></dd>
		        	</dl>
		        </li>
		        <li class="layui-nav-item">
		        	<a class="" href="javascript:;">系统管理</a>
		        	<dl class="layui-nav-child">
			            <dd><a href="{{ route('b_user_manager') }}">用户管理</a></dd>
			            <dd><a href="javascript:;">部门管理</a></dd>
			            <dd><a href="{{ route('b_role_list') }}">角色管理</a></dd>
			            <dd><a href="{{ route('b_access_list') }}">权限管理</a></dd>
		        	</dl>
		        </li>
	    	</ul>
	    </div>
	</div>
	<div class="layui-body" style="padding:15px">
	    <!-- 内容主体区域 -->
	    @yield('content')
	</div>
	<div class="layui-footer">
	    <!-- 底部固定区域 -->
	    程序设计协会
	</div>
</div>
<script>
layui.use(['element','jquery'], function(){
	var element = layui.element;
	var $ = layui.jquery;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});
</script>
</body>
</html>