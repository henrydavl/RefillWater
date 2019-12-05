<?php

namespace App\Http\Controllers\Root;

use App\Bottle;
use App\Events\ActivationEmail;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
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
        return view('root.user.list.user', compact('pages', 'users'));
    }

    public function root()
    {
        $ids = Auth::id();
        $pages = 'uadm';
        $admin = User::all()->where('role_id', 1)->where('id', '!=', $ids);
        return view('root.user.list.root', compact('pages', 'admin'));
    }

    public function admin()
    {
        $pages = 'usc';
        $sc = User::all()->where('role_id', 2);
        return view('root.user.list.admin', compact('pages', 'sc'));
    }

    public function bureau()
    {
        $pages = 'ubur';
        $bur = User::all()->where('role_id', 3);
        return view('root.user.list.bureau', compact('pages', 'bur'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pages = 'uadd';
        $roles = Role::all();
        return view('root.user.crud.create', compact('pages', 'roles'));
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
        if ($request->role_id != 4){
            $user = $this->new($request->all());
            if (empty($user)){
                return redirect()->back()->with('Fail', 'Failed to add user');
            } else {
                switch ($request->role_id){
                    case 1:
                        return redirect()->route('user.root')->with('Success', 'Added New Admin Root');
                        break;
                    case 2:
                        return redirect()->route('user.admin')->with('Success', 'Added New Admin Student Org.');
                        break;
                    case 3:
                        return redirect()->route('user.bureau')->with('Success', 'Added New Admin Bureau');
                        break;
                }
            }
        } else {
            $user = $this->newUser($request->all());
            if (empty($user)){
                return redirect()->back()->with('Fail', 'Failed to add user');
            } else {
                event(new ActivationEmail($user));
                return redirect()->route('user.index')->with('Success', 'Added New User, Please tell them to verify their emails');
            }
        }
        return redirect()->back()->with('Success', 'Coming soon');
    }

    protected function newUser(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'gender' => $data['gender'],
            'majors' => $data['majors'],
            'role_id' => $data['role_id'],
            'activation_token' => Str::random(20),
        ]);
    }

    protected function new(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'gender' => $data['gender'],
            'majors' => $data['majors'],
            'role_id' => $data['role_id'],
            'is_verified' => '1',
            'is_active' => '1',
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
        $pages = 'uedt';
        $user = User::findOrFail($id);
        return view('root.user.crud.edit', compact('pages', 'user'));
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
        $user = User::findOrFail($id);
        if(trim($request->password) == ''){
            $input = $request->except('password');
        }else{
            $input = $request->all();
            $input['password'] = Hash::make($request->password);
        }
        $user->update($input);
        switch ($user->role_id){
            case 1:
                return redirect()->route('user.root')->with('Success', 'Updated Admin Root '. $user->name);
                break;
            case 2:
                return redirect()->route('user.admin')->with('Success', 'Updated Admin Student Org. ' . $user->name);
                break;
            case 3:
                return redirect()->route('user.bureau')->with('Success', 'Updated  Admin Bureau ' . $user->name);
                break;
            case 4:
                return redirect()->route('user.index')->with('Success', 'Updated user ' . $user->name);
                break;
        }
        return redirect()->back()->with('Fail', 'Failed to Update user '. $user->name);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $name = $user->name;
        Bottle::where('user_id', $id)->delete();
        $user->delete();
        return redirect()->back()->with('Success', 'Deleted User '.$name);
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
