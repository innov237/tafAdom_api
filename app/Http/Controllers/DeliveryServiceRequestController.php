<?php

namespace App\Http\Controllers;

use App\Models\delivery_service_request;
use Illuminate\Http\Request;

class DeliveryServiceRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deliverySR = DB::table('delivery_service_requests')->get();
        return  $service->toJson(JSON_PRETTY_PRINT);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $deliverySR = new delivery_service_request;
        $deliverySR->amout = $request->amout;
        $deliverySR->status = $request->status;
        $deliverySR->delivery_address_id = 1;
        $deliverySR->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\delivery_service_request  $delivery_service_request
     * @return \Illuminate\Http\Response
     */
    public function show(delivery_service_request $delivery_service_request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\delivery_service_request  $delivery_service_request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id, delivery_service_request $delivery_service_request)
    {
        $deliverySR = delivery_service_request::find($id);
        $deliverySR->amout = $request->amout;
        $deliverySR->status = $request->status;
        $deliverySR->delivery_address_id = 1;
        $deliverySR->save();

        return response()->json(['succes'=>'modification effectuée avec succes'],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\delivery_service_request  $delivery_service_request
     * @return \Illuminate\Http\Response
     */
    public function destroy(delivery_service_request $delivery_service_request)
    {
        delivery_service_request::where('id',$delivery_service_request->id)->delete();
        return response()->json(['succes'=>'suppression effectuée avec succes'], 200);
    }
}
