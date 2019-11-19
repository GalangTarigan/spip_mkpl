<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Provinces;
use App\Model\Regencies;
class WilayahIndonesiaController extends Controller
{
    public function getProvinces(){
        $provinces = Provinces::orderBy('name')->get();
        return response()->json([
            'status' => "success",
            'provinces' => $provinces
        ]);
    }
    public function getRegencies(Request $request){
       $id_provinces = $request->id_provinsi;
        $regencies = Regencies::where('province_id', $id_provinces)->orderBy('name')->get();
        return response()->json([
            'status' => "success",
            'regencies' => $regencies
        ]);
    }
    
}
