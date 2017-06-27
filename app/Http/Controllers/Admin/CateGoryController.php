<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Entity\CateGory;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
class CateGoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $map = "concat(parent_path,id)";
        $data = DB::table('category')->orderBy(DB::raw('concat(parent_path,id)'))->paginate(7);


        return view('admin/category/index', compact('data'));
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
        $data = CateGory::find($id);
        $m = substr_count($data->parent_path, ',') - 1;
//        dump($data);

            $res = CateGory::where('sort','<' , $data->sort)->get();





//        CateGory::where()
        return view ('admin/category/edit', compact('data', 'res'));
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
        $data = $request->all();
        dump($data);
//        $data['parent_path'] = '0,'.$data['parent_id'].','.$id?$id:'';
        $m = substr_count($data['parent_path'], ',') - 1;
        dump($m);
        switch ($m)
        {
            case 0:
                $sort = '1';
                break;
            case 1:
                $sort = '2';
                break;
            case 2:
                $sort = '3';
                break;
            case 3:
                $sort = '4';
                break;
        }
        $data['sort']= $sort;
        dd($data);

        if(CateGory::find($id)->update($data)){
            return redirect('admin/category');
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $data = CateGory::where('parent_path','like','%'.$id.'%')->get();
//        dump($data);
       if($data->first()){
           return 2;
       }else{
            $res = DB::table('category')->delete($id);
            return $res?0:1;
       }

    }

    public function category_edit (Request $request)
    {
       $data =  $request->all();

       $all = DB::table('category')->where('parent_id', $data['c_id'])->get();
//        dd($all[0]->id);

//       $res = DB::table('category')->where('parent_id', $data['id'])->lists('id');
//       $all = array_merge($all,$res);
        if($all == []){
            return 1;
        }else{
            return $all;
        }


    }
}
