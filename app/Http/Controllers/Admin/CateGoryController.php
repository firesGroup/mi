<?php

namespace App\Http\Controllers\Admin;

use App\Entity\CateGory;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\CateGoryRequest;

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
        $data['sort'] = "1";
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

        $res = CateGory::where('sort', '<', $data->sort)->get();


//        CateGory::where()
        return view('admin/category/edit', compact('data', 'res'));
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
//       dump($data);
        if ($data['parent_id'] == 0) {
            return back();
        }
        if (empty($data['cate_id'])) {
            $id = $data['parent_id'];
            $data['parent_path'] = '0,' . $data['parent_id'] . ',';
//            dd($data);
        } else {
            $id = rtrim($data['cate_id'], ',');
            $arr = CateGory::find($id);
//            dump($arr);
            $path = $arr->parent_path;

            $data['parent_path'] = $path . $data['cate_id'];
//            dd($data['parent_path']);
//            dump($data);
//            $array = CateGory::where('parent_path', 'like', '%'.$data['id'] .'%')->get();
//            dd($array);


//                ;
//            dd($data);
            }
//        if ($data['parent_id'] == 0) {
//            return redirect('admin/category')->with(['success'=>'一级分类不允许修改']);
//        }
//          else {
////            if ($data['cate_id'] == '') {
//                $id = $data['parent_id'];
//                $data['parent_path'] = '0,' . $data['parent_id'] ? $data['parent_id'] : '' . ',';
//            } else {


            $m = substr_count($data['parent_path'], ',');
        if(CateGory::where('parent_path', 'like', '%' . $id . '%')->get()){
            return back()->with('error', '该分类不可修改底下有子分类');
        }
            $data['sort'] = $m;
            if (CateGory::where('category_name', '=', $data['category_name'])->update(['category_name' => $data['category_name'], 'parent_id' => $id, 'parent_path' => $data['parent_path'], 'sort' => $m])) {
                return redirect('admin/category');
            };

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $data = CateGory::where('parent_path', 'like', '%' . $id . '%')->get();
//        dump($data);
        if ($data->first()) {
            return 2;
        } else {
            $res = DB::table('category')->delete($id);
            return $res ? 0 : 1;
        }

    }

    public function category_edit(CateGoryRequest $request)
    {
        $data = $request->all();
        if ($data['c_id'] == 0) {
            return 2;
        }
        $all = DB::table('category')->where('parent_id', $data['c_id'])->get();
//        dd($all[0]->id);

//       $res = DB::table('category')->where('parent_id', $data['id'])->lists('id');
//       $all = array_merge($all,$res);
        if ($all == []) {
            return 1;
        } else {
            return $all;
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
        $m = substr_count($number, ',') + 1;
        $data['parent_path'] = $data['parent_path'] . $data['parent_id'] . ',';

        $data['sort'] = $m;
        if (CateGory::create($data)) {
            return redirect('admin/category');
        } else {
            return back();
        }
    }
}
