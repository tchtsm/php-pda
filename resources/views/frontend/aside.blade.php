<div class="col-md-3">
	<div class="white-board">
		<div>
		    <p>最新文章</p>
		</div>
	    <ul>
	    	@foreach($article_ups as $article_up)
		    	<li><a href="/article/{{ $article_up -> id }}">{{ $article_up -> title }}</a></li>
	    	@endforeach
	    </ul>
	</div>
	<div class="white-board">
	    <div>
	    	<p>本站社区</p>
	    </div>
	    <p>QQ 4645555</p>
	</div>
	<div class="white-board file">
	    <div>
	    	<p>文章归档</p>
	    </div>
	    <ul>
	    	@foreach($tags as $tag)
				<li><a href="/article/tag/{{ $tag->name }}">{{ $tag -> name }}</a></li>
			@endforeach
		</ul>
	</div>
</div>