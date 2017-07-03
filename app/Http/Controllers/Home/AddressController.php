<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = DB::table('district')->where('id', '<=', 36)->get();
//        dd($data);

        return view('home/address/index', compact('data'));
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
    }

}
