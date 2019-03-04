@extends('backend.layout')

@section('title')
程序设计协会 | 文章添加
@endsection

@section('content')
<a href="{{ Route('b_article_list') }}" class="layui-btn">返回</a>
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
 	<legend>文章添加</legend>
</fieldset>
<form class="layui-form" action="">
  <div class="layui-form-item">
    <label class="layui-form-label">标题</label>
    <div class="layui-input-block">
		<input type="text" name="title" required  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input">
		</div>
	</div>
	<div class="layui-form-item">
		<label class="layui-form-label">标签</label>
		<div class="layui-input-block">
			<input type="checkbox" name="like[write]" title="写作">
			<input type="checkbox" name="like[read]" title="阅读" checked>
			<input type="checkbox" name="like[dai]" title="发呆">
		</div>
	</div>
	<div class="layui-form-item layui-form-text">
		<label class="layui-form-label">内容</label>
		<div class="layui-input-block">
			<!-- 加载编辑器的容器 -->
		    <script id="container" name="content" type="text/plain">
		        请输入内容
		    </script>
		    <!-- 配置文件 -->
		    <script type="text/javascript" src="/static/admin/ueditor/ueditor.config.js"></script>
		    <!-- 编辑器源码文件 -->
		    <script type="text/javascript" src="/static/admin/ueditor/ueditor.all.js"></script>
		    <!-- 实例化编辑器 -->
		    <script type="text/javascript">
		        var ue = UE.getEditor('container');
		    </script>
		</div>
	</div>
	<div class="layui-form-item">
		<div class="layui-input-block">
			<button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
			<button type="reset" class="layui-btn layui-btn-primary">重置</button>
		</div>
	</div>
</form>
<script>
//Demo
layui.use('form', function(){
  var form = layui.form;
  
  //监听提交
  form.on('submit(formDemo)', function(data){
    layer.msg(JSON.stringify(data.field));
    return false;
  });
});
</script>
@endsection