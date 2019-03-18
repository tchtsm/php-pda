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
				<button data-method="editAccess" id="{{ $list->id }}" class="layui-btn layui-btn-normal layui-btn-sm">修改权限</button>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
{{ $lists -> links('backend.page') }}
<form class="layui-form" id="role-form">
	<input type="hidden" name="id">
	<div id="xtree"></div>
	<button class="layui-btn layui-btn-sm layui-btn-info">确定</button>
	<button class="layui-btn layui-btn-sm layui-btn-danger">关闭</button>
</form>
<style type="text/css">
	form{
		width: 300px;
		padding: 20px;
		display: none;
		margin: auto;
		background: white;
		border: 1px solid black;
		position: absolute;
		left: 500px;
		top: 0;
		z-index: 2;
	}
	form button{
		margin-top: 20px;
	}
</style>
<script type="text/javascript" src="/static/admin/layui/layui-xtree.js"></script>
<script type="text/javascript">

    //一套json数据下面会使用，同时供你参考
    var json = [
	    { title: "通知公告", value: "1" }
        ,{ title: "文章管理", value: "2" }
        ,{ title: "书籍管理", value: "3" }
        ,{ title: "软件管理", value: "4" }
        ,{ title: "会员管理", value: "5" }
        ,{ title: "日志管理", value: "6" }
        ,{
            title: "基本管理", data: [
	            { title: "标签管理", value: "jd1.1", checked: true }
            ]
        }
        ,{
            title: "系统管理", data: [
              { title: "用户管理", value: "6" }
              ,{ title: "部门管理", value: "6" }
              ,{ title: "角色管理", value: "6" }
              ,{ title: "权限管理", value: "6" }
            ]
        }
    ];

    //layui 的 form 模块是必须的
    layui.use(['form'], function () {
        var form = layui.form;

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
        document.getElementById('btn1').onclick = function () {

            var oCks = xtree.GetChecked(); //这是方法

            for (var i = 0; i < oCks.length; i++) {
                console.log(oCks[i].value);
            }
        }

        //获取全部原checkbox DOM对象，返回Array
        document.getElementById('btn2').onclick = function () {

            var oCks = xtree.GetAllCheckBox(); //这是方法

            for (var i = 0; i < oCks.length; i++) {
                console.log(oCks[i].value);
            }
        }

        //更新数据，重新渲染
        document.getElementById('btn3').onclick = function () {
            xtree.render();
        }

        //通过value值找父级DOM对象，顶级节点与错误值均返回null
        document.getElementById('btn4').onclick = function () {

            var oCks = xtree.GetParent(document.getElementById('txt1').value);  //这是方法

            if (oCks != null) { //如果返回的对象不为null，则获取到父节点了，如果为null，说明这个值对应的节点是一级节点或是值错误
                console.log(oCks.value);
            }
            else {
                console.log('无父级节点或value值错误');
            }
        }
    });

	layui.use('layer', function() {
		var $ = layui.jquery, layer = layui.layer;
		var active = {
		    editAccess: function() {
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