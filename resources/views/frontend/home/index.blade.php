@extends('frontend.layout')
@section('content')
	<div class="col-md-9 row">
		<div class="col-md-8 carousel">
			<div id="demo" class="carousel slide" data-ride="carousel">
				<!-- 指示符 -->
				<ul class="carousel-indicators">
					<li data-target="#demo" data-slide-to="0" class="active"></li>
					<li data-target="#demo" data-slide-to="1"></li>
				</ul>
				<!-- 轮播图片 -->
				<div class="carousel-inner">
					<div class="carousel-item active">
						<img src="http://static.runoob.com/images/mix/img_fjords_wide.jpg" class="rounded" alt="Cinque Terre" height="250px">
						<div class="carousel-caption">
							<p>描述文字!sgsdgfd</p>
						</div>
					</div>
					<div class="carousel-item">
						<img src="http://static.runoob.com/images/mix/img_nature_wide.jpg" class="rounded" alt="Cinque Terre" height="250px">
						<div class="carousel-caption">
							<p>描述文字!dfgdfgdfg</p>
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
		<div class="col-md-4 welcome">
			<div>
				<h5>欢迎来到程序设计协会</h5>
				<p>你是否曾被炫酷的电脑设计所吸引，认为自己在这块领域虽然无一专长却有一颗热忱的心，愿意为社团运作贡献出自己的力量吗? 加入我们，我们会帮你发现自己的闪光点，让你发现美并创造美，让你的大学生活如理想般充实，快乐。</p>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="col-md-12 white-board notice" style="margin-top:20px">
			<div>
				<p>通知公告</p>
			</div>
			<ul>
				<li><a href="3">3fhjgykgujkhjkh<span>办公室&nbsp;&nbsp;&nbsp;&nbsp;2017-02-15</span></a></li>
				<li><a href="3">3fhjgykgujkhjkh<span>办公室&nbsp;&nbsp;&nbsp;&nbsp;2017-02-15</span></a></li>
				<li><a href="3">3fhjgykgujkhjkh<span>办公室&nbsp;&nbsp;&nbsp;&nbsp;2017-02-15</span></a></li>
				<li><a href="3">3fhjgykgujkhjkh<span>办公室&nbsp;&nbsp;&nbsp;&nbsp;2017-02-15</span></a></li>
				<li><a href="3">3fhjgykgujkhjkh<span>办公室&nbsp;&nbsp;&nbsp;&nbsp;2017-02-15</span></a></li>
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