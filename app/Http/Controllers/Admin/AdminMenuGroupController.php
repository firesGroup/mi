<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Entity\AdminMenuGroup;
use App\Http\Requests\Admin\AdminMenuGroupRequest;
use App\Http\Controllers\Controller;

class AdminMenuGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groupList = AdminMenuGroup::paginate(10);
        return  view('admin.menuGroup.index', compact('groupList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.menuGroup.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminMenuGroupRequest $request)
    {
        $menuGroupName = $request->menu_group_name;
        $res = AdminMenuGroup::create(['menu_group_name'=>$menuGroupName]);
        return $res?0:1;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $info = AdminMenuGroup::find($id);
        return  view('admin.menuGroup.edit',compact('info'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminMenuGroupRequest $request, $id)
    {
        $menuGroupName = $request->menu_group_name;
        $res = AdminMenuGroup::where('id',$id)->update(['menu_group_name'=>$menuGroupName]);
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
        $group = AdminMenuGroup::find($id);
        $menus = $group->menu->toArray();
        if( $menus ){
            return 2;
        }else{
            $res = $group->delete();
            return $res ? 0 : 1;
        }
    }
}
