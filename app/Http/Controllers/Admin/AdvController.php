<?php

namespace App\Http\Controllers\Admin;

use App\Ad;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AdvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = 'advlist';
        $ads = Ad::all();
        return view('admin.ad.index', compact('ads', 'pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pages = 'advnew';
        return view('admin.ad.crud.create', compact( 'pages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateImage();
        $input = $request->all();
        if ($file = $request->file('image')){
            $tmp = str_replace(" ", "-",$request->title);
            $type = $file->getClientOriginalExtension();
            $name = $tmp."_adsImage.".$type;
            $file->storeAs('public/image/', $name);
            $input['image_path'] = $name;
        }
        Ad::create($input);
        return redirect()->route('advertisement.index')->with('Success', 'Added new advertisement');
    }

    private function validateImage()
    {
        return request()->validate([
            'image' => 'required|image|max:5000'
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
        $ads = Ad::findOrFail($id);
        $this->validateImageUpdate();
        $input = $request->all();
        if ($file = $request->file('image')){
            $tmp = str_replace(" ", "-",$request->title);
            $type = $file->getClientOriginalExtension();
            $name = $tmp."_adsImage.".$type;
            $file->storeAs('public/image/', $name);
            $input['image_path'] = $name;
        }
        $ads->update($input);
        return redirect()->back()->with('Success', 'Ads #'.$ads->title.' updated');
    }

    private function validateImageUpdate()
    {
        return request()->validate([
            'qr_code' => 'sometimes|image|max:5000',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ads = Ad::findOrFail($id);
        $name = $ads->title;
        Storage::delete('public/image/'. $ads->image_path);
        $ads->delete();
        return redirect()->back()->with('Success', 'Ads #'.$name.' deleted');
    }
}
