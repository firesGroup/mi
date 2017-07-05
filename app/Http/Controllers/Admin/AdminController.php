<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use Storage;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function __controller()
    {
//        $this->middleware('');
    }
    //
    public function index()
    {

        return view('admin.index');
    }

    public function show()
    {

    }

    /*
     *
     * 清除缓存
     */
    public function cancle()
    {
        //获取视图缓存目录所有缓存文件
        $files = Storage::disk('viewCache')->allFiles();
        //删除
       $res = Storage::disk('viewCache')->delete($files);

       return $res?0:1;
    }
}
