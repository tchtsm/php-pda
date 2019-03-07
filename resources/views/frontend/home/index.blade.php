@extends('frontend.layout')
@section('content')
	<div class="col-md-9">
		<div class="col-md-8" style="display: inline-block;">
		<div class="carousel slide" data-ride="carousel">
			<!-- 指示符 -->
			<ul class="carousel-indicators">
				<li data-target="#demo" data-slide-to="0" class="active"></li>
				<li data-target="#demo" data-slide-to="1"></li>
			</ul>

			<!-- 轮播图片 -->
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img src="http://static.runoob.com/images/mix/img_fjords_wide.jpg" style="border-radius: 5px;height: 250px">
					<div class="carousel-caption">
						<h3>第一张图片描述标题</h3>
						<p>描述文字!</p>
					</div>
				</div>
				<div class="carousel-item">
					<img src="http://static.runoob.com/images/mix/img_nature_wide.jpg" style="border-radius: 5px;height: 250px">
					<div class="carousel-caption">
						<h3>第二张图片描述标题</h3>
						<p>描述文字!</p>
					</div>
				</div>
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
		<div class="col-md-4" style="float: right;background: red">
			<div>
				<h4>欢迎来到程序设计协会 点开属于你的代码空间</h4>
				<p>你是否曾被炫酷的电脑设计所吸引，认为自己在这块领域虽然无一专长却有一颗热忱的心，愿意为社团运作贡献出自己的力量吗? 加入我们，我们会帮你发现自己的闪光点，让你发现美并创造美，让你的大学生活如理想般充实，快乐。</p>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="col-md-12 white-board notice" style="margin-top:10px">
			<div>
				<p>通知公告</p>
			</div>
			<ul>
				<li><a href="3">3fhjgykgujkhjkh<span>2017-02-15</span></a></li>
				<li><a href="3">3fhjgykgujkhjkh<span>2017-02-15</span></a></li>
				<li><a href="3">3fhjgykgujkhjkh<span>2017-02-15</span></a></li>
				<li><a href="3">3fhjgykgujkhjkh<span>2017-02-15</span></a></li>
				<li><a href="3">3fhjgykgujkhjkh<span>2017-02-15</span></a></li>
			</ul>
		</div>
		<div class="col-md-12 white-board notice">
			<div>
				<p>推荐文章</p>
			</div>
			<ul>
				<li><a href="3">3fhjgykgujkhjkh<span>2017-02-15</span></a></li>
				<li><a href="3">3fhjgykgujkhjkh<span>2017-02-15</span></a></li>
				<li><a href="3">3fhjgykgujkhjkh<span>2017-02-15</span></a></li>
				<li><a href="3">3fhjgykgujkhjkh<span>2017-02-15</span></a></li>
				<li><a href="3">3fhjgykgujkhjkh<span>2017-02-15</span></a></li>
			</ul>
		</div>
	</div>
	@include('frontend.aside')
@endsection