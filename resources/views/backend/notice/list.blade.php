@extends('backend.layout')

@section('title')
 | 通知公告列表
@endsection

@section('content')
<div class="btn">
	<a href="{{ route('b_notice_add') }}" class="layui-btn">添加</a>
	<form action="{{ route('b_notice_search') }}" style="float:right">
		<input type="text" name="title" required  lay-verify="required" placeholder="请输入搜索內容" autocomplete="off" class="layui-input" style="width:300px;float:left">
		<button class="layui-btn layui-btn-warm">搜索</button>
	</form>
</div>
<table class="layui-table">
	<colgroup>
	    <col width="33%">
	    <col width="34%">
	    <col width="33%">
	    <col>
	</colgroup>
	<thead>
	    <tr>
			<th>名称</th>
			<th>创建时间</th>
			<th>操作</th>
	    </tr> 
	</thead>
	<tbody>
		@foreach($lists as $list)
		<tr>
			<td>{{ $list->title }}</td>
			<td>{{ $list->created_at }}</td>
			<td>
				<a href="{{ route('b_notice_edit',['id'=>$list->id]) }}" class="layui-btn layui-btn-normal layui-btn-sm">编辑</a>
				<a href="{{ route('b_notice_del',['id'=>$list->id]) }}" class="layui-btn layui-btn-danger layui-btn-sm">刪除</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
{{ $lists -> links('backend.page') }}
@endsection