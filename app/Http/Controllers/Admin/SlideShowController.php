<?php

namespace App\Http\Controllers\Admin;

use App\Entity\SlideShow;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Storage;

use App\Http\Requests;

class SlideShowController extends Controller
{
    public $status = [0=>'启用', 1=>'停用'];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $status = $this->status;
//        dd(1);
        $data = DB::table('slide_show')->select('id', 'images', 'url', 'status')->orderby('id','desc')->paginate(5);
//        dd($data);

        $sum = SlideShow::count('id');
        return view('admin/slideShow/index', compact('data', 'status', 'sum'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/slideShow/addShow');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data['url'] = $request->url;
        $img = $request->images;
        $data['images'] = getUrlImages($img,'slideShow');

        if(SlideShow::create($data)){
            return redirect('admin/slideShow');
        } else {
            return back()->withInput();
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $data = SlideShow::where('id', $id)->select('id', 'images', 'url')->get();
//        dd(json_decode($data));

        //对json格式的字符串编码  得到了数组
        $data = json_decode($data);

//        遍历数组  将遍历后的值赋给新的遍历
        foreach($data as $v) {
//            dd($v);
            $data = $v;
        }

        return view('admin/slideShow/editShow', compact('data'));
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

        $url = $request->url;
        $img = $request->images;

        //获取原来的图片地址
        $oldImg = SlideShow::where('id', $id)->value('images');

        if( $oldImg != '' ){
            //修正地址
            $path = substr($oldImg, 8);
            //删除原图
            Storage::disk('uploads')->delete($path);
        }
        //处理上传的图片 若为远程就下载到本地
        $images = getUrlImages($img,'slideShow');

        if(SlideShow::where('id', $id)->update(['images'=>$images, 'url'=>$url])){
            return redirect('admin/slideShow');
        } else {
            return back();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return DB::table('slide_show')->delete($id);
    }


    public function showStatus(Request $request)
    {
        $data = $request->all();
//        dd($data);
        $id = $request['id'];
//        dd($id);
        $status = $data['Status'];
//        dd($status);
        if($status == 0) {
            SlideShow::where('id', $id)->update(['status'=>0]);
            return 0;
        } else {
            SlideShow::where('id', $id)->update(['status'=>1]);
            return 1;
        }

    }

}
