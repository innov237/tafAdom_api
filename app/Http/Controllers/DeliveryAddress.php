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
/**
 * @OA\Get(
 *     path="/api/deliveryAddress ",
 *     tags={"delivery Address"},
 *     summary="return a list of cities",
 *     description="list of delivery Address",
 *     @OA\Response(response="200",
 *       description="a json array of delivery Address"),
 *     @OA\Schema(type="json", items="string"),
 *     
 * )
 */
        
        $delivery_address = delivery_address::with(['user', 'city'])->paginate(8);
        return   $delivery_address->toJson(JSON_PRETTY_PRINT);
    }


    public function filterAddressByUser(Request $request, $id){
        $delivery_address = delivery_address::whereHas('user', function($q) use ($id) {
                $q->where('id', $id);
        })
            ->with(['user', 'city'])->paginate(8);
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

  /**
     * @OA\Post(
     *   path="/api/deliveryAddress",
     *   tags={"delivery Address"},
     *   summary="create delivery Address",
     *   description="Get all request that have been send to a delivery Address",


      *    @OA\Parameter(
     *         name="quater",
     *         in="query",
     *         description="quater ",
     *         required=true,
     *         @OA\Schema(
     *         type="string"
     *         ),
     *         style="form"
     *     ),
     *    @OA\Parameter(
     *         name="phone_number",
     *         in="query",
     *         description="phone number ",
     *         required=true,
     *         @OA\Schema(
     *         type="string"
     *         ),
     *         style="form"
     *     ),
     *    @OA\Parameter(
     *         name="user_id",
     *         in="query",
     *         description="id of user",
     *         required=true,
     *         @OA\Schema(
     *         type="integer"
     *         ),
     *         style="form"
     *     ),
     * *    @OA\Parameter(
     *         name="city_id",
     *         in="query",
     *         description="id of city",
     *         required=true,
     *         @OA\Schema(
     *         type="integer"
     *         ),
     *         style="form"
     *     ),
     * 
     *     @OA\Response(
     *     response=201,
     *     description="created",
     *     @OA\Schema(type="json"),
     *
     *   ),
     * )
     */


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
 /**
     * @OA\Patch(
     *   path="/api/deliveryAddress/{deliveryAddress} ",
     *   summary="update delivery Address ",
     *   tags={"delivery Address"},
     *   description="Get all request that have been send to a delivery Address",
     * 
     *    @OA\Parameter(
     *         name="quater",
     *         in="query",
     *         description="quater ",
     *         required=true,
     *         @OA\Schema(
     *         type="string"
     *         ),
     *         style="form"
     *     ),
     *    @OA\Parameter(
     *         name="phone_number",
     *         in="query",
     *         description="phone number ",
     *         required=true,
     *         @OA\Schema(
     *         type="string"
     *         ),
     *         style="form"
     *     ),
     *    @OA\Parameter(
     *         name="user_id",
     *         in="query",
     *         description="id of user",
     *         required=true,
     *         @OA\Schema(
     *         type="BigInteger"
     *         ),
     *         style="form"
     *     ),
     * *    @OA\Parameter(
     *         name="city_id",
     *         in="query",
     *         description="id of city",
     *         required=true,
     *         @OA\Schema(
     *         type="BigInteger"
     *         ),
     *         style="form"
     *     ),
     * 
     *     
     *     @OA\Response(
     *     response=201,
     *     description="updated",
     *     @OA\Schema(type="json"),
     *
     *   ),
     * )
     */


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
   /**
     * @OA\Delete(
     *   path="/api/deliveryAddress/{deliveryAddress} ",
     *   summary="delete delivery Address by id delivery Address ",
     *   tags={"delivery Address"},
     *   description="delete a delivery Address",  
     *     @OA\Response(
     *     response=200,
     *     description="deleted",
     *     @OA\Schema(type="json"),
     *
     *   ),
     * )
     */

        delivery_address::where('id',$delivery_address->id)->delete();
        return response()->json(['succes'=>'suppression effectuée avec succes'], 200);
    }
}
