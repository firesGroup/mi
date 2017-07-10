<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Home\BaseController;
use App\Entity\Address;
use Session;

class AddressController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (session('user_deta')) {
//            dd(session('user_deta'));
            $id = session('user_deta')['id'];
            $userArr = DB::table('member')->where('id', '=', $id)->select('nick_name')->get();
//        dd($userArr[0]->nick_name);
//        dd($userArr);
            $UserArr = $userArr[0]->nick_name;


            $userAdd = DB::table('address')->where('member_id', '=', $id)->select('member_id', 'buy_user', 'buy_phone', 'address')->get();
//        dd($userAdd);


            $data = DB::table('district')->where('id', '<=', 36)->get();
//        dd($data);

            return view('home/address/index', compact('data', 'UserArr', 'userAdd'));

        } else {
            return redirect('login');
        }

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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function provices(Request $request)
    {
        $arr = $request->all();
//        dd($arr);

        $id = $arr['id'];
//        dd($id);

        $data = DB::table('district')->where('upid', $id)->get();
//        dd($data);

        return $data;

    }

    public function cities(Request $request)
    {
        $arr = $request->all();
//        dd($data);

        $id = $arr['id'];
//        dd($id);

        $data = DB::table('district')->where('upid', $id)->get();
//        dd($data);

        return $data;

    }

    public function addAddress(Request $request)
    {
        $data = $request->all();
//        dd($data);
        $arr = $data['arr'];

        $buy_user = $arr[0];
//        dd($buy_user);

        $buy_phone = $arr[1];
        $address = $arr[2] . $arr[3];
//        dd($address);

        $member_id = session('user_deta')['id'];
//        dd(session('user_deta'));
        $memberAddress = DB::table('address')->where('member_id', $member_id)->lists('address');
        if ($memberAddress) {

            DB::update('update address set status = 1 where member_id = ?', [$member_id]);

            $array = ['member_id' => $member_id, 'buy_user' => $buy_user, 'buy_phone' => $buy_phone, 'address' => $address, 'status' => 0];

            if (Address::create($array)) {
                return 1;
            } else {
                return 2;
            }

        } else {
            $array = ['member_id' => $member_id, 'buy_user' => $buy_user, 'buy_phone' => $buy_phone, 'address' => $address, 'status' => 0];

            if (Address::create($array)) {
                return 1;
            } else {
                return 2;
            }

        }


//        dd($array);


    }

}
