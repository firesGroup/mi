<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Home\BaseController;
use Hash;
use Session;
class LoginController extends BaseController
{
    public function login(Request $request)
    {
        $data = $request->all();
//        dd($data);
        //设置一个@字符串
        $str = '@';

        //判断传过来的nick_name 来判断用户时用手机号登陆还是邮箱登陆
        if(strpos($data['nick_name'],$str ) == true){
            $email = DB::table('member')->where('email', '=', $data['nick_name'])->get();

            if($email == []){
                return back()->with('error', '邮箱错误')->withInput();
            }

            if($email[0]->status == 1 ){
                return back()->with('error', '你的账号已被锁定, 暂时无法登陆')->withInput();
            }
//            dd($email[0]->password);

            if(Hash::check($data['password'], $email[0]->password)){
                $request->session()->put('user_deta', ['nick_name'=>$email[0]->nick_name, 'phone'=>$email[0]->phone, 'email'=>$email[0]->email, 'id'=>$email[0]->id]);
                return redirect('/');
            }else{
                return back()->with('password', '密码错误')->withInput();
            }

        }else{

            $phone = DB::table('member')->where('phone', '=', $data['nick_name'])->get();
//            dd($phone);
            if($phone == []){
                return back()->with('error', '手机号码错误')->withInput();
            }
//            dd($phone);
            if($phone[0]->status == 1){
                return back()->with('error', '你的账号已被锁定, 暂时无法登陆')->withInput();
            }


            if(Hash::check($data['password'], $phone[0]->password)){
//                dd($phone);
                $request->session()->put('user_deta', ['nick_name'=>$phone[0]->nick_name, 'phone'=>$phone[0]->phone, 'email'=>$phone[0]->email, 'id'=>$phone[0]->id]);
//                dd(session('user_detail'));
                return redirect('/');
            }else{

                return back()->with('password', '密码错误')->withInput();
            }
        }




//      dump($data);
//      dd($phone);

    }

    public function loginout(Request $request)
    {
        $request->session()->forget('user_deta');
        return redirect('/');
    }

}
