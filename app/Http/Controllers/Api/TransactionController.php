<?php

namespace App\Http\Controllers\Api;

use App\Bottle;
use App\Gallon;
use App\Http\Resources\TransactionResources;
use App\Transaction;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
//     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trans = Transaction::all()->where('user_id', Auth::id());
        return TransactionResources::collection($trans);
    }

    private function validator(array $data)
    {
        return Validator::make($data, [
            'bottle_id' => 'bail|required|exists:bottles,id',
            'gallon_id' => 'required|exists:gallons,id',
        ], [
            'bottle_id.exists' => 'Bottle not exists',
            'gallon_id.exists' => 'Invalid QR Code',
            'bottle_id.required' => 'Bottle is required',
            'gallon_id.required' => 'Gallon is required',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validator($request->all())->validate();
//        ->where('user_id', Auth::id())
        $bottle = Bottle::findOrFail($request->bottle_id);
        $gallon = Gallon::findOrFail($request->gallon_id);
        $user = User::findOrFail(Auth::id());
        if ($user->balance >= $bottle->price) {
            $trans = Transaction::create([
                'user_id' => Auth::id(),
                'bottle_id' => $bottle->id,
                'gallon_id' => $gallon->id,
                'is_auto' => '1',
            ]);
            if (empty($trans)) {
                return response([
                    'message' => 'Something wrong, please try again!',
                ]);
            } else {
                $user->update(['balance'=> $user->balance - $bottle->price]);
                $gallon->update([
                    'current_ml' => $gallon->current_ml - $bottle->capacity,
                    'is_on' => '0',
                    'current_request' => $bottle->capacity,
                ]);
                return response([
                    'message' => 'Enjoy, keep hydrated',
                ]);
            }
        } else {
            return response([
                'message' => 'Not enough point!',
            ]);
        }
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
        //
    }
}
