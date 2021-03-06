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
	    <col width="25%">
	    <col width="25%">
	    <col width="25%">
	    <col width="25%">
	</colgroup>
	<thead>
	    <tr>
			<th>姓名</th>
			<th>部门</th>
			<th>上次登录IP</th>
			<th>上次登录时间</th>
	    </tr> 
	</thead>
	<tbody>
		@foreach($lists as $list)
		<tr>
			<td>{{ $list->name }}</td>
			<td>{{ $list->department }}</td>
			<td>{{ $list->last_login_ip }}</td>
			<td>{{ $list->last_login_at }}</td>
		</tr>
		@endforeach
	</tbody>
</table>
{{ $lists->links('backend.page') }}
@endsection