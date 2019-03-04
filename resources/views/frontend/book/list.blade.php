@extends('frontend.layout')

@section('title')
 | 看书推荐
@endsection

@section('content')
	<div class="col-md-9">
		<div class="alert alert-dark">
		    <form class="ml-auto bs-example bs-example-form" role="form" action="{{ Route('f_book_search') }}" method="get">
		        <div class="row">
		            <div class="col-lg-6">
		                <div class="input-group">
		                    <input type="text" class="form-control" name="key" placeholder="请输入要搜索的内容">
		                    <span class="input-group-btn">
		                        <input class="btn btn-info" type="submit" value="搜索">
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
					<div class="col-md-2">
						<img src="{{ $list->cover }}" class="cover" onerror="this.src='/static/default/images/img-error.jpg'">
					</div>
					<div class="col-md-9">
						<h4><a href="{{ Route('f_book_cont',['id'=>$list->id]) }}">{{ $list->name }}</a></h4>
						<p>作者：{{ $list->author }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;出版时间：{{ $list->pubtime }}<br>
						简介：{{ $list->introduce }}</p>
						下载：{{ is_null($list->download) ? $list->download : '暂无！' }}
					</div>
				</div>
			</li>
			@endforeach
		</ul>
	</div>
	@include('frontend.aside')
@endsection