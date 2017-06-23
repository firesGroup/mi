<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Entity\Member;
use App\Entity\MemberDetail;
use App\Http\Controllers\Controller;
use DB;

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
        //
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
}
