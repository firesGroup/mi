<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Entity\Admin;
use App\Entity\AdminGroup;
use App\Entity\AdminRole;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;


class RoleController extends Controller
{
    public $status = [0 => '启用', 1 => '锁定'];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        dd(1);
        $status = $this->status;

        //查询出所有权限内容
        $data = DB::table('admin_role')->orderby('id')->paginate(15);
//        dump($data);

        //统计总条数
        $sum = AdminRole::count('id');
//        dd($sum);

        return view('admin/roleManager/index', compact('data', 'status', 'sum'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        dd(1);
        return view('admin/roleManager/addRole');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd(1);

        //获取到用户提交的所有字段
        $data = $request->all();

        //拿出里面的权限名 和  权限方法  与数据库中的进行比对
        $roleName = $data['role_name'];
        $role = $data['role'];
//        dump($roleName);
//        dump($role);

        //获取到数据库所有权限名 和  权限方法
        $arrRoleName = DB::table('admin_role')->lists('role_name');
//        dump($arrRoleName);
        $arrRole = DB::table('admin_role')->lists('role');
//        dump($arrRole);

        //判断是否可以添加
        if (in_array($roleName, $arrRoleName) || in_array($role, $arrRole)) {

            //数据库已存在权限名或方法
            return back()->with(['success' => '权限名或权限方法已存在, 添加失败！！！！！！！'])->withInput();
        } else {

            if (AdminRole::create($data)) {

                return redirect('admin/role')->with(['success' => '添加成功！！！！！！！']);
            }
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

        $status = $this->status;
//        dd(1);

        //查询出对应id的所有信息
        $data = DB::table('admin_role')->where('id', $id)->get();
//        dd($data);

        return view('admin/roleManager/showRole', compact('data', 'status'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
//        dd(1);

        $data = AdminRole::find($id);
//        dd($data->id);

        $status = $this->status;

        return view('admin/roleManager/editRole', compact('data', 'status'));
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
//        dd($request->all());
        //获取用户提交的所有信息
        $data = $request->all();

        //拿到输入的权限名  权限方法
        $role_name = $data['role_name'];
        $role = $data['role'];
//        dump($role_name);
//        dump($role);

        //查询到当前id对应的权限名 和  权限方法
        $array = AdminRole::where('id', $id)->select('role_name', 'role')->get();
//        dump($array);
        foreach ($array as $item) {
//            dump($item->role_name);
            $idRoleName = $item->role_name;
            $idRole = $item->role;
        }

        //查询出所有的权限名和 权限方法
        $arr = AdminRole::select('role_name', 'role')->get();
//        dump($arr);

        foreach($arr as $k=>$v) {
            $arrName[$k] = $v->role_name;
            $arrRole[$k] = $v->role;
        }
//        dump($arrName);
//        dump($arrRole);

        //判断修改是否可以成功
        if (($role_name !== $idRoleName && in_array($role_name, $arrName)) || ($role !== $idRole && in_array($role, $arrRole))) {
//            dd(1);
            //修改不成功
            return back()->with(['success' => '相同的权限名或方法, 修改失败！！！！！！！']);
        } else {

            //修改成功
            if (AdminRole::where('id', '=', $id)->update(['role_name' => $request->role_name, 'role' => $request->role, 'role_desc' => $request->role_desc, 'status' => $request->status])) {
//
                return redirect('/admin/role');
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
       $role = AdminRole::find($id);
       //查找所有包含这个权限的组
        $groups = AdminGroup::where('role_list','like',"%{$id}%")->get();
        foreach($groups as $k=>$group){
            $role_list = $group->role_list;
            $gid = $group->id;
            //清除两边逗号
            $role_list = trim($role_list,',');
            //分隔
            $roles = explode(',',$role_list);
            foreach( $roles as $key=>$v ){
                if( $v == $id ){
                    unset($roles[$key]);
                }
            }
            //重组
            $newRoles = implode(',',$roles);
            AdminGroup::where('id',$gid)->update(['role_list'=>$newRoles]);
        }
        $re = AdminRole::destroy($id);
        return $re ? 0 : 1;

    }

    public function ajaxRoleName(Request $request)
    {
        $data = AdminRole::select('role_name')->get();
//        dd($data);

        //获取用户输入的权限名
        $name = $request->roleName;
//        dd($name);

        //遍历出所有权限名  组成数组
        foreach ($data as $k=>$v){
//            dump($v->role_name);
            $arr[$k] = $v->role_name;
        }
//        dump($arr);

        //判断用户输入的权限名是否已经存在
        if(in_array($name, $arr)){
            return 1;
        } else {
            return 2;
        }
    }

    public function ajaxRole(Request $request)
    {
        //获取用户输入的权限方法
        $role = $request->role;
//        dd($role);

        //获取所有权限方法
        $data =AdminRole::select('role')->get();
//        dd($data);

        //遍历出所有权限  组成数组
        foreach ($data as $k=>$v){
            $arr[$k] = $v->role;
        }
//        dd($arr);

        //判断输入的权限是否已经存在
        if(in_array($role, $arr)) {
            return 1;
        } else {
            return 2;
        }

    }


}
