<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\backend\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

/**
 * 文章管理
 */
class ArticleController extends Controller
{

	public function list()
	{
		$lists = DB::table('article as a')
			->select('a.id','a.title','c.name as tag','b.name as user','a.created_at')
			->leftJoin('user as b','b.id','=','a.user_id')
			->leftJoin('tag as c','c.id','=','a.tag_id')
			->orderBy('a.created_at','desc')
			->paginate(10);
		return view('backend.article.list',['lists'=>$lists]);
	}

	public function form(Request $request)
	{

		$tags = DB::table('tag')
			-> select('id','name')
			-> get();

		if ($request -> has('id')) {
			$data = DB::table('article')
				-> select('id','title','tag_id','cover','content')
				-> where('id', $request -> id)
				-> first();
			if (is_null($data)) {
				return '不存在的文章';
			}else{
				return view('backend.article.form', ['tags'=>$tags, 'data' => $data]);
			}
		}else{
			return view('backend.article.form', ['tags'=>$tags]);
		}
	}

	public function store(Request $request)
	{
		$data = [
			'title' => $request -> title,
			'tag_id' => $request -> tag_id,
			'cover' => $request -> file,
			'content' => $request -> content,
			'user_id' => Auth::id(),
		];

		try {
			if ($request -> has('id')) {
				unset($data['user_id']);
				DB::table('article')
					-> where('id', $request -> id)
					-> update($data);
			}else {
				DB::table('article') -> insert($data);
			}
			return json_encode(array('txt'=>"保存成功",'status'=>200));
		} catch (Exception $e) {
			return json_encode(array('txt'=>"保存失败",'status'=>500));
		}
	}

	public function search($txt)
	{
		$lists = DB::table('article')
			->select('title','tag','user','createtime')
			->where('title',$txt)
			->orderBy('createtime','desc')
			->paginate(1);
		return view('backend.article.list',['lists'=>$lists]);
	}

	public function delete($id)
	{
		$lists = DB::table('article')
			->select('title','tag','user','createtime')
			->orderBy('createtime','desc')
			->paginate(1);
		return view('backend.article.list',['lists'=>$lists]);
	}
}