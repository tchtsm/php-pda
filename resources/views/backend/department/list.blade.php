@extends('backend.layout')
@section('content')
<div class="btn">
	<a href="{{ route('b_department_add') }}" class="layui-btn">添加</a>
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
				<a href="{{ route('b_department_edit',['id'=>$list->id]) }}" class="layui-btn layui-btn-normal layui-btn-sm">编辑</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
@endsection