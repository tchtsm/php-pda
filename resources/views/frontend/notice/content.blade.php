@extends('frontend.layout')
@section('title')
 | 通知公告
@endsection
@section('content')
	<div class="col-md-12 showboard">
		<h5>{{ $data -> title }}</h5>
		<p>{{ $data -> content }}</p>
	</div>
@endsection