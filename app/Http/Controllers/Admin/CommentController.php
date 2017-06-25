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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $commentid = DB::table('comment')->where('member_id',$id)->get();

        foreach ($commentid as $v){
            $mid = $v->member_id;
        }

        $memberid = DB::table('member')->where('id',$mid)->get();
        dump($commentid);
        return view('admin/comment/showComment',compact('commentid','memberid'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        dd(11);
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
