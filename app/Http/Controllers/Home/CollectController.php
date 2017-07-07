<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Entity\Collect;
use DB;

class CollectController extends Controller
{
    public function ponseral_collect()
    {
        $member_id = session('user_deta')['id'];
        $p_id = DB::table('collect')->lists('p_id');
//
        return view('home/collect/index');
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
            return redirect('login');
        }
    }
}
