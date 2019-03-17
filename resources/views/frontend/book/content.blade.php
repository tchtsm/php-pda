@extends('frontend.layout')

@section('title')
 | 看书推荐
@endsection

@section('content')
	<div class="col-md-9 showboard">
		<div class="row">
			<div class="col-md-2">
				<img src="{{ $content->cover }}" class="cover" onerror="this.src='/static/default/images/img-error.jpg'" style="width:140px;height:180px">
			</div>
			<div class="col-md-9" style="padding-left:30px">
				<h4 class="text-danger">{{ $content->name }}</h4>
				<p style="line-height:2;color:green">作者：{{ $content->author }}<br>
				出版社：{{ $content->publish }}<br>
				出版时间：{{ $content->pubtime }}<br>
				下载：{{ is_null($content->download) ? $content->download : '暂无！' }}</p>
			</div>
		</div>
		<div style="margin-top:20px">
			<h4>内容介绍</h4><hr style="margin:0 0 10px 0">
			{{ $content->introduce }}
		</div>
		<div style="margin-top:20px">
			<h4>书籍目录</h4><hr style="margin:0 0 10px 0">
			{{ $content->menu }}
		</div>
	</div>
	@include('frontend.aside')
@endsection