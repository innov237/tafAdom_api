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
                /**
 * @OA\Get(
 *     path="/api/serviceRequest",
 *     tags={"service Request"},
 *     summary="return a list of service Request",
 *     description="list of service Request",
 *     @OA\Response(response="200",
 *       description="a json array of service Request"),
 *     @OA\Schema(type="json", items="string"),
 *     
 * )
 */

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
/**
     * @OA\Post(
     *   path="/api/serviceRequest",
     *   tags={"service Request"},
     *   summary="create service Request",
     *   description="Get all request that have been send to a service Request",


      *    @OA\Parameter(
     *         name="data_solicition",
     *         in="query",
     *         description="data solicition ",
     *         required=true,
     *         @OA\Schema(
     *         type="date"
     *         ),
     *         style="form"
     *     ),
     *    @OA\Parameter(
     *         name="end_date",
     *         in="query",
     *         description="end date",
     *         required=true,
     *         @OA\Schema(
     *         type="date"
     *         ),
     *         style="form"
     *     ),
     *    @OA\Parameter(
     *         name="provider_id",
     *         in="query",
     *         description="id of provider",
     *         required=true,
     *         @OA\Schema(
     *         type="BigInteger"
     *         ),
     *         style="form"
     *     ),
     * *    @OA\Parameter(
     *         name="delivery_request_price_id",
     *         in="query",
     *         description="id of delivery requestprice",
     *         required=true,
     *         @OA\Schema(
     *         type="BigInteger"
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

        $service_r = new service_request;
        $service_r->data_solicition = $request->data_solicition ;
        $service_r->provider_id = $request->provider_id;
        $service_r->time_solicitation = $request->time_solicitation;
        $service_r->delivery_request_price_id = $request->delivery_request_price_id;
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

    /**
     * @OA\Patch(
     *   path="/api/serviceRequest/{serviceRequest} ",
     *   summary="update service Request ",
     *    tags={"service Request"},
     *   description="Get all request that have been send to a service",
     * 
      *    @OA\Parameter(
     *         name="data_solicition",
     *         in="query",
     *         description="data solicition ",
     *         required=true,
     *         @OA\Schema(
     *         type="date"
     *         ),
     *         style="form"
     *     ),
     *    @OA\Parameter(
     *         name="end_date",
     *         in="query",
     *         description="end date",
     *         required=true,
     *         @OA\Schema(
     *         type="date"
     *         ),
     *         style="form"
     *     ),
     *    @OA\Parameter(
     *         name="provider_id",
     *         in="query",
     *         description="id of provider",
     *         required=true,
     *         @OA\Schema(
     *         type="BigInteger"
     *         ),
     *         style="form"
     *     ),
     * *    @OA\Parameter(
     *         name="delivery_request_price_id",
     *         in="query",
     *         description="id of delivery request price",
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

        $service_r = service_request::find($id);
        $service_r->data_solicition = $request->data_solicition ;
        $service_r->provider_id = $request->provider_id;
        $service_r->time_solicitation = $request->time_solicitation;
        $service_r->delivery_request_price_id = $request->delivery_request_price_id;
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

    /**
     * @OA\Delete(
     *   path="/api/serviceRequest/{serviceRequest} ",
     *   summary="delete delivery Service Request by id",
     *   tags={"service Request"},
     *   description="delete Service Request",
     *     
     *     @OA\Response(
     *     response=200,
     *     description="deleted",
     *     @OA\Schema(type="json"),
     *   ),
     * )
     */
        ServiceRequest::where('id',$service_r->id)->delete();
        return response()->json(['succes'=>'suppression effectuée avec succes'], 200);
    }
}
