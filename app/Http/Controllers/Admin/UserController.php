<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Entity\Admin;
use App\Entity\AdminGroup;
use App\Entity\AdminRole;
use App\Http\Controllers\Controller;
use DB;
use Hash;
use Session;

class UserController extends Controller
{
    //公用属性
    public $status = [0 => '启用', 1 => '锁定'];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //查询出管理员表所有信息 排序并分页
        $data = DB::table('admin')->orderby('id')->paginate(5);

        //查询出权限组信息
        $group = DB::table('admin_group')->get();
//        dump($group);

        $group_name = array();
        foreach ($group as $v) {
//            dump($v->id);

            //将权限组id和权限名组成数组
            $group_name += [$v->id => $v->group_name];
        }
//        dump($arr);

        //统计管理员个数
        $sum = Admin::count('id');
        $status = $this->status;
        return view('admin/userManager/index', compact('data', 'status', 'sum', 'group_name'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $data = AdminGroup::get();
//        dd($data);

        return view('admin/userManager/addUser', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //拿到用户输入的所有信息
        // 使用 请求 Request $request->all()
        $data = $request->all();
//        dd($data);
//        dd($data['password']);

        //查询出管理员表的username字段
        $arr = DB::table('admin')->select('username')->get();

//        dd($arr);

        foreach ($arr as $k => $v) {

            //将拿到的信息变成数组
            $name[$k] = $v->username;
        }

//        dd($name);

        //判断用户输入的用户名是否在数据库中, 存在则不能添加, 不存在可以添加
        if (@in_array($data['username'], $name)) {
            return back()->with(['success' => '添加失败！！！！！！！']);
        } else {

            //对密码加密
            $passwd = bcrypt($data['password']);
//        dd($passwd);

            //获取ip地址
            $last_ip = $_SERVER["REMOTE_ADDR"];
//            dd($last_ip);


            //获取当前时间
            $time = date('Y-m-d H:i:s', time());
//            dd($time);

            //替换掉data数组中的密码字段  让纯数字变成密文
            $data['password'] = $passwd;
//        dd($data);

            //将ip与时间变成数组 并与data数组合并
            $arr = array('last_ip' => $last_ip) + array('last_time' => $time) + $data;

//            dd($arr);

            //执行添加
            if (Admin::create($arr)) {
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
        //获取公用属性
        $status = $this->status;
//        dd(11);

        //根据id查询管理员表
        $data = Admin::find($id);
//        dd($data->gid);

        //将管理员表中的group_id给一个变量  为了查询所属组信息
        $gid = $data->group_id;
        $str = AdminGroup::find($gid);
//        dd($str->role_list);

        //查询所属组中的权限id字符串 分割并遍历为数组, 查询到权限信息
        $arr = explode(',', $str->role_list);
//        dd($arr);

        foreach ($arr as $k => $v) {
//            dump($v);
            $group_id[$k] = DB::table('admin_role')->where('id', $v)->first();


            //将多个数组合并为一个
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

        //获取管理员和权限组的信息
        $arr = AdminGroup::get();
        $data = Admin::find($id);
//        dd($data->group_id);


        //根据管理员对应的权限组 查询权限组的信息
        $str = AdminGroup::find($data->group_id);
        $status = $this->status;
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
        //获取用户提交的旧密码
        $oldpassword = $request->oldPassword;

        //获取用户输入的用户名
        $username = $request->username;

//        dump($username);

        //查询对应管理员所对应的密码字段
        $arr = DB::table('admin')->where('id', $id)->select('password', 'username')->get();

        $data = Admin::get();
//        dd($data);

        foreach ($data as $k => $v) {
            $uname[$k] = $v->username;
        }
//        dump($uname);

        //取出密码字段
        $pass = $arr[0]->password;
        $name = $arr[0]->username;
//        dd($name);

        if( $username !== $name ){
            if( in_array($username,$uname) ){
                return back()->with(['success' => '用户名已存在, 修改失败！！！！！！！']);
            }
        }
        //如果旧密码存在
        if( $oldpassword !== '' ){
            //哈希校验  密码相同则可以修改
            if (Hash::check($oldpassword, $pass)) {

                if (Admin::where('id', '=', $id)->update(['username' => $request->username, 'password' => bcrypt($request->newPassword), 'group_id' => $request->group_id, 'status' => $request->status])) {
//
                    //判断 如果修改的管理员是当前登陆的管理员
                    //则重新登陆

                    $adminInfo = session('adminInfo');
                    if( $adminInfo['id'] == $id  ){
                        $request->session()->forget('adminInfo');
                        return redirect('/admin/login');
                    }else{
                        return redirect('/admin/user');
                    }

                } else {
                    return back();
                }

            } else {
                //密码不同
                return back()->with(['success' => '旧密码错误！！！！！！！']);
            }
        }else{
            //修改
            if (Admin::where('id', '=', $id)->update(['username' => $request->username, 'group_id' => $request->group_id, 'status' => $request->status])) {
//
                $adminInfo = session('adminInfo');
                if( $adminInfo['id'] == $id  ){
                    $request->session()->forget('adminInfo');
                    return redirect('/admin/login');
                }else{
                    return redirect('/admin/user');
                }
            } else {
                return back();
            }
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
        //获取用户输入的用户名
        $name = $request->input('username');

        //查出管理员表中的用户名
        $username = DB::table('admin')->select('username')->get();
//        dd($username);

        //遍历 并将其变为数组
        foreach ($username as $k => $v) {
//            dump($v);
            $user[$k] = $v->username;

        }
//        var_dump($user);

        //判断用户名是否相同
        if (in_array($name, $user)) {

            //相同 不能添加
            return 1;
        } else {

            //不相同 可以添加
            return 2;
        }
    }

    /**
     * @param Request $request
     * @return int
     */
    public function ajaxPassword(Request $request)
    {
        //获取用户输入的密码  获取的当前用户的id
        $password = $request->input('password');
//        var_dump($password);
        $id = $request->input('id');

        $username = $request->input('username');

        //查询出管理员表的username字段
        $arr = DB::table('admin')->select('username')->get();

        //根据id查询出管理员的密码
        $data = DB::table('admin')->where('id', $id)->select('password')->get();
//        dd($data);
//        dd($data[0]->password);


        foreach ($arr as $k => $v) {

            //将拿到的信息变成数组
            $str[$k] = $v->username;
        }

        if (in_array($username, $str)) {
            return 1;
        } else {

//            return 2;

            $pass = $data[0]->password;

            if (Hash::check($password, $pass)) {
                // The passwords match...

                return 2;
            } else {
                return 1;
            }
        }

//        dd($pass);

    }

    public function ajaxName(Request $request)
    {
        $name = $request->input('username');

        //查出管理员表中的用户名
        $username = DB::table('admin')->lists('username');
//        dd($username);

        //判断用户名是否相同
        if (in_array($name, $username)) {

            //相同 存在用户名
            return 1;
        } else {

            //不相同 用户名不存在
            return 2;
        }
    }


}
