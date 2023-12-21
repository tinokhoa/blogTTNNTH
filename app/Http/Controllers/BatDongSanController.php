<?php

namespace App\Http\Controllers;

use App\Http\Requests\BatdongsanRequest;
use App\Models\Batdongsan;
use App\Models\ChitietBatdongsan;
use App\Models\ChuDautu;
use App\Models\Danhmuc;
use App\Models\Huyen;
use App\Models\LoaiDanhmuc;
use App\Models\Tinh;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\In;
use Ramsey\Uuid\Type\Integer;

class BatDongSanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
//        $batdongsan = \Illuminate\Support\Facades\DB::table('batdongsan')
//            ->join('loai_danhmuc', 'loai_danhmuc.id', '=', 'batdongsan.id_loaidanhmuc')->get();
        $batdongsan = Batdongsan::all();
        return view('batdongsan', compact('batdongsan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $loaidanhmuc = \App\Models\LoaiDanhmuc::all();
        $huyen = \App\Models\Huyen::all();
        $tinh = \App\Models\Tinh::all();
        $chudautu = ChuDautu::all();
        return view('add-batdongsan', compact('loaidanhmuc', 'huyen', 'tinh', 'chudautu'));
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
        $ten_admin = DB::table('users')->where('id', $id)->get()->value('ten');
        $check = Batdongsan::all()->where('ten_bds', $request->tenbds)->first();
        if (is_null($check)) {
            if ($image = $request->file('file')) {
                $destinationPath = 'images/';
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalName();
                $image->move($destinationPath, $profileImage);
                $data = "http://127.0.0.1:8000/images/$profileImage";
            }else{
                $data="hinhanh.jpg";
            }
             Batdongsan::create(
                [
                    'ten_bds' => $request->tenbds,
                    'tieu_de' => $request->tieude,
                    'id_loaidanhmuc' => $request->idloaidanhmuc,
                    'dientich' => $request->dientich,
                    'gia' => $request->gia,
                    'created_by' => $ten_admin,
                    'hinhanh' => $data
                ]
            );
            if ($request->file('files')) {
                foreach ($request->file('files')as $file) {
                    $destinationPath = 'images/';
                    $profileImage = date('YmdHis') . "." . $file->getClientOriginalName();
                    $file->move($destinationPath, $profileImage);
                    $img[] = "http://127.0.0.1:8000/images/$profileImage";
                }
            }
            else{
                $img[]="hinhanh.jpg";
            }
            $get_id=DB::table('batdongsan')->where('ten_bds',$request->tenbds)->get()->value('id');
            ChitietBatdongsan::create([
                'gia_dukien' => $request->giadukien,
                'noidung' => $request->noidung,
                'anhchitiet' => implode(',',$img),
                'id_chudautu' => $request->idchudautu,
                'dientich_nha' => $request->dientichnha,
                'dientich_dat' => $request->dientichdat,
                'diadiem' => $request->diadiem,
                'id_huyen' => $request->idhuyen,
                'phongngu' => $request->phongngu,
                'nhavesinh' => $request->nhavesinh,
                'ham_dexe' => $request->hamdexe,
                'sotang' => $request->sotang,
                'id_bds' => $get_id
            ]);
            return redirect()->back()->with('message', 'Thêm thành công !');
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
    public function edit(int $id)
    {
        $loaidanhmuc = LoaiDanhmuc::all();
        $danhmuc = Danhmuc::all();
        $huyen = Huyen::all();
        $tinh = Tinh::all();
        $chudautu = ChuDautu::all();
        $test = DB::table('batdongsan')->join('chitiet_batdongsan', 'batdongsan.id', '=', 'chitiet_batdongsan.id_bds')->where('batdongsan.id', $id)->get();
        $batdongsan=Batdongsan::all()->where('id',$id);
        $chitiet=ChitietBatdongsan::all()->where('id_bds',$id);
        return view('capnhatbatdongsan', compact('loaidanhmuc', 'danhmuc', 'huyen',
            'tinh', 'chudautu', 'test','batdongsan','chitiet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        //
        $id_ad = Auth::user()->id;
        $ten_admin = DB::table('users')->where('id', $id_ad)->get()->value('ten');
        $test = DB::table('batdongsan')->join('chitiet_batdongsan', 'batdongsan.id', '=', 'chitiet_batdongsan.id_bds')->where('batdongsan.id', $id)->get();
        $check = Batdongsan::all()->where('ten_bds', $request->ten)->where('id','!=',$id)->first();
        if (is_null($check)) {
            foreach ($test as $item) {
                if ($image = $request->file('file')) {
                    $destinationPath = 'images/';
                    $profileImage = date('YmdHis') . "." . $image->getClientOriginalName();
                    $image->move($destinationPath, $profileImage);
                    $data = "http://127.0.0.1:8000/images/$profileImage";
                } else {
                    $data = $item->hinhanh;
                }
                DB::table('batdongsan')->where('id', $id)->update([
                    'ten_bds' => $request->tenbds,
                    'tieu_de' => $request->tieude,
                    'id_loaidanhmuc' => $request->idloaidanhmuc,
                    'dientich' => $request->dientich,
                    'gia' => $request->gia,
                    'update_by' => $ten_admin,
                    'hinhanh' => $data
                ]);
                if ($request->file('files')) {
                    foreach ($request->file('files') as $file) {
                        $destinationPath = 'images/';
                        $profileImage = date('YmdHis') . "." . $file->getClientOriginalName();
                        $file->move($destinationPath, $profileImage);
                        $img[] = "http://127.0.0.1:8000/images/$profileImage";
                    }
                } else {
                    $img[] = $item->anhchitiet;
                }
                DB::table('chitiet_batdongsan')->where('id_bds', $id)->update([
                    'gia_dukien' => $request->giadukien,
                    'noidung' => $request->noidung,
                    'anhchitiet' => implode(',', $img),
                    'id_chudautu' => $request->idchudautu,
                    'dientich_nha' => $request->dientichnha,
                    'dientich_dat' => $request->dientichdat,
                    'diadiem' => $request->diadiem,
                    'id_huyen' => $request->idhuyen,
                    'phongngu' => $request->phongngu,
                    'nhavesinh' => $request->nhavesinh,
                    'ham_dexe' => $request->hamdexe,
                    'sotang' => $request->sotang,
                ]);
                return redirect()->back()->with('message', 'Cập nhật thông tin bất động sản thành công !');
            }
        }
        else{
            return redirect()->back()->with('error', 'Đã tồn tại thông tin bất động sản này !');
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
        DB::table('chitiet_batdongsan')->where('id_bds',$id)->delete();
        Batdongsan::destroy($id);
        return redirect()->back()->with('message', 'Xóa thành công bất động sản');
    }
}
