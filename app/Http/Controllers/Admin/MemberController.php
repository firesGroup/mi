<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Entity\Member;
use App\Entity\MemberDetail;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
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
        $state = array('0'=>'普通', '1' => '禁用');
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
        $user_detail = MemberDetail::find($data->id);
        $state = array('0'=>'普通', '1' => '锁定');
        $arr = array('0'=>'保密', '1'=>'男', '2'=>'女');
        return view('admin/member/member_detail', compact('data', 'user_detail', 'state', 'arr'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $data = Member::find($id);
       $user_detail = MemberDetail::find($data->id);
       //dd($user_detail);
       return view('admin/member/edit', compact('data', 'user_detail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            $data = Member::find($id);
//            dd($data);
        $arr = $request->all();
        dd($arr);
            $nick_name = $request->get('nick_name');
            $email = $request->get('email');
            $phone= $request->get('phone');
            $status = $request->get('status');
            $arr = array($nick_name, $email, $phone, $status);
            $a = $data::save();
            dd($a);
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

     //对视图传过来的图排尿进行裁剪
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
}
