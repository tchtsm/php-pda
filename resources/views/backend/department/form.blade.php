@extends('backend.layout')

@section('title')
 | {{ isset($data) ? '修改部门' : '添加部门' }}
@endsection

@section('content')
<a href="{{ Route('b_department_list') }}" class="layui-btn layui-btn-sm layui-btn-danger">返回</a>
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
 	<legend>{{ isset($content) ? '修改部门' : '添加部门' }}</legend>
</fieldset>
<form class="layui-form" action="{{ isset($data) ? route('b_department_edit') : route('b_department_add')}}">
	@if(isset($data))
		<input type="hidden" name="id" value="{{ $data -> id }}">
	@endif
	<div class="layui-form-item">
	    <label class="layui-form-label">名称</label>
	    <div class="layui-input-block">
			<input type="text" name="name" required  lay-verify="required" placeholder="请输入名称" autocomplete="off" class="layui-input" value="{{ isset($data) ? $data->name : '' }}">
		</div>
	</div>
	<div class="layui-form-item">
		<div class="layui-input-block">
			<button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
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
			type: 'post',
			dataType: 'json',
			success:function(msg){
				if (msg.status==200) {
					layer.msg(msg.txt, {icon:1});
				}else{
					layer.msg(msg.txt, {icon:2, anim:6});
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