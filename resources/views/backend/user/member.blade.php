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
				<button class="layui-btn layui-btn-normal layui-btn-sm editPart" id="editPart">修改部门</button>
				<button class="layui-btn layui-btn-info layui-btn-sm editRole" id="editRole">修改身份</button>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
@endsection

@section('form')
<form>
	<input type="text" name="">
</form>
@endsection

@section('javascript')
<script type="text/javascript">
layui.use(['layer','jquery'], function() {
	var layer = layui.layer, $ = layui.jquery;

	$('.editPart').click(function(){
		alert();
	});
});
</script>
@endsection