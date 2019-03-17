@extends('frontend.layout')
@section('content')
	<div class="col-md-9">
		<div class=" row">
			<div class="col-md-8 carousel">
				<div id="demo" class="carousel slide" data-ride="carousel">
					<!-- 指示符 -->
					<ul class="carousel-indicators">
						@foreach($articles as $k => $article)
							@if($k == 0)
								<li data-target="#demo" data-slide-to="{{ $k }}" class="active"></li>
							@else
								<li data-target="#demo" data-slide-to="{{ $k }}"></li>
							@endif
						@endforeach
					</ul>
					<!-- 轮播图片 -->
					<div class="carousel-inner">
						@foreach($articles as $k => $article)
							@if($k == 0)
								<div class="carousel-item active">
							@else
								<div class="carousel-item">
							@endif
									<img src="{{ $article->cover }}" class="rounded" alt="Cinque Terre" height="250px" width="100%">
									<div class="carousel-caption">
										<p>{{ $article->title }}</p>
									</div>
								</div>
						@endforeach
					</div>
					<!-- 左右切换按钮 -->
					<a class="carousel-control-prev" href="#demo" data-slide="prev">
						<span class="carousel-control-prev-icon"></span>
					</a>
					<a class="carousel-control-next" href="#demo" data-slide="next">
						<span class="carousel-control-next-icon"></span>
					</a>
				</div>
			</div>
			<div class="col-md-4 welcome">
				<div>
					<h5>欢迎来到程序设计协会</h5>
					<p>你是否曾被炫酷的电脑设计所吸引，认为自己在这块领域虽然无一专长却有一颗热忱的心，愿意为社团运作贡献出自己的力量吗? 加入我们，我们会帮你发现自己的闪光点，让你发现美并创造美，让你的大学生活如理想般充实，快乐。</p>
				</div>
			</div>
		</div>
		<div class="row" style="margin-top:20px">
			<div class="col-md-12 white-board">
				<div>
					<p>通知公告</p>
				</div>
				<ul>
					@foreach($notices as $notice)
						<li><a href="/notice/{{ $notice -> id }}">{{ $notice -> title }}<span>{{ $notice -> department }}&nbsp;&nbsp;&nbsp;&nbsp;{{ mb_substr($notice -> created_at,0,10) }}</span></a></li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>
	@include('frontend.aside')
@endsection