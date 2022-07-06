<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            return response()->json(Todo::all(), 200);
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
            $todo = Todo::create($request ->all());
            return response()->json($todo, 201);

        } catch (\Exception $exception){
            return response()->json(['error' => $exception], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        try{
            return response()->json($todo, 200);
        } catch (\Exception $exception){
            return response()->json(['error' => $exception], 500);
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $todo)
    {
        try{
            $todo->update($request->all());
            return response()->json($todo, 200);
        } catch (\Exception $exception){
            return response()->json(['error' => $exception], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        try {
            $todo->delete();
            return response()->json(['message' => 'Deleted'], 205);
        } catch (Exception $exception) {
            return response()->json(['error' => $exception], 500);    }
    }

    public function search ($parameter)
    {

        try {
            return response()->json(Todo::where('todo', 'LIKE', '%' . $parameter . '%')->orwhere('id', 'LIKE', '%' . $parameter . '%')->get(), 200);
        } catch (Exception $exception) {
            return response()->json(['error' => $exception], 500);
        }
    }
}
