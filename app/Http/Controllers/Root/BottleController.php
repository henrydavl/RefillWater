<?php

namespace App\Http\Controllers\Root;

use App\Bottle;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class BottleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = 'bottle';
        $bottles = Bottle::all();
        return view('root.bottle.index', compact('bottles', 'pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pages = 'bottlecreate';
        $bottle = Bottle::all();
        $users = User::all()->where('role_id','=', 4);
        return view('root.bottle.crud.create', compact('users', 'pages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userid = Auth::id();   

        $this->validate($request,[
            'capacity' => 'required',
            'price' => 'required',
            'user' => 'required'
        ]);

        $data = new Bottle();
        $data->capacity = $request->capacity;
        $data->price = $request->price;
        $data->user_id = $request->user;
        $data->save();
        return redirect('root/bottle');
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
        $pages = 'bottleedit';
        $bottle = Bottle::find($id);
        return view('root.bottle.crud.edit', compact('bottle', 'pages'));
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
            'capacity' => 'required',
            'price' => 'required',
        ]);

        $data = Bottle::find($id);
        $data->capacity = $request->capacity;
        $data->price = $request->price;
        $data->save();
        return redirect('root/bottle');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Bottle::find($id);
        $post->delete();

        return redirect('root/bottle');
    }
}
