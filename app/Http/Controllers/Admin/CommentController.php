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
        $data = DB::table('comment')->paginate(6);



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

//
//        $pid = DB::table('comment')->where('p_id',$p_id)->get();

//        return view('admin.comment.showComment',compact('pid'));
    }

    public function insert (Request $request)
    {

        $text = $request->text;


        if($text != null){
        $bool= DB::table('comment')->insert([
            'member_id'=> '4',
            'p_id'=>$request->id,
            'content' => $request->text,
            'elite' => 1,
            'type'=> 2,
            'created_at'=> date('Y-m-d H:i:s')
        ]);

            if($bool) {
                return redirect('admin/comment/'.$request->member_id);
            } else {
              echo "<script>alert('回复失败!')</script>";
                return redirect('admin/comment/');
            }
        }else {

            echo "<script>alert('回复不能为空!')</script>";
            return redirect('admin/comment/'.$request->member_id);

        }
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
        $pid = DB::table('comment')->where('member_id',$id)->value('p_id');

        $cid = DB::table('comment')->where('member_id',$id)->value('id');
//dd($cid);
        $reply = DB::table('reply_comment')->where('comment_id',$cid)->get();

//        dd($reply);
        //取这个会员的商品ID
//        $pid = $memberid[0]->p_id;
        //拿到这个会员的所有这个商品的评论
        $comment = DB::table('comment')->where('p_id', $pid)->get();

//        $a = array_merge($reply,$comment);
//dd($a);
        //查询会员表取会员ID
        $member = DB::table('member')->where('id',$id)->get();

        return view('admin/comment/showComment',compact('pid','id','comment','member','reply'));
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
