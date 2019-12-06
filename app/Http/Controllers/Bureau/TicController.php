<?php

namespace App\Http\Controllers\Bureau;

use App\Ticket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::all()->where('submitted_by', Auth::id());
        $pages = 'ticket';
        return view('bureau.ticket.index', compact('pages', 'tickets'));
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
        $new = $request->all();
        $new['submitted_by'] = Auth::id();
        Ticket::create($new);
        return redirect()->back()->with('Success', 'Added new ticket, please wait for response');
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
        $tic = Ticket::findOrFail($id);
        $tic->update($request->all());
        return redirect()->back()->with('Success', 'Updated Ticket #' . $tic->title);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tic = Ticket::findOrFail($id);
        $name = $tic->title;
        $tic->delete();
        return redirect()->back()->with('Success', 'Deleted Ticket #'.$name);
    }
}
