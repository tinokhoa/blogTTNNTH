<?php

namespace App\Http\Controllers;

use App\Models\Huyen;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function getHuyenByTinhId($tinhId)
    {
        $huyens = Huyen::where('id_tinh', $tinhId)->get();

        return response()->json($huyens);
    }


    public function getTinhByHuyenId($huyenId)
    {
        $huyen = Huyen::find($huyenId);
        $tinhs = $huyen->tinhs;
        return response()->json($tinhs);
    }
}
