<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $remember_me = $request->has('remember_me') ? true : false;

        if (Auth::attempt(['email' => $email, 'password' => $password], $remember_me)) {
            if (Auth::user()->role['role_name'] == 'admin') {
                return redirect()->route('manageDashboard');
            } else {
                return redirect()->route('homePageIndex');
            }
        } else {
            return redirect()->route('login')
                ->with('error', 'Email-Address And Password Are Wrong.');
        }
    }
}
