<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    // ログインの対象カラムを変更する
    public function username()
    {
        return 'login_id';
    }

    protected function attemptLogin(Request $request)
    {
        $loginId = $request->input('login_id');
        $password = $request->input('password');

        if (filter_var($loginId, \FILTER_VALIDATE_EMAIL)) {
            $credentials = ['email' => $loginId, 'password' => $password];
        } else {
            $credentials = [$this->username() => $loginId, 'password' => $password];
        }

        return $this->guard()->attempt($credentials, $request->filled('remember'));
    }

    // ログイン成功後の処理
    public function authenticated(Request $request, $user)
    {
        return response()->json(['data'=>[], 'messages'=>"ログイン成功"],200);
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
