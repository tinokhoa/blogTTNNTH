<?php

namespace App\Http\Controllers;

use App\Models\Huyen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HuyenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Huyen::all();
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
        $kiemtra_huyen=DB::table('huyen')->where('ten_huyen',$request->tenhuyen)->get()->first();
        if(is_null($kiemtra_huyen))
        {
            Huyen::create(
                [
                    'ten_huyen'=>$request->tenhuyen,
                    'id_tinh'=>$request->tentinh
                ]
            );
            return response([
                'message'=>'Them Huyen thanh cong '
            ]);
        }else{
            return response([
                'message'=>'Them huyen that bai !'
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
