<?php

namespace App\Http\Controllers;

use App\Models\Batdongsan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    }

    public function search(Request $request)
    {
        if ($request->ajax()) {
            $data = Batdongsan::where('ten_bds', 'LIKE',$request->country.'%')
                ->orWhere('tieu_de','LIKE','%'.$request->country.'%')
                ->get();
            $output = '';
            if (count($data) > 0) {

                $output = '<ul class="list-group" style="display: block; position: relative; z-index: 1">';

                foreach ($data as $row) {

                    $output .= '<li class="list-group-item"><a href="'.route('chitiet',$row->id).'">' . $row->ten_bds. '<a/></li>';
                }

                $output .= '</ul>';
            } else {

                $output .= '<li class="list-group-item">' . 'No results' . '</li>';
            }
            return $output;
        }
//        $result=DB::table('batdongsan')
//            ->join('loai_danhmuc','batdongsan.id_loaidanhmuc','=','loai_danhmuc.id')
//            ->where('batdongsan.ten_bds','LIKE','%search%')
//            ->orWhere('batdongsan.tieu_de','LIKE','%search%')
//            ->orWhere('loai_danhmuc.ten_loai','LIKE','%search%')->get();
//        return view('index',compact('result'));
    }

}
