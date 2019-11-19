<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;




class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;
    /*use AuthenticatesUsers {
        AuthenticatesUsers::showLoginForm as showLoginAdminForm;
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    /**
     * Show login form for admin
     *
     * @return view
     *
    *public function showLoginAdminForm()
    *{
     *   return view('auth.loginAdmin');
    *}
    */

     /**
     * Where to redirect users after login.
     *
     * @return redirect
     */
    protected function authenticated(Request $request, $user)
    {
        if ($user->verified) {
            if (auth()->user()->hasAdminRole()) { // magic happens here
                return redirect()->route('dashboardAdmin');
            }else{
                return redirect()->route('dashboard');
            }
        }
        else{
            auth()->logout();
            return back()->with('error', 'Kamu Harus melakukan konfirmasi email. Kami Telah Mengirimkan perintah verifikasi email, Silahkan Periksa Email Kamu');
     }
    }
}
