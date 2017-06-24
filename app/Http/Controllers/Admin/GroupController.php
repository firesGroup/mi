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
        $data = DB::table('admin_group')->orderby('id')->paginate(5);
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
            $group_id[$k] = DB::table('admin_role')->where('id', $v)->first();

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
        //查询出admin_role表里面的id与role_name  并组成一个对应的数组
        $role = DB::table('admin_role')->select('role_name', 'id')->orderby('id')->get();
//        dd($role);

        //查出对应的组的信息
        $data = AdminGroup::find($id);
//        dump($data);
//        dd($data->role_list);

        //去除role_list字段里的逗号
        $role_list = explode(',', $data->role_list);
//        dump($role_list);

        $status = $this->status;
        return view('admin/groupManager/editGroup', compact('data', 'role', 'status', 'role_list'));
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
        //获取到管理员修改组的所有信息
        $data = $request->all();
        //dd($data);

        $groupName = $data['group_name'];

        //拿到权限组表的组名
        $gName = AdminGroup::select('group_name')->get();
//        dd($roleName);

        //定义一个空数组  将拿到的组名遍历 并将值组成一个数组
        $arrName = array();
        foreach ($gName as $k=>$name){
//            dump($name['role_name']);
            $arrName[$k] = $name['group_name'];
        }
//        dump($arrName);

        //查询出于对于$id的组名
        $arr = DB::table('admin_group')->where('id', $id)->select('group_name')->get();
//        dump($arr);
        $GroupName = $arr[0]->group_name;
//        dump($GroupName);

        //拿出其中的权限表的id号 遍历 然后 将值组成字符串
        $roleId = $data['role_list'];
//        dump($roleId);
        $str = '';
        foreach ($roleId as $v){
//            dump($v);
            $str .= $v.',';
        }
//        dump($str);
        $rList = rtrim($str, ', ');
//        dump($rList);

        //判断用户输入的组名是否属于当前组名  并判断是否与已有的组名相同
        if($groupName !== $GroupName && in_array($groupName, $arrName)) {

            //组名存在 不成功
            return back()->with(['success' => '组已存在, 修改失败！！！！！！！']);
        } else {

            //不存在 写进数据库
            if (AdminGroup::where('id', '=', $id)->update(['group_name' => $request->group_name, 'role_list' => $rList, 'group_desc' => $request->group_desc, 'status' => $request->status])) {
//
                return redirect('/admin/group');
            } else {
                return back();
            }
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
        //
    }

    public function groupAjax(Request $request)
    {
//        dd(1);
        //获取用户输入的组名
        $data = $request->input('groupName');
//        dd($data);

        //查询出所有组名
        $group_name = DB::table('admin_group')->select('group_name')->get();
//        dump($group_name);

        //遍历组名  变组成数组
        foreach ($group_name as $k=>$v){
            $list[$k] = $v->group_name;
        }

//        dump($list);
        if (in_array($data, $list)) {
            //表示存在 返回给ajax处理
            return 1;
        } else {
            return 2;
        }

    }


}
