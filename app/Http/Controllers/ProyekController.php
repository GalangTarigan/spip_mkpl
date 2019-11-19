<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Instansi;
use App\Model\Daftar_Pic;
use App\Model\Laporan_Instalasi;
use App\User;
use App\Http\Requests\DashboardBarchart;
use Illuminate\Support\Carbon;
use App\Pkl\Traits\Convert;

class ProyekController extends Controller
{
    use Convert;

  

    public function showProyek(Request $request)
    { //table daftar instalasi proyek pada halaman proyek instansi
        $data = Laporan_Instalasi::join('instansi', 'instansi.id_instansi', '=', 'laporan_instalasi.instansi_id')
        ->where('waktu_mulai','like',$request->date_start.'%')->get();
        return response()->json([
            'status' => true,
            'data' => $data
        ]);
    }

    public function showProyekDalamPengerjaan(Request $request)
    {
        $data = Laporan_Instalasi::join('instansi', 'instansi.id_instansi', '=', 'laporan_instalasi.instansi_id')->where('status', '=', 'Dalam Pengerjaan')->get();
        $res = array();
        $temp = array();
        foreach ($data as $project) {
            $temp['nama_instansi'] =  $project->nama_instansi;
            $temp['alamat_instansi'] = $project->alamat_instansi;
            $temp['status'] = $project->status;
            $temp['waktu_mulai'] = $project->waktu_mulai;
            $temp['waktu_selesai'] = $project->waktu_selesai;
            array_push($res, $temp);
        }
        return $res;
    }

    //Get list finished projects betweeen two dates
    public function listProjectBetweenTwoDates(DashboardBarchart $request)
    {
        $from = Carbon::createFromFormat('Y-m-d H:i:s', $this->convertToTimeStamps($request->date_start), 'Asia/Jakarta');
        $to = Carbon::createFromFormat('Y-m-d H:i:s', $this->convertToTimeStamps($request->date_end), 'Asia/Jakarta');
        if ($request->q_status == "fin") {
            $result = Laporan_Instalasi::with('instansi')->where('user_id', auth()->user()->id)->where('status', 'Selesai')->whereBetween('waktu_selesai', [$from, $to])->get();
        } else if ($request->q_status == "all") {
            $result = Laporan_Instalasi::with('instansi')->where('user_id', auth()->user()->id)->where(function ($query) use ($from, $to){ 
                $query->whereBetween('waktu_mulai', [$from, $to]);
                $query->orWhereBetween('waktu_selesai', [$from, $to]);
            })->get();
        }

        return response()->json([
            'status' => true,
            'data' => $result
        ]);
    }
}
