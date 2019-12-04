<?php

namespace App\Http\Controllers\Auth;

//use App\Events\UserActivationEmail;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ActivationController extends Controller
{
    public function activate(Request $request){
        $user = User::where('email', $request->email)->where('activation_token', $request->token)->firstOrFail();
        $user->update(['active' => true, 'activation_token' => null]);
        return redirect()->route('user')->with('Success', 'Account activated! You may log in to application.');
    }

    public function showResendForm(){
        return view('auth.resend');
    }

    public function resend(Request $request){
        $this->validateResend($request);
        $user = User::where('email', $request->email)->first();
//        event(new UserActivationEmail($user));
        return redirect("/login")->with('Success','Activation link has been sent')->with('email', $request->email);
    }

    protected function validateResend(Request $request){
        $this->validate($request, [
            'email' => 'required|email|exists:users,email'
        ], [
            'email.exists' => 'This email is not exists. Please check your email input.'
        ]);
    }
}
