<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Entity\FriendLink;
use DB;

class FriendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = FriendLink::orderby('id')->paginate(8);
        return view('admin.friendLink.friend',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.friendLink/addFriend');
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

        if(FriendLink::create($data)){
            return redirect('admin/friend');
        } else{
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
        $data = FriendLink::find($id);
//        dd($data);
        $data = json_decode($data);
//        dd($data->id);
        return view('admin/friendLink/editFriend',compact('data'));
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

        $name = $request->link_name;
        $url = $request->link_url;
        $order = $request->order;

        $data = DB::table('friend_link')->where('id',$id)->update(['link_name'=> $name,'link_url'=> $url,'order'=>$order]);
//        dd($data);

        if($data) {
            return redirect('admin/friend');
        } else {

            return back();
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
        return DB::table('friend_link')->delete($id);
    }


    public function updateStatus (Request $request)
    {
        $id = $request->id;
//        dd($id);

        $status = $request->status;

        if($status == 0) {

            DB::table('friend_link')->where('id',$id)->update(['hide'=>0]);

            return 0;
        } else {

            DB::table('friend_link')->where('id',$id)->update(['hide'=>1]);
            return 1;

        }


    }
}