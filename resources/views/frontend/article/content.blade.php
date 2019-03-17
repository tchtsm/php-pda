@extends('frontend.layout')

@section('title')
 | $data -> title
@endsection

@section('content')
	<div class="col-md-9 showboard">
		<h3>{{ $data -> title }}</h3>
		<h6 class="text-danger">分类：{{ $data -> tag }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;来自：{{ $data -> user }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;发布时间：{{ $data -> created_at }}</h6>
		<hr>
		{{ htmlspecialchars_decode($data -> content) }}
	</div>
	@include('frontend.aside')
@endsection