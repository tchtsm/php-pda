@extends('backend.layout')

@section('title')
{{ isset($content) ? '修改标签' : '标签添加' }}
@endsection

@section('content')
<a href="{{ route('b_tag_list') }}" class="layui-btn">返回</a>
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
 	<legend>标签添加</legend>
</fieldset>
<form class="layui-form" action="{{ route('b_tag_store') }}">
	@if(isset($content))
		<input type="hidden" name="id" value="{{ $content -> id }}">
	@endif
	<div class="layui-form-item">
	    <label class="layui-form-label">名称</label>
	    <div class="layui-input-inline">
			<input type="text" name="name" required  lay-verify="required" placeholder="请输入名称" autocomplete="off" class="layui-input"  >
		</div>
		<div class="layui-form-mid layui-word-aux">请填写6到12位密码</div>
	</div>
	<div class="layui-form-item">
		<div class="layui-input-block">
			<button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
			<button type="reset" class="layui-btn layui-btn-primary">重置</button>
		</div>
	</div>
</form>
<script>
layui.use(['form','jquery'], function(){
	var form = layui.form;
	var $ = layui.jquery;

	//监听提交
	form.on('submit(formDemo)', function(data){
		// layer.msg(JSON.stringify(data.field));
		var datas = data.field;
		var action = data.form.action;
		$.ajax({
			url: action,
			data: datas,
			type: 'POST',
			dataType: 'JSON',
			success:function(msg){
				if (msg.status==200) {
					layer.msg(msg.txt);
				}else{
					layer.msg(msg.txt);
				}
			},
			error:function(){
				layer.msg('提交出错', {icon:2, anim:6});
            }
		});
		return false;
	});
});
</script>
@endsection