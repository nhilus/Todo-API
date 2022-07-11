<?php

namespace App\Http\Controllers;

use App\Country;
use App\User;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            return response()->json(Country::with(['user'])->get(), 200);
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
            $country = Country::create($request ->all());
            return response()->json($country, 201);

        } catch (\Exception $exception){
            return response()->json(['error' => $exception], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        try{
            return response()->json($country, 200);
        } catch (\Exception $exception){
            return response()->json(['error' => $exception], 500);
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Country $country)
    {
        try{
            $country->update($request->all());
            return response()->json($country, 200);
        } catch (\Exception $exception){
            return response()->json(['error' => $exception], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        try {
            $country->delete();
            return response()->json(['message' => 'Deleted'], 205);
        } catch (Exception $exception) {
            return response()->json(['error' => $exception], 500);    }
    }

    public function search ($parameter)
    {

        try {
            return response()->json(Country::where('country', 'LIKE', '%' . $parameter . '%')->orwhere('id', 'LIKE', '%' . $parameter . '%')->get(), 200);
        } catch (Exception $exception) {
            return response()->json(['error' => $exception], 500);
        }
    }
}
