<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Instansi;
use App\Http\Requests\AddCategoryRequest;
use App\Http\Requests\TambahInstansiRequest;
use App\Pkl\Traits\LaporanInstalasi;
use App\Pkl\Traits\WilayahIndonesia;
use DB;
use App\Model\Kategori;
use App\Model\Daftar_Pic;
use App\Model\Laporan_Instalasi;


class InstansiController extends Controller
{
    use LaporanInstalasi, WilayahIndonesia;

    /**
     * create new instansi
     * 
     */
    public function addInstansi(TambahInstansiRequest $request){

        //the request has been validated
        //create new Instansi object
        $instansi = new Instansi();
        $instansi->nama_instansi = $request->namaInstansi;
        $kategori = Kategori::select('nama_kategori')->find($request->jenisInstansi);
        $instansi->kategori = $kategori->nama_kategori;
        $instansi->provinsi = $this->getProvinceName($request->provinsi);
        $instansi->kabupaten_kota = $this->getRegencyName($request->kota);
        $instansi->alamat_instansi = $request->alamatInstansi;
        $instansi->email = $request->emailInstansi;
        $instansi->no_telepon = $request->noTeleponInstansi;

        //create new list pic's object
        $listPic = [];
        $pic = [];
        for ($i = 0; $i < count($request->namaPic); $i++) {
            $pic[$i] = new Daftar_Pic();
            $pic[$i]->nama_pic = ucwords($request->namaPic[$i]);
            $pic[$i]->kontak_pic = $request->nomorTelepon[$i];
            //$pic[$i]->save();

            array_push($listPic, $pic[$i]);
        }
        //saving to database
        DB::transaction(function () use ($instansi, $pic) {
            $instansi->save();

            for ($i = 0; $i < count($pic); $i++) {
                $pic[$i]->instansi_id = $instansi->id_instansi;
                $pic[$i]->save();
            }
        });
        //check whether laporan instalasi was successfully created 
        if ($instansi && $pic) {
            return redirect()->back()->with('success', 'Instansi berhasil ditambahkan');
        } else {
            return redirect()->back()->with('fail', 'Instansi gagal ditambahkan');
        }
    }
    
    public function getInstansi(Request $request)
    {
        $result = Instansi::with('laporan_instalasi')->has('laporan_instalasi')->get();
        $result2 = [];
        foreach ($result as $res) {
            $laporan_instalasi = $res->laporan_instalasi;
            $flag = '';
            foreach ($laporan_instalasi as $laporan) {
                if ($laporan->status == "Dalam Pengerjaan") $flag = "remove";
            }
            if ($flag != "remove") array_push($result2, $res);
        }
        //$result = Instansi::with('laporan_instalasi')->has('laporan_instalasi')->get();
        return response()->json([
            'status' => "success",
            'instansi' => $result2
        ]);
    }


    public function getDaftarPIC(Request $request)
    {
        $result = Instansi::find($request->id_instansi)->daftar_pic;
        return response()->json([
            'status' => "success",
            'pic' => $result
        ]);
    }
    public function getListCategory()
    {
        $kategori = Kategori::orderBy('nama_kategori')->get();
        return response()->json([
            'status' => "success",
            'data' => $kategori
        ]);
    }

    public function updateCategory(AddCategoryRequest $request)
    {
        //    dd($request);
        Kategori::where('id', $request->id_kategori)->update([
            "nama_kategori" => $request->nama_kategori,
        ]);
        return redirect()->back()->with('success', 'kategori berhasil diubah yeay!');
    }

    public function deleteCategory(Request $request)
    {
        Kategori::where('id', $request->category)->delete();
        return redirect()->back()->with('success', 'kategori berhasil dihapus yeay!');
    }

    public function addCategory(AddCategoryRequest $request)
    {
        Kategori::create([
            'nama_kategori' => $request->nama_kategori,
        ]);
        return redirect()->back()->with('success', 'Kategori berhasil ditambah');
    }

}
