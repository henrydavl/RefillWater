<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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
    protected $redirectTo = '/';

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
        $root = [
            'email' => $request->email,
            'password' => $request->password,
            'role_id' => 1,
            'is_verified' => '1'
        ];

        $admin = [
            'email' => $request->email,
            'password' => $request->password,
            'role_id' => 2,
            'is_verified' => '1'
        ];

        $bureau = [
            'email' => $request->email,
            'password' => $request->password,
            'role_id' => 3,
            'is_verified' => '1'
        ];

        if (Auth::attempt($root)) {
            return redirect()->route('root');
        }elseif (Auth::attempt($admin)){
            return redirect()->route('admin');
        }elseif (Auth::attempt($bureau)){
            return redirect()->route('bureau');
        }
        return redirect()->route('login');
    }
}
