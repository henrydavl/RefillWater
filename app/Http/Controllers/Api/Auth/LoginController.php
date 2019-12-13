<?php

namespace App\Http\Controllers\Api\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Laravel\Passport\Client;

class LoginController extends Controller
{

    private $client;

    public function __construct()
    {
        $this->client = Client::find(2);
    }

    public function login(Request $request) // no need authorization
    {
        $user = [
            'email' => $request->email,
            'password' => $request->password,
            'role_id' => 4,
            'is_verified' => '1',
            'is_login' => '0',
            'is_active' => '1'
        ];

        $u = DB::table('users')->where('email', $request->email)->first();

        if ($u->is_verified == '1') {
            if ($u->is_active == '1') {
                if ($u->is_login == '0') {
                    if (Auth::attempt($user)){
                        $this->isLogin(Auth::id());
                        $params = [
                            'grant_type' => 'password',
                            'client_id' => $this->client->id,
                            'client_secret' => $this->client->secret,
                            'username' => request('email'),
                            'password' => request('password'),
                            'scope' => '*',
                        ];

                        $request->request->add($params);
                        $proxy = Request::create('oauth/token', 'POST');
                        return Route::dispatch($proxy);
                    } else {
                        return response([
                            'message' => 'Login failed',
                        ]);
                    }
                } else {
                    return response([
                        'message' => 'Account in use!',
                    ]);
                }
            } else {
                return response([
                    'message' => 'Account disabled',
                ]);
            }
        } else {
            return response([
                'message' => 'Please verify email address',
            ]);
        }
    }

    private function isLogin(int $id){
        $acc = User::findOrFail($id);
        return $acc->update([
            'is_login' => '1',
        ]);
    }

    public function refresh(Request $request) // need authorization (refresh_token)
    {
        $this->validate($request, [
            'refresh_token' => 'required',
        ]);

        $params = [
            'grant_type' => 'refresh_token',
            'client_id' => $this->client->id,
            'client_secret' => $this->client->secret,
            'username' => request('email'),
            'password' => request('password'),
        ];

        $request->request->add($params);
        $proxy = Request::create('oauth/token', 'POST');
        return Route::dispatch($proxy);
    }

    public function logout(Request $request) // need authorization
    {
        $user = Auth::user();
        $accessToken = Auth::user()->token();
        DB::table('oauth_refresh_tokens')
            ->where('access_token_id', $accessToken->id)
            ->update(['revoked' => true]);
        $user->update([
            'is_login' => '0',
        ]);
        $accessToken->revoke();

        return response([
            'message' => 'Logged out'
        ]);
    }

    public function forgotCheck(Request $request) // no need authorization
    {
        $acc = DB::table('users')->where('email', $request->email)->first();
        if ($acc == null) {
            return response([
                'message' => 'Account not found'
            ]);
        } else {
            return response([
                'message' => 'ok'
            ]);
        }
    }

    public function forgotPassword(Request $request) // no need authorization
    {
        $this->validator($request->all())->validate();
        $pass = Hash::make($request->password);
        $acc = DB::table('users')->where('email', $request->email)->update(['password' => $pass]);
        if ($acc) {
            return response([
                'message' => 'Password changed, you can log in'
            ]);
        } else {
            return response([
                'message' => 'Change password failed, please try again'
            ]);
        }
    }

    private function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'exists:users,email',
            'password' => 'required|string|min:8|confirmed'
        ], [
            'email.exists' => 'Email not found',
        ]);
    }
}
