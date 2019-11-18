<?php

namespace App\Http\Controllers\Root;

use App\Ad;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = 'ads';
        $ads = Ad::all();
        return view('root.ad.index', compact('ads', 'pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pages = 'adscreate';
        $ads = Ad::all();
        return view('root.ad.crud.create', compact('ads', 'pages'));
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
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'start_date' => 'required',
            'end_date' => 'required',
            'price' => 'required',
        ]);

        $imageName = time().'.'.request()->image->getClientOriginalExtension();

        $data = new Ad();
        $data->title = $request->title;
        $data->description = $request->description;
        $data->image_path = request()->image->move(public_path('images'), $imageName);
        $data->start_date = $request->start_date;
        $data->end_date = $request->end_date;
        $data->price = $request->price;
        $data->save();
        return redirect('root/ad');
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
        $post = Ad::find($id);
        $post->delete();

        return redirect('root/ad');
    }
}
