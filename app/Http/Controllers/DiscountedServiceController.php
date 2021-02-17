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
/**
 * @OA\Get(
 *     path="/api/discounted",
 *     tags={"discounted service"},
 *     summary="return a list of discounted service",
 *     description="list of discounted service",
 *     @OA\Response(response="200",
 *       description="a json array of discounted service"),
 *     @OA\Schema(type="json", items="string"),
 *     
 * )
 */

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
  /**
     * @OA\Post(
     *   path="api/discounted",
     *   tags={"discounted service"},
     *   summary="create discounted service",
     *   description="Get all request that have been send to a discounted service",


      *    @OA\Parameter(
     *         name="started_date",
     *         in="query",
     *         description="quater ",
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
     *         name="reduction",
     *         in="query",
     *         description="id of user",
     *         required=true,
     *         @OA\Schema(
     *         type="decimal"
     *         ),
     *         style="form"
     *     ),
     * *    @OA\Parameter(
     *         name="service_id",
     *         in="query",
     *         description="id of city",
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
    $this->validate($request,[
        'start_date'=>'required',
        'end_date'=>'required',
        'reduction'=>'required',
        'service_id'=>'required',
    ]);

        $discounted_service = new discounted_service;
        $discounted_service->start_date = $request->start_date;
        $discounted_service->end_date = $request->end_date;
        $discounted_service->reduction = $request->reduction;
        $discounted_service->service_id = $request->service_id;
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
        $this->validate($request,[
            'start_date'=>'required',
            'end_date'=>'required',
            'reduction'=>'required',
            'service_id'=>'required',
        ]);

 /**
     * @OA\Patch(
     *   path="api/discounted/{discounted}",
     *   summary="update discounted ",
     *   tags={"discounted service"},
     *   description="Get all request that have been send to a discounted service",
     * 
     *    @OA\Parameter(
     *         name="started_date",
     *         in="query",
     *         description="quater ",
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
     *         name="reduction",
     *         in="query",
     *         description="id of user",
     *         required=true,
     *         @OA\Schema(
     *         type="deciamal"
     *         ),
     *         style="form"
     *     ),
     * *    @OA\Parameter(
     *         name="service_id",
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


        $categorie = discounted_service::find($id);
        $discounted_service->started_date = $request->started_date;
        $discounted_service->end_date = $request->end_date;
        $discounted_service->reduction = $request->reduction;
        $discounted_service->service_id = $request->service_id;
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
 /**
     * @OA\Delete(
     *   path="/api/discounted/{discounted}",
     *   summary="delete discount service by id",
     *   tags={"discounted service"},
     *   description="delete discount service",
     *     
     *     @OA\Response(
     *     response=200,
     *     description="deleted",
     *     @OA\Schema(type="json"),
     *
     *   ),
     * )
     */

        discounted_service::where('id',$discounted_service->id)->delete();
        return response()->json(['succes'=>'suppression effectuée avec succes'], 200);
    }
}
