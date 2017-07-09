<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use Storage;
use Hash;
use App\Entity\Admin;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    //首页
    public function index()
    {
        return view('admin.index');
    }


    /*
     * 登陆模板
     *
     */
    public function login(Request $request)
    {
        if( session('adminInfo') ){
            return redirect('admin/index');
        }else{
            return view('admin.login');
        }


    }


    /*
     * 处理登陆
     *
     */
    public function doLogin(Request $request)
    {
        $data = $request->all();

        $name = $data['name'];
        $info  = Admin::where('username', $name)->first()->toArray();
        $password =  $info ['password'];

        if (empty( $info )) {
            return back()->with(['error'=>'您的用户名错误!请检查'])->withInput();
        } else {
            $passwd = $data['password'];
            if (Hash::check($passwd, $password)) {
                if( $info['status'] == 1 ){
                    return back()->with(['wrong'=>'对不起!您的账号已被锁定!请联系管理员']);
                }else{
                    $request->session()->put('adminInfo', $info);
                    return redirect('admin/index ');
                }
            } else {
                return back()->with(['wrong'=>'您的密码错误!请检查']);
            }
        }


    }

    /*
     * 退出登陆
     *
     */
    public function logout(Request $request)
    {
        $request->session()->forget('adminInfo');
        return redirect('admin/login');
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
