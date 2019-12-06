<?php

namespace App\Http\Controllers\Admin;

use App\Ticket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TicketsController extends Controller
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
        return view('admin.ticket.index', compact('pages', 'tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pages = 'newtic';
        return view('admin.ticket.crud.create', compact('pages'));
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
        return redirect()->route('tickets.index')->with('Success', 'Added new ticket, please wait for response');
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
        return redirect()->route('tickets.index')->with('Success', 'Updated Ticket #' . $tic->title);
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
