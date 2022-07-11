<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            return response()->json(User::with(['bicycle'])->get(), 200);
        } catch (\Exception $exception){
            return response()->json(['error' => $exception], 500);
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $user = User::create($request ->all());
            return response()->json($user, 201);

        } catch (\Exception $exception){
            return response()->json(['error' => $exception], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        try{
            return response()->json($user, 200);
        } catch (\Exception $exception){
            return response()->json(['error' => $exception], 500);
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        try{
            $user->update($request->all());
            return response()->json($user, 200);
        } catch (\Exception $exception){
            return response()->json(['error' => $exception], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();
            return response()->json(['message' => 'Deleted'], 205);
        } catch (Exception $exception) {
            return response()->json(['error' => $exception], 500);    }
    }

    public function search ($parameter)
    {

        try {
            return response()->json(User::where('user', 'LIKE', '%' . $parameter . '%')->orwhere('id', 'LIKE', '%' . $parameter . '%')->get(), 200);
        } catch (Exception $exception) {
            return response()->json(['error' => $exception], 500);
        }
    }
}
