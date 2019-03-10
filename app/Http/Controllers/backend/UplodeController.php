<?php

namespace App\Http\Controllers\backend;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

/**
 * 上传管理
 */
class UplodeController extends Controller
{

	protected $relativeAvatarPath = '';
    protected $storeAvatarPath = '';

	public function image(Request $request)
	{
		$res = $this -> saveFile($request);
        if ($res) {
            return json_encode(array('url'=>$res));
        } else {
            return $this -> response(500);
        }
	}

	private function saveFile($request)
    {
    	$fileCharater = $request->file('file');
        if ($fileCharater -> isValid()) {
	        $this -> createPath();
            $extension = $fileCharater -> getClientOriginalExtension();
            $fileName = uniqid('thumbnail_');
            $file = $fileName . '.' . $extension;
            $fileCharater->move($this -> storeAvatarPath, $file);
            $url = $this -> relativeAvatarPath . $file;
            return $url;
        } else {
            return false;
        }
    }

	private function createPath()
    {
        $basePath = base_path('public');
        $today = date('Ymd', time());
        $this -> relativeAvatarPath = '/upload/images/' . $today . '/';
        $this -> storeAvatarPath = $basePath . $this -> relativeAvatarPath;
        if (!is_dir($this -> storeAvatarPath)) {
            mkdir($this -> storeAvatarPath, 0777, true);
        }
    }
}