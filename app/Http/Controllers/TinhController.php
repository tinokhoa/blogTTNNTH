<?php

namespace App\Http\Controllers;

use App\Models\Tinh;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TinhController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Tinh::all();
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
        $token=$request->header('token');
        $ten_admin=DB::table('users')->where('token_admin',$token)->get()->value('ten');
        $check_tinh=DB::table('tinh')->where('ten_tinh',$request->tentinh)->get()->first();
        if(is_null($check_tinh))
        {
            Tinh::create(
                [
                    'ten_tinh'=>$request->tentinh,
                    'created_by'=>$ten_admin
                ]
            );
            return response([
                'message'=>'Them tinh thanh cong'
            ]);
        }else{
            return response([
                'message'=>'Khong the them tinh nay'
            ]);
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
        return Tinh::find($id);
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
       $tinh_huyen=DB::table('tinh')->join('huyen','tinh.id','=','huyen.id')
           ->where('tinh,id',$id)->get()->first();
       if(is_null($tinh_huyen))
       {
           DB::table('tinh')->where('id',$id)->delete();
       }else{
           return response([
               'message'=>'Khong the xoa tinh nay'
           ]);
       }
    }
}
