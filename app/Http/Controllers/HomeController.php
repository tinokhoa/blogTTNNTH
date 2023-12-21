<?php

namespace App\Http\Controllers;

use App\Models\Batdongsan;
use App\Models\ChitietBatdongsan;
use App\Models\Danhmuc;
use App\Models\Duan;
use App\Models\Huyen;
use App\Models\LoaiDanhmuc;
use App\Models\Tinh;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    //
    public function index()
    {
        $duan=DB::table('duan')->join('huyen','duan.id_huyen','=','huyen.id')->get();
        $danhmuc = Danhmuc::all();
        $loaidanhmuc = LoaiDanhmuc::all();
        $batdongsan = DB::table('batdongsan')->orderBy('created_at','desc')->paginate('12');
        $huyen = Huyen::all();
        $tinh = Tinh::all();
        return view('index', compact('danhmuc', 'loaidanhmuc', 'huyen', 'tinh', 'batdongsan','duan'));
    }
    public function chitiet($id){
        $chitietbds=DB::table('batdongsan')->rightJoin('chitiet_batdongsan','batdongsan.id','=','chitiet_batdongsan.id_bds')
            ->where('batdongsan.id',$id)->get();
        return view('chitiet',compact('chitietbds'));
    }
    public function search(\Illuminate\Http\Request $request)
    {

    }
}
