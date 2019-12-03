<?php

namespace App\Http\Controllers\Root;

use App\TopUp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class TopUpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
         $pages = 'topUp';
         $topups = TopUp::all();
         return view('root.topUp.index', compact('topups', 'pages'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $pages = 'TopUpCreate';
        $topups = TopUp::all();
        return view('root.topUp.crud.create', compact('topups', 'pages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'amount' => 'required',
            'user_id' => 'required',
            'admin_id' => 'required'
        ]);

        $data = new TopUp();
        $data->amount = $request->amount;
        $data->user_id = $request->user_id;
        $data->admin_id = $request->admin_id;
        $data->save();
        return redirect('root/topup');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $post = TopUp::find($id);
        $post->delete();

        return redirect('root/topup');
    }
}
