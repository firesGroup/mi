<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Entity\Address;
use Session;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $userArr = DB::table('member')->where('id', '=', 1)->select('nick_name')->get();
//        dd($userArr[0]->nick_name);

        $UserArr = $userArr[0]->nick_name;


        $userAdd = DB::table('address')->where('member_id', '=', 1)->select('member_id', 'buy_user', 'buy_phone', 'address')->get();
//        dd($userAdd);


        $data = DB::table('district')->where('id', '<=', 36)->get();
//        dd($data);

        return view('home/address/index', compact('data', 'UserArr', 'userAdd'));
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

    public function Provices(Request $request)
    {
        $arr = $request->all();
//        dd($data);

        $id = $arr['id'];
//        dd($id);

        $data = DB::table('district')->where('upid', $id)->get();
//        dd($data);

        return $data;

    }

    public function Cities(Request $request)
    {
        $arr = $request->all();
//        dd($data);

        $id = $arr['id'];
//        dd($id);

        $data = DB::table('district')->where('upid', $id)->get();
//        dd($data);

        return $data;

    }

    public function AddAddress(Request $request)
    {
        $data = $request->all();
        dd($data);
        $arr = $data['arr'];

        $buy_user = $arr[0];
//        dd($buy_user);

        $buy_phone = $arr[1];
        $address = $arr[2].$arr[3];
//        dd($address);

        $member_id = $data['id'];
//        dd($id);

        $array = ['member_id'=>$member_id, 'buy_user'=>$buy_user, 'buy_phone'=>$buy_phone, 'address'=>$address, 'status'=>1];

//        dd($array);

        if (Address::create($array)) {
            return 1;
        } else {
            return 2;
        }


    }

}
