<?php

namespace App\Http\Controllers\Admin;

use App\Entity\Advert;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;


class AdvertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $array =  DB::table('advert_location')->lists('desc', 'id');
        $data = Advert::orderby('id', 'desc')->paginate(5);
        return view('admin/advert/index', compact('data', 'array'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = DB::table('advert_location')->get();
        return view('admin/advert/add', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $data = $request->all();

//        dd($data);
      if(Advert::create($data)){
          return redirect('admin/advert');
      }else{
          return back();
      }

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
        $data = Advert::find($id);
        $advert = DB::table('advert_location')->get();

//       dd($data);
        return view('admin/advert/edit', compact('data', 'array', 'advert'));
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
        $data = $request->all();
        if(Advert::find($id)->update($data)){
            return redirect('admin/advert');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      if (DB::table('advert')->delete($id)){
          return 0;
      }
    }

    public function showStatus(Request $request)
    {
        $data = $request->all();
//        dd($data);
        $id = $request['id'];
//        dd($id);
        $status = $data['Status'];
//        dd($status);
        if($status == 0) {
            Advert::where('id', $id)->update(['status'=>0]);
            return 0;
        } else {
            Advert::where('id', $id)->update(['status'=>1]);
                return 1;

        }

    }

}
