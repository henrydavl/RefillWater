<?php

namespace App\Http\Controllers\Api\Auth;

use App\Events\ActivationEmail;
use App\User;
use Illuminate\Support\Facades\Route;
use Laravel\Passport\Client;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    /**
     * RegisterController constructor.
     */
    private $client;

    public function __construct()
    {
        $this->client = Client::find(2);
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'gender' => 'required',
            'majors' => 'required',
        ]);

        $user = $this->newUser($request->all());

        if (empty($user)){
            return response([
                'message' => 'Failed to create account, please try again'
            ]);
        } else {
            event(new ActivationEmail($user));
            return response([
                'message' => 'Account created, please verify your email'
            ]);
        }
    }

    protected function newUser(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'gender' => $data['gender'],
            'majors' => $data['majors'],
            'role_id' => 4,
            'activation_token' => Str::random(20),
        ]);
    }
}
