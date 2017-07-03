<?php

namespace App\Http\Controllers\Admin;

use App\Entity\Member;
use App\Entity\MemberDetail;
use App\Http\Controllers\Controller;
use App\http\Level;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\MemberRequest;
use Image;
use Hash;
use Session;
use Mail;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = Member::orderby('id')->paginate(5);
        $state = array('0'=>'普通', '1' => '锁定');
        return view('admin/member/member', compact('data', 'state'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
//      dd($data);
        $this->validate($request, [
            'phone' => 'phone|string|required|unique:member,phone,',
           'password' =>'confirmed|required|min:6|max:12|required',
        ],[
            'phone.phone' => '请输入正确输入的电话号码',
            'phone.unique' => '手机号已存在',
            'password.confirmed' => '输入的密码不一致'
            ]);

            if(session('img_code') != $data['code']) {
//                dd(session('img_code'));
                return back()->with('error', '验证码错误,')->withInput();
            }

        if(session('sms_code') != $data['sms_code']){
//            dd(session('sms_code'));
            return back()->with('sms', '请输入正确的手机验证码')->withInput();

        }
        //拼接数据库所需要的数据
        $data['password'] = bcrypt($data['password']);
        $data['nick_name'] = "米粉".rand(0, 1000000);
        $data['status'] = '0';
        $request->setTrustedProxies(array('10.32.0.1/16'));
        $ip = $request->getClientIp();
        $data['last_ip'] = $ip;
        if(Member::create($data)){
            return redirect('www.mi.cn');
        }else{
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Member::find($id);
        $array = DB::table('level')->lists('level_name', 'id');
        $user_detail = MemberDetail::find($data->id);
        $state = array('0'=>'普通', '1' => '锁定');
        $arr = array('0'=>'保密', '1'=>'男', '2'=>'女');
        return view('admin/member/member_detail', compact('data', 'user_detail', 'state', 'arr', 'array'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $array = DB::table('level')->lists('level_name','id');
       $data = Member::find($id);
       $user_detail = MemberDetail::find($data->id);
       //dd($user_detail);
       return view('admin/member/edit', compact('data', 'user_detail', 'array'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( MemberRequest $request, $id)
    {

                $nick_name = $request->get('nick_name');
                $email = $request->get('email');
                $status = $request->get('status');
                $lastIp = $request->get('last_ip');
                $sex = $request->get('sex');
                $birthday = $request->get('birthday');
                $phone = $request->get('phone');
                $level_id = $request->get('level_id');

                DB::beginTransaction();
                if (Member::where('id', '=', $id)->update(['nick_name' => $nick_name, 'email' => $email, 'phone' => $phone, 'status' => $status, 'last_ip' => $lastIp])) {
                    if (MemberDetail::where('member_id', '=', $id)->update(['sex' => $sex, 'birthday' => $birthday, 'level_id' => $level_id])) {
                        DB::commit();
                        return redirect('admin/member');
                    } else {
                        DB::rollBack();
                        return back();
                    }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //dd($id);
        $data = Member::find($id);
        DB::table('member')->delete($id);
       return DB::table('memberdetail')->where('mid', $data->id)->delete();
    }

    public function changeavator(Request $request)
    {

        $id = $_POST['id'];
        $file = $request->file('avator');
        $destinationpath = 'uploads/avator/';
        $filename = $id.'-'.time()."-".$file->getClientOriginalName();
        $file->move($destinationpath, $filename);
        Image::make($destinationpath.$filename)->fit(500)->save();
        $url = '/'.$destinationpath.$filename;
        $res["message"]= "图片上传成功！";
        $res["status"] = 1;
        $res["src"] = $url;
        return json_encode($res);

     }

     //对视图传过来的图片进行裁剪
     public function change(Request $request)
     {
         $photo = mb_substr($request->get('photo'),1);
         $w = $request->get('w');
         $h = $request->get('h');
         $x = $request->get('x');
         $y = $request->get('y');
         $id = $request->get('id');
         Image::make($photo)->crop($w, $h, $x, $y)->save();

         $avator = MemberDetail::find($id);

        $avator->avator = $request->get('photo');

        $avator->save();

        return redirect('/admin/member/'.$id);

     }

     public function member_check_name(Request $request, $id)
     {

         $data = DB::table('member')->lists('nick_name');
         $s_name = Member::find($id);
         $m_name = $request->get('m_name');
         if(in_array($m_name, $data) && $m_name != $s_name->nick_name) {
             return 1;
         }
     }

    public function member_check_phone(Request $request, $id)
    {

        $data = DB::table('member')->lists('phone');
        $s_phone = Member::find($id);
        $m_phone = $request->get('m_phone');
        if(in_array($m_phone, $data) && $m_phone != $s_phone->phone) {
            return 1;
        }
    }

    public function member_check_email(Request $request, $id)
    {

        $data = DB::table('member')->lists('email');
        $s_email = Member::find($id);
        $m_email = $request->get('email');
        if(in_array($m_email, $data) && $m_email != $s_email->email) {
            return 1;
        }
    }

    public function mail_code(Request $request)
    {

        $this->validate($request, [
            'email' => 'email|string|required|unique:member,email,',
            'password' =>'confirmed|required|min:6|max:12|required',
        ],[
            'email.email' => '请输入正确输入的邮件地址',
            'email.unique' => '邮箱已存在',
            'password.confirmed' => '输入的密码不一致'
        ]);
        $data = $request->all();
        $data['nick_name'] = "米粉".rand(0, 1000000);
        $data['password'] = bcrypt($data['password']);
        $data['status'] = '1';
        $request->setTrustedProxies(array('10.32.0.1/16'));
        $ip = $request->getClientIp();
        $data['last_ip'] = $ip;

        if(session('img_code') != $data['code']) {
//                dd(session('img_code'));
            return back()->with('error', '验证码错误,')->withInput();
        }

//        if(Member::create($data)){
//          $arr = Member::where('email', '1983933951@qq.com')->get();
//          $uid = $arr[0]->id;
//          $email = $arr[0]->email;
//          $username = $arr[0]->nick_name;
//          $code = bcrypt($uid.'123456');  //获取邮箱验证时的随机串
//            $data = ['email'=>$email, 'name'=>$username, 'uid'=>$uid, 'code'=>$code];
//            Mail::send('home/reg_login/activemail', $data, function($message) use($data)//use用于引入function外面的数据  activemail是指定的视图
//        {
//        $message->to($data['email'], $data['name'])->subject('发送右键');
//});
////        }else{
////            return back();
////        }
    }


}
