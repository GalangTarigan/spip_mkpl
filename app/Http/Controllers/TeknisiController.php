<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AddTeknisiRequest;
use App\Http\Requests\UpdateTeknisi;
use App\Model\Laporan_Instalasi;
use App\Pkl\Traits\LaporanInstalasi;
use Webpatser\Uuid\Uuid;
use App\User;
use App\Model\Verifikasi_Teknisi;
use App\Mail\VerifikasiEmail;
use  Illuminate\Mail\Mailer as MailError;
use Illuminate\Support\Facades\Mail;

class TeknisiController extends Controller
{
    use LaporanInstalasi;

    public function listTeknisi(){
        $result = User::where('role', 'default')->get();
        return response()->json([
            'status' => "success","errors",
            'data' => $result
        ]);
    }

    public function formAddTeknisi(){
        return view('pages.admin.tambahTeknisi');
    }  
    
    public function indexDeleteUser(){
        return view('pages.admin.daftarTeknisi');
    }

    public function detailTeknisi(Request $request){
        $userProfile = User::where('uuid', $request->user)->first();
        $user = $request->name;
        return view('pages.admin.detailTeknisi', compact('user', 'userProfile'));
    }

    public function showUser(Request $request){ //table daftar seluruh teknisi pada halaman delete teknisi
        $data = User::where('role', '!=', 'admin')->get();
        return $data;
    }

    public function deleteUser(Request $request){ // function for delete user
        $data = $this->getTotalUserOnProgressProject($request->user);
        if ($data == 0) {
            User::where('id', '=', $request->user)->delete();
            return response()->json([
                'status' => true,
                'data' => 'Teknisi berhasil dihapus!!!',
            ]);
        }else{
            return response()->json([
                'status' => false,
                'data' => 'Teknisi masih dalam pengerjaan instalasi!!!',
            ]);
        }
    }



    public function addTeknisi(AddTeknisiRequest $request){ //addteknsii to db
        $user = new User();
        $user->nama_lengkap = $request->nama_lengkap;
        $user->uuid = (string)Uuid::generate();
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->alamat = $request->alamat;
        $user->nomor_telepon = $request->nomor_telepon;
        try{
            \Mail::to($user->email)->send(new VerifikasiEmail($user));
            $user->save();
            return redirect()->route('daftar-teknisi')->with('success', 'Teknisi berhasil ditambah, Silahkan beritahu teknisi untuk melakukan Verifikasi Email ');
        }catch(\Exception $e){
            return $e;
            //return redirect()->back()->with('failed', 'Periksa apakah email teknisi yang anda masukkan benar');
        }
    }

    public function editProfile(UpdateTeknisi $request){
        $id = User::where('uuid', $request->user)->firstOrFail();
        $data = User::find($id->id);
        if($request->email != null ) $data->email = $request->email;
        if($request->alamat != null ) $data->alamat = $request->alamat;
        if($request->no_telepon != null ) $data->no_telepon = $request->no_telepon;
        $data->save();
        return redirect()->back()->with('success', 'Teknisi berhasil diubah!!');
    }
    
    public function verifikasiTeknisi($token){
        $verifikasiUser = Verifikasi_Teknisi::where('token', $token)->first();
        if(isset($verifikasiUser) ){
            $user = $verifikasiUser->user;
            if(!$user->verified) {
            $verifikasiUser->user->verified = 1;
            $verifikasiUser->user->save();
            $message = "Email kamu berhasil diverifikasi, Kamu sekarang dapat melakukan Login.";
            } else {
            $message = "Email kamu sudah terverifikasi";
            }
        } else {
            return redirect('login')->with('errors', "Maaf email kamu tidak teridentifiaksi.");
        }
            return redirect('login')->with('success', $message);
        }
        public function coba(){
            return view('auth.verifikasi-teknisi');
        }



}