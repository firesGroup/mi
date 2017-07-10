<?php

namespace App\Http\Controllers\Admin;

use App\Entity\CateGory;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;
use App\Entity\Product;
use App\Http\Requests\Admin\CateGoryRequest;

class CateGoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $map = "concat(parent_path,id)";
            $modelId = $request->input('word',null);

            $data = CateGory::where('category_name','like',"%{$modelId}%")->orderBy(DB::raw('concat(parent_path,id)'))->paginate(15);
//            dd($data);
        }else{
            $map = "concat(parent_path,id)";
            $data = DB::table('category')->orderBy(DB::raw('concat(parent_path,id)'))->paginate(15);
        }
        return view('admin/category/index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/category/create_category_parent');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CateGoryRequest $request)
    {
        $data = $request->all();
//        dump($data);
        $data['parent_id'] = '0';
        $data['parent_path'] = "0,";
        $data['status'] = 1;
        if (CateGory::create($data)) {
            return redirect('admin/category');

        } else {

            return back()->withErrors();
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = CateGory::find($id);
        $m = substr_count($data->parent_path, ',') - 1;
//        dd($data);

//        $res = CateGory::where('sort', '<', $data->sort)->get();

        //第一次查询出所有的 顶级分类
        $res = CateGory::where('parent_id',0)->get();

//        CateGory::where()

        return view('admin/category/edit', compact('id','data', 'res'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CateGoryRequest $request, $id)
    {
        $data = $request->all();
//        dd((int)$data['status']);
        $a= "";
        foreach ($data['category'] as $k=>$v) {
            if($v == 0){
                continue;
            }

            if($data['cate_id']== ''){

            }
                $a .= ','.$v;
        }
        $a ='0'.$a.',';
        $array = explode(',', rtrim($a,','));

        $num = CateGory::where('parent_id','like','%'.$data['id'].'%')->get()->toArray();
        $product =    Product::where('category_id','=', $id)->get()->toArray();
        if($num != []){
            return back()->with(['error'=>'底下有子分类不能移动']);
        } elseif($product != []){
            return back()->with(['error'=>'该分类底下有商品, 不能移动']);
        }

       if( CateGory::find($data['id'])->update(['parent_path'=>$a, 'parent_id'=>end($array), 'status' => 0, 'category_name'=>$data['category_name']])){
           return redirect('admin/category');
       }



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $data = CateGory::where('parent_path', 'like', '%' . $id . '%')->get()->toArray();

            $num =    Product::where('category_id','=', $id)->get()->toArray();
//            dd($num);

        if($data == []){
            if($num == [] ){
                $res = DB::table('category')->delete($id);
                return $res ? 0 : 1;
            }else{
                return 3;
            }

        }else{
            return 2;
        }

    }

    public function category_edit(CateGoryRequest $request)
    {
        $id = $request->id;
        $c_id = $request->c_id;
        dd($id);
        if ($c_id == 0) {
            return 2;
        }else{
            $all =CateGory::where('parent_id', $c_id)->get()->toArray();


            if ($all) {
                return response()->json($all);
            } else {
                return 1;
            }
        }



    }


    public function create_category(CateGoryRequest $request, $id)
    {
        $data = Category::find($id);

        return view('admin/category/add_category_child', compact('data'));
    }


    public function add_category(CateGoryRequest $request)
    {
        $data = $request->all();
//        dump($data);
        $arr = CateGory::where('id', $data['parent_id'])->get();
        $number = $arr['0']->parent_path;
        $data['parent_path'] = $data['parent_path'] . $data['parent_id'] . ',';

        $data['status'] = 1;
//        dd($data);
        if (CateGory::create($data)) {
            return redirect('admin/category');
        } else {
            return back();
        }
    }



}
