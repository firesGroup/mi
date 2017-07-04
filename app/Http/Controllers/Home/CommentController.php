<?php

namespace App\Http\Controllers\Home;

use App\Entity\Comment;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {



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
//dd($pid);
        if($input != null){
            $bool = Comment::insert([
                'member_id'=>'15',
                'p_id'=>$pid,
                'content'=>$input,
                'type' => '2',
                'comment_id'=> $cid,
                'created_at'=>date('Y:m:d H:i:s')
            ]);
//dd($bool);
            if($bool){
                return $input;
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
        //根据商品ID 查询所有评论
        $data = Comment::where('p_id',$id)->get();

        //根据商品id 拿到商品信息
        $shop = DB::table('product')->where('id',$id)->get();

        //统计评论总数
        $num = DB::table('comment')->count('id');
//        dd($num);

        //拿到所有回复
        $answer = Comment::where('p_id',$id)->where('type',2)->get();

        //查询最新的评论
        $lim = Comment::where('p_id',$id)->paginate(8);

        return view('home.comment.comment',compact('data','shop','lim','num','answer'));
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
}
