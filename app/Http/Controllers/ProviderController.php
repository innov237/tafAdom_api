<?php

namespace App\Http\Controllers;

use App\Models\provider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provider = DB::table('providers')->get();
        return  $provider->toJson(JSON_PRETTY_PRINT);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $provider = new provider;
        $provider->name = $request->name;
        $provider->email = $request->email;
        $provider->phone_number = $request->phone_number;
        $provider->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function show(provider $provider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $provider = provider::find($id);
        $provider->name = $request->name;
        $provider->email = $request->email;
        $provider->phone_number = $request->phone_number;
        $provider->save();

        return response()->json(['succes'=>'modification effectuée avec succes'],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function destroy(provider $provider)
    {
        provider::where('id',$provider->id)->delete();
        return response()->json(['succes'=>'suppression effectuée avec succes'], 200);
    }
}
