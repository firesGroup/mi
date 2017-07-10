<?php

namespace App\Http\Controllers\Home;

use App\Entity\MemberDetail;
use Illuminate\Http\Request;
use App\Entity\Level;
use Session;
use App\Http\Requests;
use App\Http\Controllers\Home\BaseController;
use DB;
use App\Entity\Member;
use Hash;
class UserDetailController extends BaseController
{

    public function user_detail(Request $request)
    {
        if(!empty(session('user_deta'))) {
            $data = session('user_deta')['nick_name'];
            $id = session('user_deta')['id'];

            $arr = DB::table('member')->where('id', '=', $id)->get();

            $array = MemberDetail::find($id);
//            dd($array);
            $arr = $arr[0];
//        dd($arr);
            $num = DB::table('collect')->where('member_id',$id )->get();
//            dd(count($num));
            $string = $arr->email ? $arr->email : '';

            //查询带评价数

            //获取到当前用户下所有的已收货的id

            $comment = DB::table('comment')->where('member_id', $id)->get();



            //隐藏字符串
            $str = substr($arr->phone, 3, 6);
            $string = substr($string, 3, 7);
            $char = "******";
            $str = str_replace($str, $char, $arr->phone);
            $string = str_replace($string, $char, $arr->email);
            $arr->phone = $str;
            $arr->email = $string;
            return view('/home/member/index', compact('arr', 'array', 'num', 'comment'));
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

       if(count($data) == 2){
           $arr = DB::table('member')->where('nick_name','=', session('user_deta')['nick_name'])->get()[0];
           if(Hash::check($data['data'], $arr->password)){
               return 2;
           }
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

    public function member_address()
    {
        $id = session('user_deta')['id'];
       $member_address =  DB::table('address')->where('member_id', '=', $id)->get();

        $data = DB::table('district')->where('level', '=', 1)->get();
        return view('home/member/member_address', compact('data', 'member_address'));
    }

}