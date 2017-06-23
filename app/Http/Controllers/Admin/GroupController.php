<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Entity\Admin;
use App\Entity\AdminGroup;
use App\Entity\AdminRole;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;




class GroupController extends Controller
{

    public $status = [0 => '启用', 1 => '锁定'];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('admingroup')->orderby('id')->paginate(5);
//        dump($data);

        //查询权限列表id 和 权限名称
        $list = AdminRole::select('id','role_name')->get();
//        dump($list);

        //将数据遍历
        foreach ($list as $v){
//            dump($v);

            //组成数组
            $arr[$v->id] = $v->role_name;

        }
//        dump($arr);

        $status = $this->status;

        $sum = AdminGroup::count('id');

        return view('admin/groupManager/index', compact('data', 'status', 'sum', 'arr'));
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
        $data = AdminGroup::find($id);
//        dd($data);

        //查询权限列表id 和 权限名称
        $list = AdminRole::select('id','role_name')->get();
//        dump($list);

        //将数据遍历
        foreach ($list as $v){
//            dump($v);

            //组成数组
            $arr[$v->id] = $v->role_name;

        }

        //查询所属组中的权限id字符串 分割并遍历为数组, 查询到权限信息
        $string = explode(',', $data->role_list);
//        dd($arr);

        foreach ($string as $k => $v) {
//            dump($v);
            $group_id[$k] = DB::table('adminrole')->where('id', $v)->first();

//            dd($group_id);
            //将多个数组合并为一个
            $array = array_merge((array)$group_id);

//            dump($array);

        }
//        dd($array);

        $status = $this->status;

        return view('admin/groupManager/showGroup', compact('data', 'status', 'arr', 'array'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //查询出adminrole表里面的id与role_name  并组成一个对应的数组
        $role = DB::table('adminrole')->select('role_name', 'id')->get();
//        dd($role);

        //查出对应的组的信息
        $data = AdminGroup::find($id);
//        dump($data);
//        dump($data->role_list);

        //去除role_list字段里的逗号
        $role_list = explode(',', $data->role_list);
//        dump($role_list);

        //遍历 得到数字
//        $array = array();
        foreach ($role_list as $k=>$v) {
//            dump($v);
//            $array += $v;
            //根据数字查找出权限的内容
            $list[$k] = DB::table('adminrole')->where('id', $v)->first();
        }
//        dump($list);
        $status = $this->status;
        return view('admin/groupManager/editGroup', compact('data', 'role', 'list', 'status', 'role_list'));
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
    public function destroy($id)
    {
        //
    }
}
