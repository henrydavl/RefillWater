<?php

namespace App\Http\Controllers\Api\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Passport\Client;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends Controller
{

    private $client;

    public function __construct()
    {
        $this->client = Client::find(2);
    }

    public function login(Request $request)
    {
        $user = [
            'email' => $request->email,
            'password' => $request->password,
            'role_id' => 4,
            'is_verified' => '1',
            'is_login' => '0',
            'is_active' => '1'
        ];

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
    }

    private function isLogin(int $id){
        $acc = User::findOrFail($id);
        return $acc->update([
            'is_login' => '1',
        ]);
    }

    public function refresh(Request $request)
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

    public function logout(Request $request)
    {
        $acc = User::findOrFail($request->id);
        $acc->update([
            'is_login' => '0',
        ]);
    }
}
