<?php

namespace App\Http\Controllers\Api;

use App\Bottle;
use App\Http\Resources\BottleResource;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        //
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

    public function getMyBottle()
    {
        $bottles = Bottle::all()->where('user_id', Auth::id());
        return BottleResource::collection($bottles);
    }

    public function profile()
    {
        $user = User::find(Auth::id());
        if ($user == null) {
            return response([
                'message' => 'not found'
            ]);
        } else {
            return response([
                'data' => [
                    'name' => $user->name,
                    'email' => $user->email,
                    'balance' => intVal($user->balance),
                    'gender' => $user->gender,
                    'majors' => $user->majors,
                ]
            ]);
        }
    }

    public function editProfile(Request $request)
    {
        $data = $this->validator($request->all())->validate();
        $data['password'] = Hash::make($request->password);
        $user = User::findOrfail(Auth::id());
        $user->update($data);
        return response([
            'message' => 'Update success'
        ]);
    }

    private function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'sometimes|string|min:3',
            'majors' => 'sometimes|string|min:3',
            'password' => 'sometimes|string|min:8|confirmed'
        ], [
            'name.required' => 'We need to know your name',
            'majors.required' => 'We need to know your major',
        ]);
    }
}
