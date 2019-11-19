<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UploadImageRequest;
use App\Http\Requests\UploadVideoRequest;
use App\Pkl\Traits\LaporanInstalasi;
use App\Model\Dokumentasi_Instalasi;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
use Webpatser\Uuid\Uuid;

class DokumentasiController extends Controller
{
    use LaporanInstalasi;
    public function uploadImages(UploadImageRequest $request)
    {

        $activeProject = $this->getCurrentActiveUserProjects(auth()->user()->id);
        $id_laporan = $activeProject->id_laporan;
        $count = Dokumentasi_Instalasi::where('keterangan', 'foto')->where('laporan_instalasi_id', $id_laporan)->get()->count();
        if ($request->hasFile('images')) {
            $images_dir = array();
            $uuid_ = array();
            if ($count + count($request->images) > 15) {
                return response()->json([
                    'success' => false,
                    'data' => 'Jumlah foto maksimal 15'
                ]);
            }
            foreach ($request->file('images') as $image) {
                $photo = $image;
                $rand = substr(uniqid('', true), -5);
                $new_name = 'foto_' . $id_laporan . '_' . $rand . '.' . $photo->getClientOriginalExtension();
                $directory = 'dokumentasi/foto' . '/' . $new_name;
                Storage::disk('public')->put($directory, File::get($photo));
                $uuid = (string)Uuid::generate();
                Dokumentasi_Instalasi::create([
                    'laporan_instalasi_id' => $id_laporan,
                    'uuid' => $uuid,
                    'keterangan' => 'foto',
                    'dokumentasi' => $directory
                ]);
                $count++;
                array_push($images_dir, $directory);
                array_push($uuid_, $uuid);
            }

            return response()->json([
                'success' => true,
                'data' => $uuid_,
                'directory' => $images_dir
            ]);
        }
    }
    public function deleteImage(Request $request)
    {
        $uuid = $request->uuid;
        $dokumen = Dokumentasi_Instalasi::where('uuid', $uuid)->firstOrFail();
        $directory = $dokumen->dokumentasi;
        if (Storage::disk('public')->exists($directory) && $directory != null) {
            Storage::disk('public')->delete($directory);
            Dokumentasi_Instalasi::where('uuid', $uuid)->delete();
            return response()->json([
                'success' => true,
                'data' => 'Foto berhasil dihapus'
            ]);
        }
        return response()->json([
            'success' => false,
            'data' => 'Foto tidak dapat dihapus'
        ]);
    }
    public function getImage(Request $request)
    {
        $uuid = $request->foto;
        $filename = Dokumentasi_Instalasi::where('uuid', $uuid)->firstOrFail();
        $directory = $filename->dokumentasi;
        $file = Storage::disk('public')->get($directory);
        //$file = storage_path('app/public/'.$filename);
        return new Response($file, 200);
        ////return response()->download($file);
    }
    public function uploadVideo(UploadVideoRequest $request)
    {
        $activeProject = $this->getCurrentActiveUserProjects(auth()->user()->id);
        $id_laporan = $activeProject->id_laporan;
        $count = Dokumentasi_Instalasi::where('keterangan', 'video')->where('laporan_instalasi_id', $id_laporan)->get()->count();
        if ($count >= 1) {
            return response()->json([
                'success' => false,
                'data' => 'Jumlah video maksimal 1'
            ]);
        }
        if ($request->hasFile('video')) {
            $video = $request->file('video');
            $rand = substr(uniqid('', true), -5);
            $new_name = 'video_' . $id_laporan . '_' . $rand . '.' . $video->getClientOriginalExtension();
            $directory = 'dokumentasi/video' . '/' . $new_name;
            Storage::disk('public')->put($directory, File::get($video));
            Dokumentasi_Instalasi::create([
                'laporan_instalasi_id' => $id_laporan,
                'uuid' => (string)Uuid::generate(),
                'keterangan' => 'video',
                'dokumentasi' => $directory
            ]);
            return response()->json([
                'success' => true,
                'data' => 'Video berhasil ditambahkan'
            ]);
        }
    }
    public function deleteVideo(Request $request){
        $activeProject = $this->getCurrentActiveUserProjects(auth()->user()->id);
        $id_laporan = $activeProject->id_laporan;
        $directory_v = Dokumentasi_Instalasi::where('laporan_instalasi_id', $id_laporan)->where('keterangan', 'video')->first();
        if (Storage::disk('public')->exists($directory_v->dokumentasi) && $directory_v != null) {
            Storage::disk('public')->delete($directory_v->dokumentasi);
            Dokumentasi_Instalasi::where('dokumentasi', $directory_v->dokumentasi)->delete();
            return response()->json([
                'success' => true,
                'data' => 'Video berhasil dihapus'
            ]);
        }
        return response()->json([
            'success' => false,
            'data' => 'Video tidak dapat dihapus'
        ]);
    }
    public function downloadImages(Request $request){
        $uuid = $request->foto;
        $filename = Dokumentasi_Instalasi::where('uuid', $uuid)->firstOrFail();
        $file = storage_path('app/public/'.$filename->dokumentasi);
        return response()->download($file);
    }
    public function downloadVideo(Request $request){
        $uuid = $request->video;
        $filename = Dokumentasi_Instalasi::where('uuid', $uuid)->firstOrFail();
        $file = storage_path('app/public/'.$filename->dokumentasi);
        return response()->download($file);
    }
}
