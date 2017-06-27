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
    public function store(MemberRequest $request)
    {
        //
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
    public function destroy(MemberRequest $request, $id)
    {
        //dd($id);
        $data = Member::find($id);
        DB::table('member')->delete($id);
       return DB::table('memberdetail')->where('mid', $data->id)->delete();
    }

    public function changeavator(MemberRequest $request)
    {

        $id = $_POST['id'];
        $file = $request->file('avator');
        $destinationpath = 'uploads/avator/';
        $filename = $id.'-'.time()."-".$file->getClientOriginalName();
        $file->move($destinationpath, $filename);
        Image::make($destinationpath.$filename)->fit(500)->save();
//        $avator = MemberDetail::find($id);
//
//        $avator->avator = '/'.$destinationpath.$filename;
//
//        $avator->save();
        $url = '/'.$destinationpath.$filename;
        $res["message"]= "图片上传成功！";
        $res["status"] = 1;
        $res["src"] = $url;
        return json_encode($res);

     }

     //对视图传过来的图片进行裁剪
     public function change(MemberRequest $request)
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

}
