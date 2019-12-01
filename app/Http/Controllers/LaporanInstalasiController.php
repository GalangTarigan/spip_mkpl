<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Notifications\reportCreated;
use App\Http\Requests\LaporanInstalasiBaruRequest;
use App\User;
use App\Pkl\Traits\LaporanInstalasi;
use App\Pkl\Traits\Convert;
use App\Pkl\Traits\WilayahIndonesia;
use App\Model\Laporan_Instalasi;
use App\Model\Instansi;
use App\Model\Kategori;
use App\Model\Daftar_Pic;
use App\Model\Log_Laporan;
use Webpatser\Uuid\Uuid;


class LaporanInstalasiController extends Controller
{
    use Convert, WilayahIndonesia, LaporanInstalasi;
    public function showFormInstalasi()
    {
        if ($this->checkProjectStatus(auth()->user()->id)) {
            return view('pages.users.buatLaporanInstalasiBaru', ['status' => 'Allowed']);
        } else {
            return view('pages.users.buatLaporanInstalasiBaru', ['status' => 'Prohibited']);
        }
    }

    /**
     * Create new laporan Instalasi
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createLaporanInstalasi(LaporanInstalasiBaruRequest $request)
    {
        //the request has been validated
        
        // check whether current user have active project
        if ($this->checkProjectStatus(auth()->user()->id)) {
            //create new laporan object
            $laporan = new Laporan_Instalasi();
            $laporan->uuid = (string) Uuid::generate();
            $laporan->user_id = $id = auth()->user()->id;
            $laporan->user_nama = auth()->user()->nama_lengkap;
            $laporan->waktu_mulai = $this->convertToTimeStamps($request->waktuMulaiInstalasi);
            $laporan->status = "Dalam Pengerjaan";
            $laporan->instansi_id = $request->daftarInstansi;

            //create new pic object
            if ($request->namaPic != null && $request->nomorTelepon != null) {
                $pic = new Daftar_Pic();
                $pic->instansi_id = $request->daftarInstansi;
                $pic->nama_pic = $request->namaPic;
                $pic->kontak_pic = $request->nomorTelepon;
                $pic->save();
            }

            //create new log laporan object
            $log = new Log_Laporan();
            $log->log = "Laporan Instalasi Baru Berhasil Dibuat";


            //saving to database
            DB::transaction(function () use ($laporan, $log) {
                $laporan->save();
                $log->laporan_instalasi_id = $laporan->id_laporan;
                $log->save();
            });


            //check whether laporan instalasi was successfully created
            if ($laporan && $log) {
                $author = User::find($laporan->user_id);
                $admin = User::where('role', 'admin')->get();
                //notify admins
                foreach ($admin as $user) {
                    $user->notify(new reportCreated($author, $laporan));
                }
                //notify user
                $author->notify(new reportCreated($author, $laporan));
                return redirect('daftar-proyek-instalasi')->with('installation_report_s', 'Laporan Instalasi Berhasil Dibuat');
            } else {
                return redirect()->route('dashboard')->withErrors(['failed' => 'Laporan gagal dibuat']);
            }
        } else {
            return redirect()->route('dashboard')->withErrors(['failed' => 'Laporan gagal dibuat, anda harus menyelesaikan laporan anda terlebih dahulu']);
        }
    }

    /**
     * Get user reports
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getByUser(Request $request)
    {
        $result = $this->getUserReports(auth()->user()->id);
        return response()->json([
            'status' => "success",
            'data' => $result
        ]);
    }
    /**
     * Get specific report
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getSpecificReport(Request $request)
    {
        $laporan = Laporan_Instalasi::where('uuid', $request->laporan)->firstOrFail();
        $id_laporan = $laporan->id_laporan;
        if ($laporan) {
            $instansi = Laporan_Instalasi::findOrFail($id_laporan)->instansi;
            $daftar_pic = Instansi::findOrFail($laporan->instansi_id)->daftar_pic;
            $laporan_berkala = Laporan_Instalasi::findOrFail($id_laporan)->laporan_berkala;
            $laporan_training = Laporan_Instalasi::findOrFail($id_laporan)->laporan_training;
            $dokumentasi_instalasi = Laporan_Instalasi::findOrFail($id_laporan)->dokumentasi;
            if (auth()->user()->role == 'admin') {
                return view('pages.admin.detailLaporanAdmin', compact('laporan', 'instansi', 'daftar_pic', 'laporan_berkala', 'laporan_training', 'dokumentasi_instalasi'));
            } else {
                return view('pages.users.detailLaporan', compact('laporan', 'instansi', 'daftar_pic', 'laporan_berkala', 'laporan_training', 'dokumentasi_instalasi'));
            }
        } else {
            $data['title'] = '404';
            $data['name'] = 'Page not found';
            return response()
                ->view('errors.404', $data, 404);
        }
    }
    public function downloadPdf(Request $request)
    {
        $laporan = Laporan_Instalasi::where('uuid', $request->laporan)->firstOrFail();
        $id_laporan = $laporan->id_laporan;

        $instansi = Laporan_Instalasi::findOrFail($id_laporan)->instansi;
        $daftar_pic = Instansi::findOrFail($laporan->instansi_id)->daftar_pic;
        $laporan_berkala = Laporan_Instalasi::findOrFail($id_laporan)->laporan_berkala;
        $laporan_training = Laporan_Instalasi::findOrFail($id_laporan)->laporan_training;
        return view('print.laporan-instalasi', compact('laporan', 'instansi', 'daftar_pic', 'laporan_berkala', 'laporan_training'));
    }
}
