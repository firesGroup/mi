<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Entity\Admin;
use App\Entity\AdminGroup;
use App\Entity\AdminRole;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Hash;



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

        $arr = AdminGroup::get();
        foreach ($arr as $k=>$v){
//            dump($v->role_list);
            $str[$k] = explode(',', $v->role_list);

        }

//        dump($str);

        foreach ($str as $i=>$arr){

            dump($arr);
            $role_list[$k] = DB::table('adminrole')->where('id', $arr)->first();
        }

        $status = $this->status;

        $sum = AdminGroup::count('id');

        return view('admin/groupManager/index', compact('data', 'status', 'sum'));
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
