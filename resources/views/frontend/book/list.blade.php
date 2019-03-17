@extends('frontend.layout')

@section('title')
 | 看书推荐
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
		                        <a class="btn btn-info" href="" onclick="this.href='/book/search/'+form.key.value">搜索</a>
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
						<img src="{{ $list->cover }}" class="cover book" onerror="this.src='/static/default/images/img-error.jpg'">
					</div>
					<div class="col-md-10">
						<h5><a href="{{ Route('f_book_content',['id'=>$list->id]) }}">{{ $list->name }}</a></h5>
						<p><span class="text-danger">作者：{{ $list->author }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;出版时间：{{ $list->pubtime }}</span><br>
						简介：{{ mb_substr($list->introduce,0,117).'...' }}</p>
						下载：{{ is_null($list->download) ? $list->download : '暂无！' }}
					</div>
				</div>
			</li>
			@endforeach
		</ul>
		{{ $lists->links('frontend.page') }}
	</div>
	@include('frontend.aside')
@endsection