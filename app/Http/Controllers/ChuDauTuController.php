<?php

namespace App\Http\Controllers;

use App\Models\ChuDautu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChuDauTuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $chudautu =DB::table('chu_dautu')->get();
        return view('chudautu', compact('chudautu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('themchudautu');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $check = ChuDautu::all()->where('ten', $request->ten)->first();
        $id = Auth::user()->id;
        $ten_admin = DB::table('users')->where('id', $id)->get()->value('ten');
        if (is_null($check)) {
            if ($image = $request->file('file')) {
                $destinationPath = 'images/';
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalName();
                $image->move($destinationPath, $profileImage);
                $data = "http://127.0.0.1:8000/images/$profileImage";
            }
            ChuDautu::create([
                'ten' => $request->ten,
                'diachi' => $request->diachi,
                'thongtin' => $request->thongtin,
                'trangthai' => $request->trangthai,
                'hinhanh' => $data,
                'created_by' => $ten_admin
            ]);
            return redirect()->back()->with('message', 'Thêm thông tin thành công');

        } else {
            return redirect()->back()->with('error', 'Đã tồn tại thông tin này !');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $chudautu = ChuDautu::all()->where('id', $id);
    
        return view('capnhatchudautu', compact('chudautu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $id = Auth::user()->id;
        $ten_admin = DB::table('users')->where('id', $id)->get()->value('ten');
        $chudautu = ChuDautu::all()->where('id', $id);
        $check = ChuDautu::all()->where('ten', $request->ten)->first();
        if (is_null($check)) {
            foreach ($chudautu as $item) {
                if ($image = $request->file('file')) {
                    $destinationPath = 'images/';
                    $profileImage =  $image->getClientOriginalName();
                    $image->move($destinationPath, $profileImage);
                    $data = "http://127.0.0.1:8000/images/$profileImage";
                } else {
                    $data = $item->hinhanh;
                }
                DB::table('chu_dautu')->where('id',$id)->update([
                    'ten' => $request->ten,
                    'diachi' => $request->diachi,
                    'thongtin' => $request->thongtin,
                    'trangthai' => $request->trangthai,
                    'hinhanh' => $data,
                    'updated_by' => $ten_admin
                ]);
dd("$check");
                return redirect()->back()->with('message', 'Cập nhật thông tin thành công');
            }
        }
        else {
            return redirect()->back()->with('error','Đã tồn tại thông tin này không thể cập nhật !');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $check=DB::table('chu_dautu')->join('duan','chu_dautu.id','=','duan.id_chudautu')->get()->first();
        $check2=DB::table('chu_dautu')->join('chitiet_batdongsan','chitiet_batdongsan.id_chudautu','=','chu_dautu.id')->get(); 
    
        if(is_null($check) && is_null($check2))
        {
            ChuDautu::destroy($id);
            return redirect()->back()->with('message','Xóa thông tin chủ dầu tư thành công !');
        }
        else{
            return  redirect()->back()->with('error','Không thể xóa chủ đầu tư này');
        }
    }
}
