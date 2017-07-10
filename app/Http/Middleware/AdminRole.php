<?php

namespace App\Http\Middleware;

use Closure;
use App\Entity\AdminRole as Role;
use App\Entity\AdminGroup;

class AdminRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //获取session中的管理员信息
        $adminInfo = session('adminInfo');
        //管理员id
        $id = $adminInfo['id'];
        //管理员所属权限组id
        $gid = $adminInfo['group_id'];
        //获取该权限组的权限列表
        $role_list = AdminGroup::where('id',$gid)->lists('role_list')->toArray()[0];
        $role_list = explode(',', trim($role_list,','));
        //拿出 id与路由
        foreach( $role_list as $k=>$role_id ){
            $role = Role::where('id',$role_id)->lists('role')->toArray();
            foreach( $role as $v ){
                $roleArr[]=\URL::Route(strtolower($v));
            }

        }
        //获取当前的url
        $url = $request->url();
        if( in_array( $url, $roleArr ) ){
            return $next($request);
        }else{
            return \Response::view('errors.confirm');
        }
    }
}
