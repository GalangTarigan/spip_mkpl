<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Http\Requests\GantiPasswordRequest;
use Hash;
use Validator;
use Illuminate\Http\Response;
use App\Http\Requests\UploadImageProfileRequest;

class UserController extends Controller
{
    public function showProfile()
    {
        $userProfile = User::select('nama_lengkap', 'email', 'no_telepon', 'alamat', 'photo')->where('id', Auth::user()->id)->get();
        if (auth()->user()->hasAdminRole()) {
            return view('pages.admin.profileAdmin')->with('data', $userProfile);
        } else {
            return view('pages.users.profile')->with('data', $userProfile);
        }
    }

    public function uploadImageProfile(UploadImageProfileRequest $request)
    {
        $id = User::where('uuid', $request->id)->firstOrFail();
        $user = User::find($id->id);
        $image = $request->file('image');
        $new_name = 'profile' . $user->id . '.' . $image->getClientOriginalExtension();
        $directory = 'user' . '/' . $new_name;
        if (Storage::disk('public')->exists($directory) && $user->photo != NULL) {
            if ($directory == $user->photo) {
                Storage::disk('public')->delete($directory);
                Storage::disk('public')->put($directory, File::get($image));
            } else {
                Storage::disk('public')->delete($user->photo);
                Storage::disk('public')->put($directory, File::get($image));
                $user->photo =  $directory;
                $user->save();
            }
        } else {
            if($directory == $user->photo){
                Storage::disk('public')->put($directory, File::get($image));
                $user->photo =  $directory;
                $user->save();
            }else{
                Storage::disk('public')->delete($user->photo);
                Storage::disk('public')->put($directory, File::get($image));
                $user->photo =  $directory;
                $user->save();
            }
                
        }
        $output = array(
            'success' => 'Image uploaded successfully',
            'src' => $directory
        );

        return response()->json($output);
    }
    public function getUserImage(Request $request)
    {
        $filename = $request->filename;
        $file = Storage::disk('public')->get($filename);
        return new Response($file, 200);
    }

    public function unreadNotifications()
    {
        return array(
            'msg' => auth()->user()->unreadNotifications()->limit(10)->get()->toArray(),
            'len' => auth()->user()->unreadNotifications()->count()
        );
    }
    public function allNotifications()
    {

        $result = auth()->user()->notifications()->get();
        if (auth()->user()->hasAdminRole()) {
            return view('pages.admin.notifikasiAdmin', compact('result'));
        } else {

            return view('pages.users.notifikasi', compact('result'));
        }
    }
    public function indexGantiPassword(Request $request)
    {
        $userProfile = User::where('id', auth()->user()->id)->get();
        if (auth()->user()->hasAdminRole()) return view('pages.admin.gantiPasswordAdmin', compact('users', 'userProfile'));
        else return view('pages.users.gantiPassword', compact('users', 'userProfile'));
    }

    public function gantiPassword(GantiPasswordRequest $request)
    {
        $user = Auth::user();
        $user->password = Hash::make($request->get('password'));
        $user->update();
        return redirect()->back()->with('success', 'Password telah dirubah');
    }
}
