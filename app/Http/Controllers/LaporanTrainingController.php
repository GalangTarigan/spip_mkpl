<?php

namespace App\Http\Controllers;

use App\Pkl\Traits\LaporanInstalasi;
use App\Pkl\Traits\Convert;
use App\Model\Dokumentasi_Instalasi;
use App\Model\Laporan_Training;
use App\Model\Log_Laporan;
use  App\Http\Requests\LaporanTrainingRequest;
use App\Notifications\trainingReportCreated;
use App\User;

class LaporanTrainingController extends Controller
{
    use LaporanInstalasi, Convert;
    /**
     * Show view form laporan training
     * 
     * @param 
     * @return \Illuminate\Http\Response
     */
    public function showFormTraining()
    {
        if (!$this->checkProjectStatus(auth()->user()->id)) {
            $activeProject = $this->getCurrentActiveUserProjects(auth()->user()->id);
            $dokumentasi = Dokumentasi_Instalasi::where('laporan_instalasi_id', $activeProject->id_laporan)->where('keterangan', 'foto')->get();
            $dokumentasi_video = Dokumentasi_Instalasi::where('laporan_instalasi_id', $activeProject->id_laporan)->where('keterangan', 'video')->first();
            if ($dokumentasi || $dokumentasi_video) {
                return view('pages.users.buatLaporanTraining', ['status' => 'Allowed', 'namaProyek' => $activeProject->instansi->nama_instansi, 'dokumentasiFoto' => $dokumentasi, 'dokumentasiVideo' => $dokumentasi_video]);
            } else {
                return view('pages.users.buatLaporanTraining', ['status' => 'Allowed', 'namaProyek' => $activeProject->instansi->nama_instansi]);
            }
        } else {
            return view('pages.users.buatLaporanTraining', ['status' => 'Prohibited']);
        }
    }
    public function createLaporanTraining(LaporanTrainingRequest $request)
    {
        if ($this->checkProjectStatus(auth()->user()->id)) { 
            return redirect('laporan-training')->withInput($request->input())->withErrors(['failed' => 'Laporan gagal dibuat, anda tidak sedang mengerjakan proyek apapun']);
        } else {
            $activeProject = $this->getCurrentActiveUserProjects(auth()->user()->id);
            $dokumentasi = Dokumentasi_Instalasi::where('laporan_instalasi_id', $activeProject->id_laporan)->where('keterangan', 'foto')->get();
            $dokumentasi_video = Dokumentasi_Instalasi::where('laporan_instalasi_id', $activeProject->id_laporan)->where('keterangan', 'video')->first();
            if ($dokumentasi->count() >= 5 && $dokumentasi_video != null) {
                try {
                    $laporan_training = new Laporan_Training();
                    $laporan_training->laporan_instalasi_id = $activeProject->id_laporan;
                    $laporan_training->waktu_mulai_t = $this->convertToTimeStamps($request->waktuMulaiTraining);
                    $laporan_training->waktu_selesai_t = $this->convertToTimeStamps($request->waktuSelesaiTraining);
                    $laporan_training->informasi_tambahan = $request->informasiTambahan;
                    $laporan_training->save();

                    $activeProject->waktu_selesai = $this->convertToTimeStamps($request->waktuSelesaiTraining);
                    $activeProject->status = "Selesai";
                    $activeProject->save();

                    $log_laporan = new Log_Laporan();
                    $log_laporan->laporan_instalasi_id = $activeProject->id_laporan;
                    $log_laporan->log = "Laporan Training Berhasil Dibuat";
                    $log_laporan->save();


                    return redirect('daftar-proyek-instalasi')->with('training_report_s', 'Laporan Training Berhasil Dibuat');
                } catch (\Exception $e) {
                    return redirect('laporan-training')->withInput($request->input())->withErrors(['failed' => 'Laporan gagal dibuat, terjadi kesalahan pada sistem ']);
                }
            } else {
                return redirect('laporan-training')->withInput($request->input())->withErrors(['failed' => 'Laporan gagal dibuat, anda harus menyertakan dokumentasi minimal 5 foto dan 1 video']);
            }
        }
    }
}
