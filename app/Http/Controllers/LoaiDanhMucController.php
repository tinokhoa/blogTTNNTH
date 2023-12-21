<?php

namespace App\Http\Controllers;

use App\Models\LoaiDanhmuc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoaiDanhMucController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return LoaiDanhmuc::all();
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
        $check_loaidanhmuc=DB::table('loai_danhmuc')->where('ten_loai',$request->tenloai)->get()->first();
        $check_danhmuc=DB::table('danhmuc')->where('id',$request->id_danhmuc)->get()->first();
        $token=$request->header('token');
        $ten_admin=DB::table('users')->where('token_admin',$token)->get()->value('ten');
        if(is_null($check_danhmuc)){
            return response([
                'message'=>'Khong ton tai danh muc nay !'
            ]);
        }else if(is_null($check_loaidanhmuc)){
            LoaiDanhmuc::create(
                [
                    'id_danhmuc'=>$request->id_danhmuc,
                    'ten_loai'=>$request->tenloai,
                    'created_by'=>$ten_admin
                ]
            );
            return response([
                'message'=>'Them Thanh Cong'
            ]);
        }else{
            return response(
                [
                    'message'=>'Da Ton Tai Loai Danh Muc Nay'
                ]
            );
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
        $kiemtra_loaidanhmuc=DB::table('loai_danhmuc')->where('ten_loai',$request->tenloai)->get()->first();
        $token=$request->header('token');
        $ten_admin=DB::table('users')->where('token_admin',$token)->get()->value('ten');
        if (is_null($kiemtra_loaidanhmuc))
        {
            DB::table('loai_danhmuc')->where('id',$id)->update(
                [
                    'ten_loai'=>$request->tenloai,
                    'id_danhmuc'=>$request->id_danhmuc,
                    'updated_by'=>$ten_admin
                ]
            );
            return response([
                'message'=>'Cap nhat thanh cong'
            ]);
        }
        else{
            return response([
                'message'=>'Cap nhat khong thanh cong'
            ]);
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
        DB::table('loai_danhmuc')->where('id',$id)->delete();
        return response(
            [
                'message'=>'Xoa thanh cong !'
            ]
        );
    }
}
