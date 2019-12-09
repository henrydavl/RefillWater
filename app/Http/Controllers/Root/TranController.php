<?php

namespace App\Http\Controllers\Root;

use App\Transaction;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class TranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = 'trans';
        $transaction = Transaction::all(); 
        return view('root.transaction.index', compact('transaction','pages'));  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pages = 'trancreate';
        $users = User::all()->where('role_id','=', 4);
        return view('root.transaction.crud.create', compact('users', 'pages'));
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
            'bottle' => 'required',
            'galon' => 'required',
            'user' => 'required',
            'id' => 'required'
        ]);

        $data = new transaction();
        $data->bottle= $request->bottle;
        $data->galon = $request->galon;
        $data->user_id = $request->user;
        $data->id = $request->id;
        $data->save();
        return redirect('root/transaction');
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
        $pages = 'tranedit';
        $transactions = transaction::find($id);
        return view('root.transaction.crud.edit', compact('transaction', 'pages'));
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
        // $this->validate($request,[
        //     'capacity' => 'required',
        //     'price' => 'required',
        // ]);

        // $data = Bottle::find($id);
        // $data->capacity = $request->capacity;
        // $data->price = $request->price;
        // $data->save();
        // return redirect('root/bottle');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = transaction::find($id);
        $post->delete();

        return redirect()->back()->with('Success', 'Deleted a transaction records');
    }
}
