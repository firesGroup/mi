<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Home\BaseController;
use App\Entity\Collect;
use DB;

class CollectController extends BaseController
{
    public function ponseral_collect()
    {
        //获取session
        $member_id = session('user_deta')['id'];
        $p_id = DB::table('collect')->lists('p_id');
//        dump($p_id);
//
        $data = DB::table('product')->whereIn('id', $p_id)->get();
//        dd($data);
        return view('home/collect/index', compact('data'));
    }
    public function add_collect(Request $request)
    {
        if(session('user_deta')){
            $member_id = session('user_deta')['id'];
            $p_id = $request->get('product_id');
            $p_list = DB::table('collect')->lists('p_id');
            if(in_array($p_id, $p_list)){
                return 1;
            }
            $data = ['member_id'=>$member_id, 'p_id'=>$p_id];
            if(Collect::create($data)){
                return 0;
            }

        }else{
            return 2;
        }
    }

    public function collect_delete(Request $request)
    {
       $data = $request->all();
        $int = DB::table('collect')->where('p_id', '=', $data['id']);

      if(DB::table('collect')->where('p_id', '=', $data['id'])->delete()){
          return 0;
      }else{
          return 1;
      }
    }
}
