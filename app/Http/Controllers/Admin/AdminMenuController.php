<?php

namespace App\Http\Controllers\Admin;

use App\Entity\Admin;
use App\Entity\AdminMenu;
use App\Entity\AdminRole;
use Illuminate\Http\Request;
use App\Entity\AdminMenuGroup;
use App\Http\Requests\Admin\AdminMenuRequest;
use App\Http\Controllers\Controller;
use Symfony\Component\Yaml\Tests\A;

class AdminMenuController extends Controller
{
    /*
     * 加载后台首页时返回菜单
     *
     * return json
     * */
    public function getWelcome()
    {

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = AdminMenu::paginate(10);
        return view('admin.menu.index',compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $group = AdminMenuGroup::all();
        //查询所有顶级菜单列表
        $menus = AdminMenu::where('parent_id',0)->get();
        //查询所有权限路由
        $roles = AdminRole::all();
        return view('admin.menu.create', compact('group','menus','roles'));
    }

    /*
     *
     * 获取分级的所有子级
     *
     * @param $category_id int 分类id
     */
    public function getChild($menu_id)
    {
        if( $menu_id == 0 ){
            return 2;
        }
        $childArr = AdminMenu::where('parent_id',$menu_id)->get()->toArray();
        if( $childArr){
            return response()->json($childArr);
        }else{
            return 1;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminMenuRequest $request)
    {
        $data['menu_title'] = $request->menu_title;
        //接收传递的父级id
        $parent_id = $request->parent_id;
        //找出最大的键名
        $key = array_keys($parent_id, max($parent_id));
        //那么选择的父级id为
        $data['parent_id'] = $parent_id[$key[0]];
        //查询父级的父级路径
        if( $data['parent_id']){
            $parent_parent_path = AdminMenu::where('id',$data['parent_id'])->get()->toArray()[0]['parent_path'];
            //那么当前菜单的父级路径为:
            $data['parent_path'] = rtrim($parent_parent_path,',').",".$data['parent_id'].",";
        }else{
            $data['parent_path'] = "0";
        }

        //权限路由id
        if( $request->menu_role_id == 0 || empty($request->menu_role_id) ){
            $data['menu_role_id'] = NULL;
        }else{
            $data['menu_role_id']=$request->menu_role_id;
        }
        //菜单分组id
        $data['menu_group_id'] = $request->menu_group_id;
        //菜单图标
        if( $request->menu_icon ){
            $data['menu_icon'] = $request->menu_icon;
        }
        //菜单状态
        $data['status'] = $request->status;

        //写入
        $res = AdminMenu::create($data);
        return $res ? 0 : 1;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $menu_id
     * @return \Illuminate\Http\Response
     */
    public function show($menu_id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $menu_id
     * @return \Illuminate\Http\Response
     */
    public function edit($menu_id)
    {
        $info = AdminMenu::find($menu_id);
        //查询父级id 与 父类路径
       foreach( $info as $value ){
           $parent_id = $info->parent_id;
       }
       if( $parent_id != 0 ){
           $parent_path = AdminMenu::where('id',$parent_id)->get()[0]->parent_path;
           //获取父类路径逗号个数
           $num = substr_count($parent_path,',');
           if( $num > 1 ){
               //将路径分割为数组
               $ids = explode(',',rtrim($parent_path,','));
               //从1开始循环,因为0 为 分类的根分类 0 ,
               //父类路径中 第一个都为0;
               for( $i=1; $i< $num; $i++ ){
                   //获取菜单的子菜单
                   $cid = $ids[$i];
                   $menus[$i] = $this->getMenuChild($cid);
               }
               $ids[$num] = $parent_id;
           }else{
               $ids[$num] = $parent_id;
           }
       }else{
           $num = 1;
           $ids[1] = 0;
       }

//
//        //获取顶级菜单列表
        $menus[0] = AdminMenu::where('parent_id',0)->get()->toArray();
        $group = AdminMenuGroup::all();
        //获取权限
        $roles = AdminRole::all();

        return view('admin.menu.edit',compact('info','ids','num','menus','roles','group'));
    }


    /*
     *
     * 获取父级菜单的所有子菜单
     *
     * @param $category_id int 菜单id
     */
    public function getMenuChild($menu_id)
    {
        $childArr = AdminMenu::where('parent_id',$menu_id)->get()->toArray();
        return $childArr;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $menu_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $menu_id)
    {
        $data['menu_title'] = $request->menu_title;

        $parent_id = $request->parent_id;
        //传递的选择父级的id数组中,最大的键 的 值才是该菜单的最后父级id
        //找出最大的键,
        $key = max(array_keys($parent_id));
        //获得父级id
        $data['parent_id'] = $parent_id[$key];
        if( $data['parent_id'] != 0 ){
            $parent_path = AdminMenu::where('id',$data['parent_id'])->get()[0]->parent_path;
            $data['parent_path'] = rtrim($parent_path,',').",".$data['parent_id'].",";
        }else{
            $data['parent_path'] = "0,";
        }
        if( $request->menu_role_id == 0 || empty($request->menu_role_id) ){
            $data['menu_role_id'] = NULL;
        }else{
            $data['menu_role_id']=$request->menu_role_id;
        }
        $data['menu_group_id'] = $request->menu_group_id;
        $data['menu_icon'] = $request->menu_icon;
        $data['status'] = $request->status;
        $res = AdminMenu::where('id',$menu_id)->update($data);
        return $res ? 0 : 1;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu = AdminMenu::find($id);
        //查询是否有子类
        $childArr = $this->getMenuChild($id);
        if( $childArr ){
            return 2;
        }else{
            $res = AdminMenu::destroy($id);
            return $res ? 0 : 1;
        }
    }


    public function getMenu(Request $request)
    {
        $position = $request->position;
        if( $position == 'top' ){
            //顶级菜单
            $menus = AdminMenu::where('parent_id',0)->get()->toArray();
            foreach($menus as $k=>$v){
                $data[]=[
                    'title'=>$v['menu_title'],
                    'icon'=>strtolower($v['menu_icon']),
                    'pid'=>$v['id'],
                ];
            }
            return json_encode($data);
        }else if( $position == 'left' ) {
            $pid = $request->pid;
            //获取对应子菜单
            //父级的所有子id;
            $arr1 = AdminMenu::where('parent_id', $pid)->lists('id')->toArray();
            //查询所有子id的信息
            $menus = AdminMenu::where('parent_path', 'like', "%,{$pid}%")->select(['id', 'parent_id', 'menu_title', 'menu_icon'])->get()->toArray();
            foreach ($arr1 as $k => $v) {
                $arr2[$k][$v] = AdminMenu::where('parent_id', $v)->lists('id')->toArray();
            }

            foreach( $arr2 as $key=>$value ){
                if( $value != null ){
                    foreach( $value as $k=>$v ){
                        $info = AdminMenu::where('id',$k)->get();
                        foreach( $info as $in ){
                            $data[$key]=[
                                'title'=>$in->menu_title,
                                'icon'=>strtolower($in->menu_icon),
                                'href'=> isset($in->roleM->role)?\URL::Route(strtolower($in->roleM->role)):'',
                                "spread"=>"true",
                            ];
                        }
                        foreach( $v as $k2=>$v2 ){
                            $info = AdminMenu::where('id',$v2)->get();
                            foreach( $info as $in ){
                                $data[$key]['children'][$k2]=[
                                    'title'=>$in['menu_title'],
                                    'icon'=>strtolower($in['menu_icon']),
                                    'href'=> isset($in->roleM->role)?\URL::Route(strtolower($in->roleM->role),'*'):'',
                                ];
                            }
                        }
                    }
                }else{
                    $info = AdminMenu::where('id',$v)->get()->toArray();
                    foreach( $info as $in ){
                        $data[$key]=[
                            'title'=>$in['menu_title'],
                            'icon'=>strtolower($in['menu_icon']),
                            'href'=> isset($in->roleM->role)?\URL::Route(strtolower($in->roleM->role)):'',
                        ];
                    }
                }
            }

            return json_encode($data);
        }
    }
}
