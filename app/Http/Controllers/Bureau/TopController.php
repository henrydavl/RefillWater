<?php

namespace App\Http\Controllers\Bureau;

use App\TopUp;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = 'reward';
        $topups = TopUp::all()->where('admin_id', Auth::id());
        $users = User::all()->where('role_id', 4);
        return view('bureau.reward.index', compact('pages', 'topups', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'is_claimed' => '0',
        ]);

        return redirect()->back()->with('Success', 'Added new reward');
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
        $name = $user->name;
        $top->delete();
        return redirect()->back()->with('Success', 'Reward #'.$id.' to '.$name.' canceled');
    }
}
