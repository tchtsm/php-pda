@extends('backend.layout')

@section('title')
 | 角色列表
@endsection

@section('content')
<table class="layui-table">
	<colgroup>
	    <col width="50%">
	    <col width="50%">
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
				<a href="{{ route('b_notice_edit',['id'=>$list->id]) }}" class="layui-btn layui-btn-normal layui-btn-sm">修改权限</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
{{ $lists -> links('backend.page') }}
@endsection