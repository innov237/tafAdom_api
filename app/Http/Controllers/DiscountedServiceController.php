<?php

namespace App\Http\Controllers;

use App\Models\discounted_service;
use Illuminate\Http\Request;

class DiscountedServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $discounted_service = DB::table('discounted_services')->get();
        return  $discounted_service->toJson(JSON_PRETTY_PRINT);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $discounted_service = new discounted_service;
        $discounted_service->start_date = $request->start_date;
        $discounted_service->start_date = $request->start_date;
        $discounted_service->reduction = $request->reduction;
        $discounted_service->service_id =1;
        $discounted_service->save();

        return response()->jSon( [ 'success'=>'promotion enregistrée avec succes'],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\discounted_service  $discounted_service
     * @return \Illuminate\Http\Response
     */
    public function show(discounted_service $discounted_service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\discounted_service  $discounted_service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, discounted_service $discounted_service)
    {
        $categorie = discounted_service::find($id);
        $discounted_service->start_date = $request->start_date;
        $discounted_service->start_date = $request->start_date;
        $discounted_service->reduction = $request->reduction;
        $discounted_service->service_id =1;
        $discounted_service->save();

        return response()->jSon( [ 'success'=>'modication enregistrée avec succes'],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\discounted_service  $discounted_service
     * @return \Illuminate\Http\Response
     */
    public function destroy(discounted_service $discounted_service)
    {
        //
    }
}
