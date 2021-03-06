@extends('backend.layout')

@section('title')
 | {{ isset($data) ? '修改软件' : '添加软件' }}
@endsection

@section('content')
<a href="{{ Route('b_software_list') }}" class="layui-btn layui-btn-sm layui-btn-danger">返回</a>
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
 	<legend>{{ isset($data) ? '修改软件' : '添加软件' }}</legend>
</fieldset>
<form class="layui-form" action="{{ isset($data) ? route('b_software_edit') : route('b_software_add')}}">
	@if(isset($data))
		<input type="hidden" name="id" value="{{ $data -> id }}">
	@endif
	<div class="layui-form-item">
		<label class="layui-form-label">名称</label>
		<div class="layui-input-block">
			<input type="text" name="name" required lay-verify="required" placeholder="请输入名称" autocomplete="off" class="layui-input" value="{{ isset($data) ? $data->name : '' }}">
		</div>
	</div>
	<div class="layui-form-item">
		<label class="layui-form-label">封面</label>
		<button type="button" class="layui-btn" id="btn-uplode">
			<i class="layui-icon">&#xe67c;</i>上传图片
		</button>
	</div>
	<div class="layui-form-item">
		<label class="layui-form-label"></label>
		<img id="img" alt="请上传封面" style="max-width:683px;max-height:384px" src="{{ isset($data) ? $data -> cover : ''}}">
	</div>
	<div class="layui-form-item layui-form-text">
		<label class="layui-form-label">介绍</label>
		<div class="layui-input-block">
			<textarea class="layui-textarea" name="introduce" lay-verify="introduce" placeholder="请输入介绍">{{ isset($data) ? $data->introduce : '' }}</textarea>
		</div>
	</div>
	<div class="layui-form-item">
		<div class="layui-input-block">
			<button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
		</div>
	</div>
</form>
<script>
layui.use(['form','upload','jquery'], function(){
	var form = layui.form,
		upload = layui.upload,
		$ = layui.jquery;

	var uploadInst = upload.render({
	    elem: '#btn-uplode', //绑定元素
	    url: "{{ route('b_uplode_img') }}", //上传接口
	    acceptMime: 'jpg, png, gif',
	    size: 1024,
	    done: function(res){
	    	layer.msg('上传成功', {icon:1});
  	        $('#img').attr('src', res.url); //图片链接
	    },
	    error: function(){
			layer.msg('上传失败', {icon:5, anim:6});
	    }
	 });

	//监听提交
	form.on('submit(formDemo)', function(data){
		var datas = data.field;
		var action = data.form.action;
		datas.file = $('#img').attr('src');
		$.ajax({
			url: action,
			data: datas,
			type: 'post',
			dataType: 'json',
			success:function(msg){
				if (msg.status==200) {
					layer.msg(msg.txt, {icon:1});
				}else{
					layer.msg(msg.txt, {icon:5});
				}
			},
			error:function(xhr){
				layer.msg('提交出错', {icon:5, anim:6});
            }
		});
		return false;
	});
});
</script>
@endsection