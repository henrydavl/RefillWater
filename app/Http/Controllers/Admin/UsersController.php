<?php

namespace App\Http\Controllers\Admin;

use App\Events\ActivationEmail;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = 'ureg';
        $users = User::all()->where('role_id', 4);
        return view('admin.user.index', compact('pages', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pages = 'uadd';
        return view('admin.user.crud.create', compact('pages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateData($request);
        $user = $this->newUser($request->all());
        if (empty($user)){
            return redirect()->back()->with('Fail', 'Failed to add user');
        } else {
            event(new ActivationEmail($user));
            return redirect()->route('users.index')->with('Success', 'Added New User, Please tell them to verify their email');
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

    private function validateData($request){
        return $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function deactivate(Request $request)
    {
        $user = User::findOrFail($request->id);
        $user->update(['is_login' => '0', 'is_active' => '0']);
        return redirect()->back()->with('Success', 'User Deactivated');
    }

    public function activate(Request $request)
    {
        $user = User::findOrFail($request->id);
        $user->update(['is_login' => '0', 'is_active' => '1']);
        return redirect()->back()->with('Success', 'User Activated');
    }
}
