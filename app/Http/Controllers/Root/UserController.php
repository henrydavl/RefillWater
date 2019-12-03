<?php

namespace App\Http\Controllers\Root;

use App\Bottle;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
        return redirect()->back()->with('Success', 'Coming soon');
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
        $roles = Role::all();
        return view('root.user.crud.edit', compact('pages', 'roles', 'user'));
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
        return redirect()->back()->with('Success', 'Coming soon');
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
