<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LaporanKeluhanRequest;
use App\Model\Laporan_Keluhan;
use App\Model\Laporan_Keluhan_Daftar_Subjek;
use App\Pkl\Traits\Convert;
use Webpatser\Uuid\Uuid;
use App\Model\Subjek_Keluhan;
use App\Http\Requests\SubjekKeluhan;
use Illuminate\Support\Carbon;
use App\User;

use App\Notifications\complaintReportCreated;

class LaporanKeluhanController extends Controller
{
    use Convert;
    public function createLaporanKeluhan(LaporanKeluhanRequest $request)
    {
        //Input validated

        //create new laporan_keluhan object
        $laporan_keluhan = new Laporan_Keluhan();
        $laporan_keluhan->uuid = (string) Uuid::generate();
        $laporan_keluhan->instansi_id = $request->namaInstansi;
        $laporan_keluhan->pelapor_id = $request->namaPelapor;
        $laporan_keluhan->waktu_lapor_keluhan = $this->convertToTimeStamps($request->waktuLapor);
        $laporan_keluhan->waktu_selesai_penanganan = $this->convertToTimeStamps($request->waktuSelesaiPenanganan);
        $laporan_keluhan->permasalahan = $request->permasalahanKeluhan;
        $laporan_keluhan->solusi = $request->solusiPermasalahanKeluhan;
        $laporan_keluhan->nama_teknisi = auth()->user()->nama_lengkap;
        $laporan_keluhan->save();

        //create new laporan_keluhan_daftar_subjek 
        for ($i = 0; $i < count($request->subjekKeluhan); $i++) {
            $daftar_subjek[$i] = new Laporan_Keluhan_Daftar_Subjek();
            $daftar_subjek[$i]->laporan_keluhan_id = $laporan_keluhan->id_keluhan;
            $daftar_subjek[$i]->subjek_keluhan_id = $request->subjekKeluhan[$i];
            $daftar_subjek[$i]->save();
        }
        return redirect()->back()->with('success', 'Laporan keluhan berhasil dibuat');
    }
    public function indexDetailKeluhan(Request $request)
    { //halaman detail keluhan
        // $anjing = 9;
        $keluhan = Laporan_Keluhan::with('daftar_subjek.subjek_keluhan', 'instansi.daftar_pic')
            ->where('laporan_keluhan.uuid', $request->keluhan)->get();
        if (auth()->user()->hasAdminRole()) return view('pages.admin.detailKeluhanAdmin', compact('keluhan'));
        else return view('pages.users.detailKeluhan', compact('keluhan'));
    }

    public function indexkeluhan(Request $request)
    {
        //$tahun=2019;
        $keluhan = Laporan_Keluhan::with('daftar_subjek.subjek_keluhan', 'instansi.daftar_pic')
            ->where('laporan_keluhan.instansi_id', $request->instansi)->whereYear('laporan_keluhan.waktu_lapor_keluhan', '=', date($request->tahun))->get();
        return view('pages.admin.detailKeluhanProyekPerTahun', compact('keluhan'));
    }

    public function showDaftarkeluhan(Request $request)
    {
        $data = Laporan_Keluhan::with('daftar_subjek.subjek_keluhan')
            ->join('instansi', 'instansi.id_instansi', '=', 'laporan_keluhan.instansi_id')->where('waktu_lapor_keluhan', 'like', $request->date_start . '%')->get();
        return $data;
    }

    public function getSubjek($request)
    {
        $data = Subjek_Keluhan::select('nama_subjek')
            ->join('daftar_subjek_keluhan', 'daftar_subjek_keluhan.subjek_keluhan_id', '=', 'subjek_keluhan.id_subjek')
            ->where('id_subjek', $request)->get();
        return $data;
    }

    public function barKeluhan(Request $request)
    {
        $from = Carbon::createFromFormat('Y-m-d H:i:s', $this->convertToTimeStamps($request->date_start), 'Asia/Jakarta');
        $to = Carbon::createFromFormat('Y-m-d H:i:s', $this->convertToTimeStamps($request->date_end), 'Asia/Jakarta');
        $data = Subjek_Keluhan::all();
        $subjek = array();
        $total_project = array();
        foreach ($data as $datas) {
            $temp_subjek = $datas->nama_subjek;
            $temp_total = Laporan_Keluhan_Daftar_Subjek::where('subjek_keluhan_id', $datas->id_subjek)->whereBetween('created_at', [$from, $to])->get()->count();
            array_push($subjek, $temp_subjek);
            array_push($total_project, $temp_total);
        }
        return compact('subjek', 'total_project');
    }

    public function getSubjekKeluhan()
    {
        $subjek_keluhan = Subjek_Keluhan::all();
        return response()->json([
            'status' => "success",
            'data' => $subjek_keluhan
        ]);
    }

    public function addSubjekKeluhan(SubjekKeluhan $request)
    {
        Subjek_Keluhan::create([
            'nama_subjek' => $request->nama_subjek,
        ]);
        return redirect()->back()->with('success', 'Kategori berhasil ditambah');
    }

    public function updateSubjekKeluhan(SubjekKeluhan $request)
    {
        //    dd($request);
        Subjek_Keluhan::where('id_subjek', $request->id_subjek)->update([
            'nama_subjek' => $request->nama_subjek,
        ]);
        return redirect()->back()->with('success', 'kategori berhasil diubah yeay!');
    }

    public function deleteSubjekKeluhan(Request $request)
    {
        Subjek_Keluhan::where('id_Subjek', $request->subjek)->delete();
        return redirect()->back()->with('success', 'kategori berhasil dihapus yeay!');
    }

    public function instansiKeluhan(Request $request)
    {
        $data = Laporan_Keluhan::select('nama_instansi', 'instansi_id', 'waktu_lapor_keluhan')->join('instansi', 'instansi.id_instansi', '=', 'laporan_keluhan.instansi_id')->get()->sortBy('nama_instansi');
        $res = array();
        $temp = array();
        $temp['nama_instansi'] =  $data[0]->nama_instansi;
        $temp['waktu_lapor_keluhan'] = $data[0]->waktu_lapor_keluhan;
        $temp['instansi_id'] = $data[0]->instansi_id;
        array_push($res, $temp);
        foreach ($data as $project) {
            if (
                $temp['nama_instansi'] === $project->nama_instansi
                && substr($temp['waktu_lapor_keluhan'], 0, 5) === substr($project->waktu_lapor_keluhan, 0, 5)
            ) {
                continue;
            }
            $temp['nama_instansi'] =  $project->nama_instansi;
            $temp['waktu_lapor_keluhan'] = $project->waktu_lapor_keluhan;
            $temp['instansi_id'] = $project->instansi_id;
            array_push($res, $temp);
        }

        for ($i = 0; $i < count($res); $i++) {
            $res[$i]['jumlah_keluhan'] = 0;
        }

        foreach ($data as $project) {
            for ($i = 0; $i < count($res); $i++) {
                if (
                    $res[$i]['nama_instansi'] === $project->nama_instansi
                    && substr($res[$i]['waktu_lapor_keluhan'], 0, 5) === substr($project->waktu_lapor_keluhan, 0, 5)
                ) {
                    $res[$i]['jumlah_keluhan'] = $res[$i]['jumlah_keluhan'] + 1;
                }
            }
        }
        return $res;
    }
}
