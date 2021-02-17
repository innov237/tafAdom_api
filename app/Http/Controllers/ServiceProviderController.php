<?php

namespace App\Http\Controllers;

use App\Models\service_provider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $service_provider = service_provider::with(['provider','service'])->paginate(8);
        return  $service_provider->toJson(JSON_PRETTY_PRINT);
    }

    public function filterByService(Request $request, $uuid)
    {
        $service_provider = service_provider::services($uuid)->with(['provider','service'])->paginate(8);
        return  $service_provider->toJson(JSON_PRETTY_PRINT);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $service_provider = new service_provider;
        $service_provider->id_service = $request->id_service;
        $service_provider->id_provider  = $request->id_provider ;
        $service_provider->save();

        return response()->jSon( [ 'success'=>'service provider enregistré avec succes'],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\service_provider  $service_provider
     * @return \Illuminate\Http\Response
     */
    public function show(service_provider $service_provider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\service_provider  $service_provider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, service_provider $service_provider)
    {
        $categorie = service_provider::find($id);
        $service_provider->id_service = $request->id_service;
        $service_provider->id_provider  = $request->id_provider ;
        $service_provider->save();
        return response()->json(['succes'=>'modification effectuée avec succes'],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\service_provider  $service_provider
     * @return \Illuminate\Http\Response
     */
    public function destroy(service_provider $service_provider)
    {
        service_provider::where('id',$service_provider->id)->delete();
        return response()->json(['succes'=>'suppression effectuée avec succes'], 200);
    }
}
