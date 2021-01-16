<?php

namespace App\Http\Controllers;

use App\Models\cities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class CitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $citie = DB::table('cities')->get();
        return  $citie->toJson(JSON_PRETTY_PRINT);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cities = new cities;
        $cities->name = $request->name;
        $cities->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cities  $cities
     * @return \Illuminate\Http\Response
     */
    public function show(cities $cities)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cities  $cities
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id, cities $cities)
    {
        $cities = cities::find($id);
        $cities->name = $request->name;
        $cities->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cities  $cities
     * @return \Illuminate\Http\Response
     */
    public function destroy(cities $cities)
    {
        cities::where('id',$cities->id)->delete();
        return response()->json(['succes'=>'suppression effectuée avec succes'], 200);
    }
}
