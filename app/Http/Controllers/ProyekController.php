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

    public function indexStatsProyek()
    { //halaman statistik proyek
        return view('pages.admin.statistikProyek');
    }

    public function indexDetailProyek(Request $request)
    { //halaman detail dari proyek
        $kota = $request->kabupaten_kota;
        return view('pages.admin.detailProyek', compact('kota'));
    }

    public function duplicateRow(Request $request)
    { //table daftar instalasi proyek per provinsi pada halaman statistik proyek  
        $data = Instansi::distinct('provinsi')->get();
        $temp = array();
        $res = array();
        foreach ($data as $datas) {
            $temp = Instansi::select('kabupaten_kota')->join('laporan_instalasi', 'laporan_instalasi.instansi_id', '=', 'instansi.id_instansi')
                ->where('status', '!=', 'Dalam Pengerjaan')
                ->where('provinsi', $datas->provinsi)->distinct('kabupaten_kota')->get();
            foreach ($temp as $val) {
                $flag = true;
                $var['provinsi'] = $datas->provinsi;
                $var['projects_amount'] = Instansi::join('laporan_instalasi', 'laporan_instalasi.instansi_id', '=', 'instansi.id_instansi')
                ->where('kabupaten_kota', $val->kabupaten_kota)->get()->count();
                $var['kabupaten_kota'] = $val['kabupaten_kota'];
                foreach ($res as $re) {
                    if ($re['provinsi'] == $datas->provinsi && $val['kabupaten_kota'] == $re['kabupaten_kota']) {
                        $flag = false;
                        break;
                    }
                }
                if ($flag) {
                    array_push($res, $var);
                }
            }
        }
        return $res;
    }

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

    public function detailProyek(Request $request)
    { // table daftar proyek per kota pada page detail proyek

        $kota = $request->kabupaten_kota;
        $data = Laporan_Instalasi::with('instansi.daftar_pic')
            ->join('instansi', 'instansi.id_instansi', '=', 'laporan_instalasi.instansi_id')
            ->where('instansi.kabupaten_kota', $kota)->get();
        return $data;
    }

    public function barProyek(Request $request)
    { // bar chart statistik instalasi proyek pada page statistik proyek
        // $from = Carbon::createFromFormat('Y-m-d H:i:s', $this->convertToTimeStamps($request->date_start), 'Asia/Jakarta');
        // $to = Carbon::createFromFormat('Y-m-d H:i:s', $this->convertToTimeStamps($request->date_end), 'Asia/Jakarta');
        $data = Laporan_Instalasi::select('nama_instansi', 'instansi_id')->join('instansi', 'instansi.id_instansi', '=', 'laporan_instalasi.instansi_id')
            ->where('status', '!=', 'Dalam Pengerjaan')->where('waktu_mulai','like',$request->date_start.'%')
            ->distinct('nama_instansi', 'instansi_id')->get();
        $title = array();
        $duration = array();
        foreach ($data as $project) {
            $temp_title = $project->nama_instansi;
            $temp_duration = $this->getDuration($project->instansi_id);
            array_push($duration, $temp_duration);
            array_push($title, $temp_title);
        }
        return compact('title', 'duration');
        
    }

    public function getDuration($instansi_id)
    {
        $projects = Laporan_Instalasi::where('instansi_id', $instansi_id)->where('status', '!=', 'Dalam Pengerjaan')->get();
        $total_time = 0;
        foreach ($projects as $project) {
            $total_time = $total_time + (strtotime($project->waktu_selesai) - strtotime($project->waktu_mulai));
        }
        $tot = $total_time;
        $hour = floor($tot / 3600);
        $tot = $tot % 3600;
        $min = floor($tot / 60);
        $tot = $tot % 60;
        return $hour;
    }

    public function barDetailProyek(Request $request)
    { //bar chart statistik instalasi proyek pada halaman statistik detail proyek
        $data = Laporan_Instalasi::select('nama_instansi', 'instansi_id')->join('instansi', 'instansi.id_instansi', '=', 'laporan_instalasi.instansi_id')
            ->where('kabupaten_kota', $request->kota)->where('status', '!=', 'Dalam Pengerjaan')
            ->distinct('nama_instansi', 'instansi_id')->get();
        $res = array();
        $title = array();
        $duration = array();
        foreach ($data as $project) {
            $temp_title = $project->nama_instansi;
            $temp_duration = $this->getDuration($project->instansi_id);
            array_push($duration, $temp_duration);
            array_push($title, $temp_title);
        }
        return compact('title', 'duration');
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
