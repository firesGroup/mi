<?php

namespace App\Http\Controllers\Home;

use App\Entity\MemberDetail;
use Illuminate\Http\Request;
use App\Entity\Level;
use Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Entity\Member;
use Hash;
class UserDetailController extends Controller
{

    public function user_detail(Request $request)
    {
        if(session('user_deta')) {
            $data = session('user_deta')['nick_name'];
//        dd($data);
            $arr = DB::table('member')->where('nick_name', '=', $data)->get();

            $array = MemberDetail::find(session('user_deta')['id']);

            $arr = $arr[0];
//        dd($arr);
            $string = $arr->email ? $arr->email : '';


            $str = substr($arr->phone, 3, 6);
            $string = substr($string, 3, 7);
            $char = "******";
            $str = str_replace($str, $char, $arr->phone);
            $string = str_replace($string, $char, $arr->email);
            $arr->phone = $str;
            $arr->email = $string;
            return view('/home/member/index', compact('arr', 'array'));
        }else{
            return redirect('/');
        }

    }

    public function mailcode(Request $request)
    {
        $data  = $request->all();
        $this->validate($request, [
            'email' => 'email|string|required|unique:member,email,',
        ],[
            'email.email' => '请输入正确的邮箱地址',
            'email.unique' => '邮箱已存在',
        ]);

        if(session('email_code') == $data['code']){
            $username = session('user_deta')['nick_name'];
            $arr = DB::table('member')->where('nick_name', '=', $username)->get()[0];


            if(Member::find($arr->id)->update(['email'=>$data['email']])){
                return 1;
            }else{
                return 2;
            }
       }
    }

    public function phonecode(Request $request)
    {
        $data  = $request->all();

        $this->validate($request, [
            'phone' => 'phone|string|required|unique:member,phone,',
        ],[
            'phone.phone' => '请输入正确输入的电话号码',
            'phone.unique' => '手机号已存在',
        ]);

        if(session('sms_code') == $data['code']){

            $username = session('user_deta')['nick_name'];
            $arr = DB::table('member')->where('nick_name', '=', $username)->get()[0];


            if(Member::find($arr->id)->update(['phone'=>$data['phone']])){
                return 1;
            }else{
                return 2;
            }
        };
    }

    public function update_pass(Request $request)
    {
        $data = $request->all();

        if($data['data'] == ''){
            return 1;
        }
        $arr = DB::table('member')->where('nick_name','=', session('user_deta')['nick_name'])->get()[0];
        if(Hash::check($data['data'], $arr->password)){
            $hash = bcrypt($data['newpass']);
            if(Member::find($arr->id)->update(['password'=>$hash])){
                return 0;
            }
        }else{
            return 2;
        }

    }

    public function personal()
    {
        $id = session('user_deta')['id'];
        $arr = [0=>'保密', 1=>'男', 2=>'女'];
        $data = MemberDetail::find($id);
        $member = Member::find(session('user_deta')['id']);
//        dd($data->level_id);
        $level = Level::find($data->level_id);
//        dd($level);


        return view('home/member/personal', compact('data', 'arr', 'level', 'member'));
    }

    public function personal_update(Request $request)
    {
        $array = $request->all();

       $nick_name = $request->get('nick_name');

       $birthday = $request->get('birthday');


//       dump($nick_name);
       $sex = $request->get('sex');

       $id = session('user_deta')['id'];
       $data = MemberDetail::find($id);
//       dd($data);
        $data->birthday = $birthday;
        $data->sex = $sex;

        $flight = Member::find($id);

        $all_member = DB::table('member')->lists('nick_name');

        if($nick_name != $request->get('name')){

            if(in_array($nick_name, $all_member)){
                    return 1;
            }
        }

            $flight->nick_name = $nick_name;
//        dd($request->get('name'));



        DB::beginTransaction();

        if($data->save() && $flight->save()){
            DB::commit();
            $request->session()->forget('user_deta');
            $request->session()->put('user_deta', ['nick_name'=>$nick_name, 'phone'=>$flight->phone, 'email'=>$flight->email, 'id'=>$flight->id]);
//            dd(session('user_deta'));

            return json_encode($array);
        }else{
            DB::rollBack();
        };
    }


}