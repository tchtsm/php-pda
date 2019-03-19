@extends('backend.layout')

@section('title')
 | 角色列表
@endsection

@section('css')
<style type="text/css">
	form{
		width: 400px;
		padding: 20px;
		display: none;
		background: white;
		border: 1px solid black;
		border-radius: 5px;
		position: absolute;
		left: 50%;
		top: 70px;
		margin-left: -200px;
	}
	form button{
		margin-top: 20px;
	}
</style>
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
				<button data-method="editAccess" id="{{ $list->id }}" class="layui-btn layui-btn-normal layui-btn-sm">修改权限</button>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
{{ $lists -> links('backend.page') }}
<form class="layui-form" id="role-form" action="{{ route('b_role_edit') }}">
	<input type="hidden" name="id">
	<div id="xtree"></div>
	<button class="layui-btn layui-btn-sm layui-btn-info" lay-submit lay-filter="formDemo">确定</button>
	<button class="layui-btn layui-btn-sm layui-btn-danger" id="role-close">关闭</button>
</form>
@endsection

@section('javascript')
<script type="text/javascript" src="/static/admin/layui/layui-xtree.js"></script>
<script type="text/javascript">
	layui.use(['layer','form','jquery'], function() {
		var $ = layui.jquery, layer = layui.layer, form = layui.form;

		/*监听权限表单提交*/
		form.on('submit(formDemo)', function(data){
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
						layer.msg(msg.txt, {icon:5});
					}
				},
				error:function(xhr){
					layer.msg('提交出错', {icon:5, anim:6});
	            }
			});
			return false;
		});

		/*树形权限列表*/
		var tree = function (json) {
			var xtree = new layuiXtree({
	            elem: 'xtree'                  //必填
	            , form: form                    //必填
	            , data: json       //必填
	            , isopen: false  //加载完毕后的展开状态，默认值：true
	            , ckall: true    //启用全选功能，默认值：false
	            , ckallback: function () { } //全选框状态改变后执行的回调函数
	            , icon: {        //三种图标样式，更改几个都可以，用的是layui的图标
	                open: "&#xe7a0;"       //节点打开的图标
	                , close: "&#xe622;"    //节点关闭的图标
	                , end: "&#xe621;"      //末尾节点的图标
	            }
	            , color: {       //三种图标颜色，独立配色，更改几个都可以
	                open: "#EE9A00"        //节点图标打开的颜色
	                , close: "#EEC591"     //节点图标关闭的颜色
	                , end: "#828282"       //末级节点图标的颜色
	            }
	            , click: function (data) {  //节点选中状态改变事件监听，全选框有自己的监听事件
	                console.log(data.elem); //得到checkbox原始DOM对象
	                console.log(data.elem.checked); //开关是否开启，true或者false
	                console.log(data.value); //开关value值，也可以通过data.elem.value得到
	                console.log(data.othis); //得到美化后的DOM对象
	            }
	        });

	        //获取全部[选中的][末级节点]原checkbox DOM对象，返回Array
	        $('#btn1').click(function () {

	            var oCks = xtree.GetChecked(); //这是方法

	            for (var i = 0; i < oCks.length; i++) {
	                console.log(oCks[i].value);
	            }
	        });

	        //获取全部原checkbox DOM对象，返回Array
	        $('#btn2').click(function () {

	            var oCks = xtree.GetAllCheckBox(); //这是方法

	            for (var i = 0; i < oCks.length; i++) {
	                console.log(oCks[i].value);
	            }
	        });

	        //更新数据，重新渲染
	        $('#btn3').click(function () {
	            xtree.render();
	        });

	        //通过value值找父级DOM对象，顶级节点与错误值均返回null
	        $('#btn4').click(function () {

	            var oCks = xtree.GetParent(document.getElementById('txt1').value);  //这是方法

	            if (oCks != null) { //如果返回的对象不为null，则获取到父节点了，如果为null，说明这个值对应的节点是一级节点或是值错误
	                console.log(oCks.value);
	            }
	            else {
	                console.log('无父级节点或value值错误');
	            }
	        });
		}

		/*修改权限窗口 开启 关闭*/
		$('#role-close').click(function(){
			$("#role-form").hide();
			return false;
		});

		var active = {
		    editAccess: function() {
		    	$.ajax({
					url: "{{ route('b_role_json') }}",
					data: {'id':this.id},
					type: 'get',
					dataType: 'json',
					success:function(msg){
						tree(msg);
					},
					error:function(xhr){
						layer.msg('提交出错', {icon:5, anim:6});
		            }
				});
		    	$('#role-form').show();
		    }
		};
  
		$('.layui-btn').on('click', function(){
			var othis = $(this), method = othis.data('method');
			active[method] ? active[method].call(this, othis) : '';
		});
	});
</script>
@endsection