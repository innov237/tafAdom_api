<?php

namespace App\Http\Controllers;

use App\Models\service_request;
use Illuminate\Http\Request;

class ServiceRequestController extends Controller
{
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sr = service_request::with(['serviceUser'])->get();
        return  $sr->toJson(JSON_PRETTY_PRINT);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $service_r = new service_request;
        $service_r->data_solicition = $request->data_solicition ;
        $service_r->provider_id = $request->provider_id;
        $service_r->time_solicitation = $request->time_solicitation;
        $service_r->delivery_request_price_id = 1;
        $service_r->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\service_r_request  $service_r_request
     * @return \Illuminate\Http\Response
     */
    public function show(service_r_request $service_r_request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\service_r_request  $service_r_request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id, service_r_request $service_r_request)
    {
        $service_r = service_request::find($id);
        $service_r->data_solicition = $request->data_solicition ;
        $service_r->provider_id = $request->provider_id;
        $service_r->time_solicitation = $request->time_solicitation;
        $service_r->delivery_request_price_id = 1;
        $service_r->save();

        return response()->json(['succes'=>'modification effectuée avec succes'],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\service_r_request  $service_r_request
     * @return \Illuminate\Http\Response
     */
    public function destroy(service_r_request $service_r_request)
    {
        ServiceRequest::where('id',$service_r->id)->delete();
        return response()->json(['succes'=>'suppression effectuée avec succes'], 200);
    }
}
