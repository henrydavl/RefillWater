<?php

namespace App\Http\Controllers\Root;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = 'Ticket';
        $tickets = \App\Ticket::all();
        return view('root.ticket.index', compact('tickets', 'pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pages = 'TicketCreate';
        $tickets = \App\Ticket::all();
        return view('root.ticket.crud.create', compact('tickets', 'pages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'description' => 'required',
            'submitted_by' => 'required',
            'responded_by' => 'required',
            'is_done' => 'required'
        ]);

        $data = new \App\Ticket();
        $data->title = $request->title;
        $data->description = $request->description;
        $data->submitted_by = $request->submitted_by;
        $data->responded_by = $request->responded_by;
        $data->is_done = $request->is_done;
        $data->save();
        return redirect('root/ticket');
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
        $post = \App\Ticket::find($id);
        $post->delete();

        return redirect('root/ticket');
    }
}
