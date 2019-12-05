<?php

namespace App\Http\Controllers\Admin;

use App\TopUp;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TopUpsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = 'tindex';
        $topups = TopUp::all();
        return view('admin.topUp.index', compact('pages', 'topups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pages = 'tnew';
        $users = User::all()->where('role_id', 4);
        return view('admin.topUp.crud.create', compact('pages', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        TopUp::create([
            'user_id' => $request->user_id,
            'amount' => $request->amount,
            'admin_id' => Auth::id(),
            'is_claimed' => '1',
        ]);

        $user = User::findOrFail($request->user_id);
        $user->update([
            'balance' => $request->amount,
        ]);

        return redirect()->route('top-up.index')->with('Success', 'Top Up Success');
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
        $top = TopUp::findOrFail($id);
        $user = User::findOrFail($top->user_id);
        $curr = $user->balance;
        $now = $curr - $top->amount;
        $user->update(['balance' => $now]);
        $top->delete();
        return redirect()->back()->with('Success', 'A Transaction Deleted');
    }
}
