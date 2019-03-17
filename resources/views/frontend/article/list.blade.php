@extends('frontend.layout')

@section('title')
 | 文章文档
@endsection

@section('content')
	<div class="col-md-9">
		<div class="alert alert-dark">
		    <form class="ml-auto bs-example bs-example-form" name="form">
		        <div class="row">
		            <div class="col-lg-6">
		                <div class="input-group">
		                    <input type="text" class="form-control" name="key" placeholder="请输入要搜索的内容">
		                    <span class="input-group-btn">
		                        <a class="btn btn-info" href="" onclick="this.href='/article/search/'+form.key.value">搜索</a>
		                    </span>
		                </div><!-- /input-group -->
		            </div><!-- /.col-lg-6 -->
		        </div><!-- /.row -->
		    </form>
		</div>
		<ul class="list-group">
			@foreach($lists as $list)
			<li class="list-group-item">
				<div class="row">
					<div class="col-md-4">
						<img src="{{ $list->cover }}" class="cover article" onerror="this.src='/static/default/images/img-error.jpg'">
					</div>
					<div class="col-md-8">
						<h5><a href="/article/{{ $list->id }}">{{ $list->title }}</a></h5>
						<p><span class="text-danger">来自：{{ $list->user }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;时间：{{ mb_substr($list->created_at,0,10) }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;分类：{{ $list->tag }}</span><br>
						简介：{{ mb_substr($list->content,0,106).'...' }}</p>
					</div>
				</div>
			</li>
			@endforeach
		</ul>
		{{ $lists->links('frontend.page') }}
	</div>
	@include('frontend.aside')
@endsection