<?php

namespace App\Http\Controllers;

use App\Models\Danhmuc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function PHPUnit\Framework\isEmpty;

class DanhMucController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $danhmuc = \App\Models\Danhmuc::all();
        return view('danhmuc', compact('danhmuc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('categories-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kiemtra_danhmuc = DB::table('danhmuc')->where('ten_danhmuc', $request->tendanhmuc)->get()->first();
        $id= Auth::user()->id;
        $ten_admin = DB::table('users')->where('id', $id)->get()->value('ten');
        if (is_null($kiemtra_danhmuc)) {
            Danhmuc::create([
                'ten_danhmuc' => $request->tendanhmuc,
                'tieu_de' => $request->tieude,
                'created_by' => $ten_admin
            ]);
            return redirect()->back()->with('error','Thêm thông tin danh mục thành công');
        } else {
            return redirect()->back()->with('error','Không thể thêm ! Đã tồn tại danh mục này');
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
        return Danhmuc::find($id);
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
        $danhmuc=Danhmuc::all()->where('id',$id);
        return view('categories-edit',compact('danhmuc'));
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
        $kiemtra_danhmuc = Danhmuc::all()->where('ten_danhmuc',$request->ten_danhmuc)->first();
        $ten_admin = DB::table('users')->where('id', $id)->get()->value('ten');
        if (is_null($kiemtra_danhmuc)) {
            DB::table('danhmuc')->where('id', $id)->update([
                'ten_danhmuc' => $request->ten_danhmuc,
                'tieu_de'=>$request->tieu_de,
                'updated_by' => $ten_admin,
            ]);
            return redirect()->back()->with('error','Cập nhật thông tin danh mục thành công !');
        } else {
            return redirect()->back()->with('error','Không thể cập nhật, đã tồn tại danh mục này !');
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
        $danhmuc_loaidanhmuc = DB::table('danhmuc')
            ->join('loai_danhmuc', 'danhmuc.id', '=', 'loai_danhmuc.id_danhmuc')
            ->where('danhmuc.id', $id)->get()->first();
        if (is_null($danhmuc_loaidanhmuc)) {
            DB::table('danhmuc')->where('id', $id)->delete();
            return redirect()->back()->with('error','Xóa thông tin danh mục thành công');
        } else {
            return redirect()->back()->with('error',' Danh mục này có dữ liệu, Không thể xóa!');
        }
    }
}
