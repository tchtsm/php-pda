@extends('backend.layout')
@section('content')
<div class="btn">
	<form action="" style="float:right;margin-bottom:10px">
		<input type="text" name="title" required  lay-verify="required" placeholder="请输入搜索內容" autocomplete="off" class="layui-input" style="width:300px;float:left">
		<button class="layui-btn layui-btn-warm">搜索</button>
	</form>
</div>
<table class="layui-table">
	<colgroup>
	    <col width="9%">
	    <col width="10%">
	    <col width="10%">
	    <col width="10%">
	    <col width="10%">
	    <col width="10%">
	    <col width="10%">
	    <col width="10%">
	    <col width="10%">
	    <col width="11%">
	    <col>
	</colgroup>
	<thead>
	    <tr>
			<th>姓名</th>
			<th>部门</th>
			<th>身份</th>
			<th>学院</th>
			<th>专业</th>
			<th>学号</th>
			<th>电话</th>
			<th>QQ</th>
			<th>邮箱</th>
			<th>操作</th>
	    </tr> 
	</thead>
	<tbody>
		@foreach($lists as $list)
		<tr>
			<td>{{ $list->name }}</td>
			<td>{{ $list->department }}</td>
			<td>{{ $list->role }}</td>
			<td>{{ $list->college }}</td>
			<td>{{ $list->major }}</td>
			<td>{{ $list->account }}</td>
			<td>{{ $list->phone }}</td>
			<td>{{ $list->qq }}</td>
			<td>{{ $list->email }}</td>
			<td>
				<button class="layui-btn layui-btn-normal layui-btn-sm editPart" id="{{ $list->id }}">修改部门</button>
				<button class="layui-btn layui-btn-info layui-btn-sm editRole" id="{{ $list->id }}">修改身份</button>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
{{ $lists->links('backend.page') }}
@endsection

@section('javascript')
<script type="text/javascript">
layui.use(['layer','jquery','form'], function() {
	var layer=layui.layer, $=layui.jquery, form=layui.form;

	var htmlPart = function (id) {
		var form = 
			'<form class="layui-form"  action="{{ route("b_member_department_edit") }}" style="margin-top:10px">' +
				'<input type="hidden" name="id" value="'+ id +'">' +
				'<div class="layui-form-item">' +
					'<label class="layui-form-label">部门</label>' +
					'<div class="layui-input-inline">' +
						'<select name="department_id">' +
							@foreach($departments as $department)
								'<option value="{{ $department->id }}">{{ $department->name }}</option>' +
							@endforeach
						'</select>' +
					'</div>' +
				'</div>' +
				'<div class="layui-form-item">' +
					'<div class="layui-input-block">' +
						'<button class="layui-btn" lay-submit lay-filter="formDemo">确定</button>' +
					'</div>' +
				'</div>' +
			'</form>';
		return form;
	}

	var htmlRole = function (id) {
		var form = 
			'<form class="layui-form" action="{{ route("b_member_role_edit") }}" style="margin-top:10px">' +
				'<input type="hidden" name="id" value="'+ id +'">' +
				'<div class="layui-form-item">' +
					'<label class="layui-form-label">身份</label>' +
					'<div class="layui-input-inline">' +
						'<select name="role_id">' +
							@foreach($roles as $role)
								'<option value="{{ $role->id }}">{{ $role->name }}</option>' +
							@endforeach
						'</select>' +
					'</div>' +
				'</div>' +
				'<div class="layui-form-item">' +
					'<div class="layui-input-block">' +
						'<button class="layui-btn" lay-submit lay-filter="formDemo">确定</button>' +
					'</div>' +
				'</div>' +
			'</form>';
		return form;
	}

	$('.editPart').click(function(){
		var id = $(this).attr('id');
		layer.open({
			type: 1,
			skin: 'layui-layer-rim',
			title: '修改部门',
			area: ['350px', '350px'],
			content: htmlPart(id)
		});
		form.render();
	});

	$('.editRole').click(function(){
		var id = $(this).attr('id');
		layer.open({
			type: 1,
			skin: 'layui-layer-rim',
			title: '修改身份',
			area: ['350px', '350px'],
			content: htmlRole(id)
		});
		form.render();
	});

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
					setTimeout(function () {
						location.reload();
					}, 1000);
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