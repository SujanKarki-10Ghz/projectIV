<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

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
    //protected $redirectTo = '/home';
    //public function redirectTo()
    //{
        //if(Auth::user()->role_as == 'admin')
        //{
            //return 'dashboard';
        //}
        //elseif(Auth::user()->role_as ==NULL)
        //{
            //return '/';

        //}
    //}
    public function authenticated()
    {
        if(Auth::user()->role_as == 'admin')
        {
            return redirect('dashboard')->with('status', 'Welcome to Dashboard');
        }
        elseif(Auth::user()->role_as ==NULL)
        {
            return redirect()->back()->with('status', 'You are Logged In Successfully');

        }
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
}
