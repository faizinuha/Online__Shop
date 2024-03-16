<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginRegisterController extends Controller
{
    /**
     * Instantiate a new LoginRegisterController instance.
     */
    public function __construct()
    {
        $this->middleware('guest')->except([
            'logout', 'home'
        ]);
        $this->middleware('auth')->only('logout', 'home');
        $this->middleware('verified')->only('home');
    }

    /**
     * Display a registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function register()
    {
        return view('auth.register');
    }

    /**
     * Store a new user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Your store method implementation remains the same
    }

    /**
     * Display a login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('auth.login');
    }

    /**
     * Authenticate the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        // Your authenticate method implementation remains the same
    } 
    
    /**
     * Display a home to authenticated & verified users.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        return view('auth.home');
    } 
    
    /**
     * Log out the user from application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')
            ->withSuccess('You have logged out successfully!');
    }

    /**
     * Redirect unauthorized users trying to access home.
     *
     * @return \Illuminate\Http\Response
     */
    public function unauthorized()
    {
        return redirect()->route('login')->withError('Silakan login terlebih dahulu untuk mengakses halaman ini.');
    }
}
