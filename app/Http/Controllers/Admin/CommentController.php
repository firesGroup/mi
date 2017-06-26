<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Entity\comment;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *PS:评价表显示页(查询表名[comment]);
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //查询评价表数据库所有数据
        $data = DB::table('comment')->get();

        //返回视图并传参
        return view('admin.comment.comment', compact('data'));
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd(111);
        $p_id = $request->input('pid');
        $text = $request->text;

        $insert = DB::table('comment')->insert(
          ['id']=>''
        );
//
//        $pid = DB::table('comment')->where('p_id',$p_id)->get();

//        return view('admin.comment.showComment',compact('pid'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //拿到传来的会员信息
        $memberid = DB::table('comment')->where('member_id',$id)->get();


        //取这个会员的商品ID
        $pid = $memberid[0]->p_id;

        //拿到这个会员的所有这个商品的评论
        $comment = DB::table('comment')->where('p_id', $pid)->get();

        //查询会员表取会员ID
        $member = DB::table('member')->where('id',$id)->get();

        return view('admin/comment/showComment',compact('pid','id','comment','member'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
//
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    public function updateStatus(Request $request)
    {
        $cid = $request->input('cid');
        $nid = $request->input('id');
//        dd($id,$cid);
        DB::table('comment')->where('id', $cid)->update(['is_hide'=>$nid]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return DB::table('comment')->delete($id);
    }
}
