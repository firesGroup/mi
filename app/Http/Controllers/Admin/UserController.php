<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Entity\Admin;
use App\Entity\AdminGroup;
use App\Entity\AdminRole;
use App\Http\Controllers\Controller;
use DB;

class UserController extends Controller
{
    public $status = [0 => '启用', 1 => '锁定'];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('admin')->orderby('id')->paginate(5);
//        dd($data->gid);
//        foreach($data as $k=>$v) {
////            dump($v->gid);
//            $arr[$k] = $v->gid;
//
//        }
//        dump($arr);
//
//        $array = DB::table('admingroup')->where('id',$arr[$k])->select();
//        dump($array);
//
//
//        foreach ($array as $k=>$row) {
////            dump($row);
////            dump($k);
////            dump($row->group_name);
//
//            $group[$k] = $row->group_name;
//        }
////        dump($group);
//
//        $adgroup = array();
//        for ($i=0;$i<count($arr); $i++) {
////            dump($arr[$i]);
////            dump($group[$i]);
//           $adgroup += [$arr[$i] => $group[$i]];
//        }
//
////        dump($adgroup);

        $sum = admin::count('id');
        $status = $this->status;
        return view('admin/userManager/index', compact('data', 'status', 'sum'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $data = adminGroup::get();
//        dd($data);

        return view('admin/userManager/addUser', compact('data', 'arr'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 使用 请求 Request $request->all()
        $data = $request->all();
//        dd($data);
//        dd($data['password']);

        $arr = DB::table('admin')->select('username')->get();

//        dd($arr);

        foreach ($arr as $k => $v) {
            $name[$k] = $v->username;
        }

//        dd($name);
        if (in_array($data['username'], $name)) {
            return back()->with(['success' => '添加失败！！！！！！！']);
        } else {
            $passwd = bcrypt($data['password']);
//        dd($passwd);

            $data['password'] = $passwd;
//        dd($data);

            if (admin::create($data)) {
                return redirect('admin/user')->with(['success' => '添加成功！！！！！！！']);
            } else {
                return back()->withInput();
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
        $status = $this->status;
//        dd(11);
        $data = admin::find($id);
//        dd($data->gid);

        //将管理员表中的gid给一个变量  为了查询所属组信息
        $gid = $data->gid;
        $str = adminGroup::find($gid);
//        dd($str->role_list);

        //查询所属组中的权限id字符串 分割并遍历为数组, 查询到权限信息
        $arr = explode(',', $str->role_list);
//        dd($arr);

        foreach ($arr as $k => $v) {
//            dump($v);
            $group_id[$k] = DB::table('adminrole')->where('id', $v)->first();

            $array = array_merge((array)$group_id);

//            dump($array);

        }
//        dd($array);


        return view('admin/userManager/showUser', compact('data', 'str', 'array', 'status'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $arr = adminGroup::get();
        $data = admin::find($id);
//        dd($data->gid);

        $str = adminGroup::find($data->gid);
        $status = [0 => '启用', 1 => '锁定'];
        return view('admin/userManager/editUser', compact('data', 'status', 'arr', 'str'));
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
//        dd($request->status);
        if (admin::where('id', '=', $id)->update(['username' => $request->username, 'password' => bcrypt($request->password), 'gid' => $request->gid, 'status' => $request->status])) {
//            dd(111);
            return redirect('/admin/user');
        } else {
            return back();
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
        return DB::table('admin')->delete($id);
    }

    public function ajax(Request $request)
    {
//        dd($request->input('username'));
        $name = $request->input('username');

        $username = DB::table('admin')->select('username')->get();
//        dd($username);
        foreach ($username as $k => $v) {
//            dump($v);
            $user[$k] = $v->username;

        }
//        var_dump($user);
        if (in_array($name, $user)) {
            return 1;
        } else {
            return 2;
        }
    }

}
