@extends('backend.layout')
@section('content')
<div class="btn">
	<a href="{{ route('b_tag_add') }}" class="layui-btn">添加</a>
	<form action="" style="float:right">
		<input type="text" name="title" required  lay-verify="required" placeholder="请输入搜索內容" autocomplete="off" class="layui-input" style="width:300px;float:left">
		<button class="layui-btn layui-btn-warm">搜索</button>
	</form>
</div>
<table class="layui-table">
	<colgroup>
	    <col width="50%">
	    <col width="50%">
	    <col>
	</colgroup>
	<thead>
	    <tr>
			<th>名称</th>
			<th>操作</th>
	    </tr> 
	</thead>
	<tbody>
		@foreach($lists as $list)
		<tr>
			<td>{{ $list->name }}</td>
			<td>
				<a href="{{ route('b_tag_edit',['id'=>$list->id]) }}" class="layui-btn layui-btn-normal layui-btn-sm">编辑</a>
				<button class="layui-btn layui-btn-danger layui-btn-sm delete">刪除</button>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
{{ $lists->links('backend.page') }}
@endsection

@section('javascript')
<script type="text/javascript">
layui.use(['layer','jquery'], function() {
	var layer = layui.layer, $ = layui.jquery;

	$('.delete').click(function(){
			layer.alert('确定要删除？', {
			skin: 'layui-layer-molv',
			title: '提示',
			closebtn: 1,
			btn: ['确定', '取消'],
			icon: 6,
			yes: function () {
				location.reload();
			}
		});
	});
});
</script>
@endsection