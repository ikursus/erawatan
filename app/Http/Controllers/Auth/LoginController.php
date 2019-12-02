<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
use DB;
use Auth;

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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

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
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }


    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return Response
     */
    public function login(Request $request)
    {
        // Dapatkan no kp
        $nokp = $request->input('nokp');

        $pengguna = DB::connection('mysqldbrujukan')
        ->table('tblpengguna')
        ->where('penggunanokp', $nokp)
        ->first();
        //->select('select * from tblpengguna where penggunanokp = :nokp LIMIT 1', ['nokp' => $nokp]);
        // Die and dump
        //dd($pengguna);

        Auth::loginUsingId($pengguna->id);

        return redirect()->intended('home');

        // $credentials = $request->only('penggunanokp', 'penggunakatalaluan');

        // if (Auth::attempt($credentials)) {
        //     // Authentication passed...
        //     return redirect()->intended('dashboard');
        // }
    }
}
