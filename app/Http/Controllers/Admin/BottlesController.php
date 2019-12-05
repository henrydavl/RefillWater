<?php

namespace App\Http\Controllers\Admin;

use App\Bottle;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BottlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = 'bindex';
        $bottles = Bottle::all();
        return view('admin.bottle.index', compact('bottles', 'pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pages = 'bcreate';
        $users = User::all()->where('role_id','=', 4);
        return view('admin.bottle.crud.create', compact( 'pages', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Bottle::create($request->all());
        return redirect()->route('bottles.index')->with('Success', 'Added new bottle');
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
        $bot = Bottle::findOrFail($id);
        $bot->update($request->all());
        return redirect()->route('bottles.index')->with('Success', 'Update successful');
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
}
