<?php

namespace App\Http\Controllers\Home;

use App\Entity\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Home\BaseController;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Entity\OrderDetail;
use DB;

class CommentController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function commentIndex($id)
    {

        //查询订单所有信息
        $order = DB::table('order')->where('member_id',$id)->get();

        //查出订单ID
        $odetail = DB::table('order')->where('member_id',$id)->lists('id');

        //查出订单详情信息
        $orderdetail = OrderDetail::whereIn('order_id',$odetail)->get();

        return view('home.comment.shopComment',compact('order','orderdetail'));


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
        $input = $request->input;
        $cid = $request->cid;
        $pid = $request->pid;

        if($input != null){
            $bool = Comment::insert([
                'member_id'=>session('user_deta')['id'],
                'p_id'=>$pid,
                'content'=>$input,
                'type' => '2',
                'comment_id'=> $cid,
                'created_at'=>date('Y:m:d H:i:s')
            ]);
            $name = session('user_deta')['nick_name'];
            $msg = ['content'=>$input, 'name' => $name];
            if($bool){
                return $msg;
//                return redirect('comment/'.$pid);
            } else {
//                echo "<script>alert('回复失败')</script>";
                return 1;
            }
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
        if(session('user_deta')){
            //根据商品ID 查询所有评论
            $data = Comment::where('p_id',$id)->orderby('id','desc')->get();

            //
            $images = Comment::where('p_id',$id)->lists('images');

            //根据商品id 拿到商品信息
            $shop = DB::table('product')->where('id',$id)->get();

            //统计评论总数
            $num = DB::table('comment')->count('id');
    //        dd($num);

            //拿到所有回复
            $answer = Comment::where('p_id',$id)->where('type',2)->get();

            //查询最新的评论
            $lim = Comment::where('p_id',$id)->get();

            return view('home.comment.comment',compact('data','shop','lim','num','answer','images'));
        } else {

            return redirect('login');
        }
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function commentshop(Request $request)
    {
        $text = $request->text;

        preg_match_all('/src="(.+?)"/', $text, $images);


        $src = implode(',',$images[1]);

        $arr = explode("<img",$text);

        $pid = $request->pid;

        $mid = $request->mid;

        $oid = $request->oid;

        $data = DB::table('comment')
            ->where('memeber_id',$mid)
            ->where('p_id',$pid)
            ->insert([
                'member_id'=>$mid,
                'p_id'=>$pid,
                'content'=>$arr[0],
                'images'=>$src,
                'type'=>0,
                'created_at'=>date('Y-m-d H:i',time()),
            ]);

            if($data){


                //改变订单详情里面的商品评论状态
                DB::table('order_detail')
                    ->where('order_id',$oid)
                    ->where('p_id',$pid)
                    ->update(['comment_status'=>0]);
                return redirect('comment/'.$pid);

            } else {
                echo "<srcipt>alert('评论失败,请重新评论');</srcipt>";

            }





    }
}
