<?php

namespace App\Http\Controllers;
use App\Model\Laporan_Instalasi_Berkala;
use App\Http\Requests\LaporanBerkalaRequest;
use App\Pkl\Traits\LaporanInstalasi;
class LaporanBerkalaController extends Controller
{
    use LaporanInstalasi;
    /**
     * Show view form laporan berkala
     * 
     * @param 
     * @return \Illuminate\Http\Response
     */
    public function showFormBerkala(){
        if(!$this->checkProjectStatus(auth()->user()->id)){
            $activeProject = $this->getCurrentActiveUserProjects(auth()->user()->id);
            return view('pages.users.buatLaporanBerkala', ['status'=>'Allowed', 'namaProyek' => $activeProject->instansi->nama_instansi]);
        }else{
            return view('pages.users.buatLaporanBerkala', ['status'=>'Prohibited']);
        }
    }

    public function createLaporanBerkala(LaporanBerkalaRequest $request){
        //Input validated
        
        if ($this->checkProjectStatus(auth()->user()->id)){
            return redirect('laporan-berkala')->with('error', 'Laporan berkala gagal dibuat, anda tidak sedang mengerjakan proyek apapun');
        }else {
            $isi_laporan = $request->permasalahanKeluhan .';+;'.$request->solusi;
            try{
                $activeProject = $this->getCurrentActiveUserProjects(auth()->user()->id);
                Laporan_Instalasi_Berkala::create([
                    'laporan_instalasi_id' => $activeProject->id_laporan,
                    'subjek' => $request->subjek,
                    'isi_laporan' => $isi_laporan
                ]);
                return redirect('laporan-berkala')->with('success', 'Laporan berkala berhasil dibuat');
            }catch(\Exception $e){
                return redirect('laporan-berkala')->with('error', 'Laporan berkala gagal dibuat, terjadi kesalahan pada sistem');
            }
        }
        
    }
}
