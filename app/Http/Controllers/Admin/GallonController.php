<?php

namespace App\Http\Controllers\Admin;

use App\Gallon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GallonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = 'gallon';
        $gallons = Gallon::all();
        return view('admin.gallon.index', compact('pages', 'gallons'));
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
        $this->validateData($request);
        $gallon = Gallon::create($request->all());
        if (empty($gallon)){
            return redirect()->back()->with('Fail', 'Failed to add gallon');
        } else {
            return redirect()->back()->with('Success', 'Added new Gallon '.$request->id);
        }
    }

    private function validateData($request)
    {
        return $request->validate([
            'id' => 'required|unique:gallons',
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

        $g = Gallon::findOrFail($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $g = Gallon::findOrFail($id);
        $g->delete();
        return redirect()->back()->with('Success', 'Deleted Gallon #'.$id);
    }
}
