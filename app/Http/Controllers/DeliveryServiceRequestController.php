<?php

namespace App\Http\Controllers;

use App\Models\delivery_services_request;
use Illuminate\Http\Request;

use DB;

class DeliveryServiceRequestController extends Controller
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
 *     path="/api/deliveryServiceRequest",
 *     tags={"delivery Service Request"},
 *     summary="return a list of delivery Service Request",
 *     description="list of delivery Service Request",
 *     @OA\Response(response="200",
 *       description="a json array of delivery Service Request"),
 *     @OA\Schema(type="json", items="string"),
 *     
 * )
 */

        $deliverySR = delivery_services_request::paginate(8);
        return  $deliverySR->toJson(JSON_PRETTY_PRINT);
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
     *   path="/api/deliveryServiceRequest",
     *   tags={"delivery Service Request"},
     *   summary="create delivery Service Request",
     *   description="Get all request that have been send to a  delivery Service Request",
     * 
*         @OA\Parameter(
     *         name="amout",
     *         in="query",
     *         description="amout",
     *         required=true,
     *         @OA\Schema(
     *         type="decimal"
     *         ),
     *         style="form"
     *     ),

  *            @OA\Parameter(
     *         name="status",
     *         in="query",
     *         description="status",
     *         required=true,
     *         @OA\Schema(
     *         type="string"
     *         ),
     *         style="form"
     *     ),
     * *            @OA\Parameter(
     *         name="delivery_address_id",
     *         in="query",
     *         description="delivery address id",
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
     *     description="created",
     *     @OA\Schema(type="json"),
     *
     *   ),
     * )
     */


        $deliverySR = new delivery_services_request;
        $deliverySR->amout = $request->amout;
        $deliverySR->status = $request->status;
        $deliverySR->provider_id = $request->provider_id;
        $deliverySR->service_request_id = $request->service_request_id;
        $deliverySR->delivery_address_id = $request->delivery_address_id;
        $deliverySR->save();

        $deliverySR = delivery_services_request::find(1);

        $user = $deliverySR->address()->owner();

        $this->mail([
            'title' => 'Mail from ItSolutionStuff.com',
            'body' => ( 1 == $request->status) ? 'La request à été prise en cours' : 'Requete terminée',
            'email' => $user->email
        ]);

        return response()->json(['Request effectuée avec success'],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\delivery_service_request  $delivery_service_request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, delivery_services_request $deliveryServiceRequest)
    {
        //

        return $deliveryServiceRequest;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\delivery_service_request  $delivery_service_request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, delivery_services_request $deliveryServiceRequest)
    {

  /**
     * @OA\Patch(
     *   path="/api/deliveryServiceRequest/{deliveryServiceRequest} ",
     *   summary="update delivery Service Request",
     *    tags={"delivery Service Request"},
     *   description="Get all request that have been send to a delivery Service Request",
     * 
     *         @OA\Parameter(
     *         name="amout",
     *         in="query",
     *         description="amout",
     *         required=true,
     *         @OA\Schema(
     *         type="decimal"
     *         ),
     *         style="form"
     *     ),

  *            @OA\Parameter(
     *         name="status",
     *         in="query",
     *         description="status",
     *         required=true,
     *         @OA\Schema(
     *         type="string"
     *         ),
     *         style="form"
     *     ),
     * *            @OA\Parameter(
     *         name="delivery_address_id",
     *         in="query",
     *         description="delivery address id",
     *         required=true,
     *         @OA\Schema(
     *         type="BigInteger"
     *         ),
     *         style="form"
     *     ),  
     *     
     *     @OA\Response(
     *     response=201,
     *     description="updated",
     *     @OA\Schema(type="json"),
     *
     *   ),
     * )
     */


        $credentials = $request->only(['amout', 'delivery_address_id', 'status']);

        $deliveryServiceRequest->update($credentials);


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
 /**
     * @OA\Delete(
     *   path="/api/deliveryServiceRequest/{deliveryServiceRequest} ",
     *   summary="delete delivery Service Request by id",
     *   tags={"delivery Service Request"},
     *   description="delete adelivery Service Request",
     *     
     *     @OA\Response(
     *     response=200,
     *     description="deleted",
     *     @OA\Schema(type="json"),
     *
     *   ),
     * )
     */


        delivery_service_request::where('id',$delivery_service_request->id)->delete();
        return response()->json(['succes'=>'suppression effectuée avec succes'], 200);
    }
}
