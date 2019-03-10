@extends('frontend.layout')

@section('title')
 | $data -> title
@endsection

@section('content')
	<div class="col-md-9">
		<h2>{{ $data -> title }}</h2>
		<p>{{ $data -> tag }}  {{ $data -> user }}</p>
		<hr>
		<img src="{{ $data -> cover }}">
		{{ $data -> content }}
	</div>
	@include('frontend.aside')
@endsection