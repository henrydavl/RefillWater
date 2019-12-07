<?php

namespace App\Http\Controllers\Root;

use App\Galon;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class GalonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = 'gallons';
        $gallons = Gallons::all();
        return view('root.galon.index', compact('galon', 'pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pages = 'gallonscreate';
        $users = User::all()->where('role_id','=', 4);
        return view('root.galon.crud.create', compact('users', 'pages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'id' => 'required',
            'current_ml' => 'required',
            'description' => 'required'
        ]);

        $data = new gallon();
        $data->id = $request->id;
        $data->current_ml = $request->current_ml;
        $data->description = $request->description;
        $data->save();
        return redirect('root/galon');
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
        $pages = 'gallonsedit';
        $gallons = gallons::find($id);
        return view('root.galon.crud.edit', compact('galon', 'pages'));
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
        $this->validate($request,[
            'current_ml' => 'required',
            'description' => 'required',
        ]);

        $data = gallons::find($id);
        $data->current_ml = $request->current_ml;
        $data->description = $request->description;
        $data->save();
        return redirect('root/galon');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = gallons::find($id);
        $post->delete();

        return redirect('root/galon');
    }
}
