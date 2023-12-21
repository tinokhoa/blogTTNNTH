<?php

namespace App\Http\Controllers;

use App\Models\ChuDautu;
use App\Models\Danhmuc;
use App\Models\Duan;
use App\Models\Huyen;
use App\Models\LoaiDanhmuc;
use App\Models\Tinh;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DuAnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $duan=Duan::all();
        return view('duan', compact('duan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $tinh = Tinh::all();
        $huyen = Huyen::all();
        $chudautu = ChuDautu::all();
        $loaidanhmuc = LoaiDanhmuc::all();
        return view('themduan', compact('tinh', 'huyen', 'chudautu', 'loaidanhmuc'));
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
        $id = Auth::user()->id;
        $get_admin = User::all()->where('id', $id)->value('ten');
        $check = Duan::all()->where('ten_duan', $request->tenduan)->first();
        if (is_null($check)) {
            if ($image = $request->file('file')) {
                $destinationPath = 'images/';
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalName();
                $image->move($destinationPath, $profileImage);
                $data = "http://127.0.0.1:8000/images/$profileImage";
            }else{
                $data="hinhanh.jpg";
            }
            if ($request->file('files')) {
                foreach ($request->file('files') as $file) {
                    $destinationPath = 'images/';
                    $profileImage = date('YmdHis') . "." . $file->getClientOriginalName();
                    $file->move($destinationPath, $profileImage);
                    $img[] = "http://127.0.0.1:8000/images/$profileImage";
                }
            }else{
                $img[]="hinhanh.jpg";
            }

            Duan::create([
                'ten_duan' => $request->tenduan,
                'gia_dukien' => $request->giadukien,
                'phap_ly' => $request->phaply,
                'id_chudautu' => $request->id_chudautu,
                'id_huyen' => $request->idhuyen,
                'id_loaidanhmuc' => $request->id_loaidanhmuc,
                'diadiem' => $request->diadiem,
                'ngay_khoicong' => $request->ngaykhoicong,
                'ngay_moban' => $request->ngaymoban,
                'noidung' => $request->noidung,
                'anh_bia' => $data,
                'created_by' => $get_admin,
                'hinh_anh' => implode(',',$img)

            ]);
            return redirect()->back()->with('message', 'Thêm dự án thành công !');
        } else {
            return redirect()->back()->with('error', 'Đã tồn tại dự án này, Không thể thêm !');
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
        $tinh = Tinh::all();
        $huyen = Huyen::all();
        $chudautu = ChuDautu::all();
        $loaidanhmuc=LoaiDanhmuc::all();
        $duan = Duan::all()->where('id', $id)->first();
        return view('capnhatduan', compact('duan','loaidanhmuc','chudautu','huyen','tinh'));
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

        $id_ad = Auth::user()->id;
        $get_admin = User::all()->where('id', $id_ad)->value('ten');
        $check = Duan::all()->where('ten_duan', $request->tenduan)->where('id','!=',$id)->first();
        $duan = Duan::all()->where('id', $id);
        foreach ($duan as $item) {
            if (is_null($check)) {
                if ($image = $request->file('file')) {
                    $destinationPath = 'images/';
                    $profileImage = date('YmdHis') . "." . $image->getClientOriginalName();
                    $image->move($destinationPath, $profileImage);
                    $data = "http://127.0.0.1:8000/images/$profileImage";
                } else {
                    $data = $item->anh_bia;
                }
                if ($request->file('files')) {
                    foreach ($request->file('files') as $file) {
                        $destinationPath = 'images/';
                        $profileImage = date('YmdHis') . "." . $file->getClientOriginalName();
                        $file->move($destinationPath, $profileImage);
                        $data2[] = "http://127.0.0.1:8000/images/$profileImage";
                    }
                } else {
                    $data2[] = $item->hinh_anh;
                }
                DB::table('duan')->where('id', $id)->update([
                    'ten_duan' => $request->tenduan,
                    'gia_dukien' => $request->giadukien,
                    'phap_ly' => $request->phaply,
                    'id_chudautu' => $request->id_chudautu,
                    'id_huyen' => $request->idhuyen,
                    'id_loaidanhmuc' => $request->id_loaidanhmuc,
                    'diadiem' => $request->diadiem,
                    'ngay_khoicong' => $request->ngaykhoicon,
                    'ngay_moban' => $request->ngaymoban,
                    'noidung' => $request->noidung,
                    'anh_bia' => $data,
                    'create_by' => $get_admin,
                    'hinh_anh' => implode(',',$data2)
                ]);
                return redirect()->back()->with('message', 'Cập nhật dự án thành công !');
            } else {
                return redirect()->back()->with('error', 'Đã tồn tại dự án này, Không thể thêm !');
            }
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
        Duan::destroy($id);
        return redirect()->back()->with('message','Xóa dự án thành công');
    }
}
