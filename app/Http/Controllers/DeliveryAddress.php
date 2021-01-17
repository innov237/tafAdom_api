<?php

namespace App\Http\Controllers;

use App\Models\delivery_address;
use Illuminate\Http\Request;

class DeliveryAddress extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $delivery_address = DB::table('delivery_address')->get();
        return   $delivery_address->toJson(JSON_PRETTY_PRINT);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $delivery_address = new delivery_address;
        $delivery_address->quater= $request->quater;
        $delivery_address->phone_number = $request->phone_number;
        $delivery_address->user_id = $request->user_id;
        $delivery_address->city_id= $request->city_id;
        $delivery_address->save();

        return response()->jSon( [ 'success'=>'addresse de livraison enregistré avec succes'],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\delivery_address  $delivery_address
     * @return \Illuminate\Http\Response
     */
    public function show(delivery_address $delivery_address)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\delivery_address  $delivery_address
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $delivery_address = delivery_address::find($id);
        $delivery_address->quater= $request->quater;
        $delivery_address->phone_number = $request->phone_number;
        $delivery_address->user_id = $request->user_id;
        $delivery_address->city_id= $request->city_id;
        $delivery_address->save();

        return response()->jSon( [ 'success'=>'addresse de livraison enregistré avec succes'],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\delivery_address  $delivery_address
     * @return \Illuminate\Http\Response
     */
    public function destroy(delivery_address $delivery_address)
    {
        delivery_address::where('id',$delivery_address->id)->delete();
        return response()->json(['succes'=>'suppression effectuée avec succes'], 200);
    }
}
