<!DOCTYPE html>
<html>
<head>
	<title>程序设计协会@yield('title')</title>
	<meta charset="utf-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" type="text/css" href="/static/admin/layui/css/layui.css">
	@yield('css')
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
				@foreach($menus as $menu)
					@if(!empty($menu['child']))
						<li class="layui-nav-item">
				        	<a href="{{ $menu['url'] }}">{{ $menu['name'] }}</a>
							@foreach($menu['child'] as $child)
					        	<dl class="layui-nav-child">
						            <dd><a href="{{ $child['url'] }}">{{ $child['name'] }}</a></dd>
					        	</dl>
				        	@endforeach
				        </li>
					@else
						<li class="layui-nav-item"><a href="{{ $menu['url'] }}">{{ $menu['name'] }}</a></li>
					@endif
				@endforeach
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
@yield('form')
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
@yield('javascript')
</body>
</html>