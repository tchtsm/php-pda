@extends('backend.layout')
@section('content')
<div class="btn">
	<a href="" class="layui-btn">添加</a>
	<form action="" style="float:right">
		<input type="text" name="title" required  lay-verify="required" placeholder="请输入搜索內容" autocomplete="off" class="layui-input" style="width:300px;float:left">
		<button class="layui-btn layui-btn-warm">搜索</button>
	</form>
</div>
<table class="layui-table">
	<colgroup>
	    <col width="20%">
	    <col width="20%">
	    <col width="20%">
	    <col width="20%">
	    <col width="20%">
	    <col>
	</colgroup>
	<thead>
	    <tr>
			<th>姓名</th>
			<th>身份</th>
			<th>上次登录时间</th>
			<th>上次登录IP</th>
			<th>操作</th>
	    </tr> 
	</thead>
	<tbody>
		@foreach($lists as $list)
		<tr>
			<td>{{ $list->name }}</td>
			<td>{{ $list->role }}</td>
			<td>{{ $list->lasttime }}</td>
			<td>{{ $list->lastip }}</td>
			<td>
				<a href="" class="layui-btn layui-btn-normal layui-btn-sm">編輯</a>
				<a href="" class="layui-btn layui-btn-danger layui-btn-sm">刪除</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
@endsection