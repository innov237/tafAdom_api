<?php

namespace App\Http\Controllers;

use App\Models\cities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class CitiesController extends Controller
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
 *     path="/api/city",
 *     tags={"cities"},
 *     summary="return a list of cities",
 *     description="list of cities",
 *     @OA\Response(response="200",
 *       description="a json array of cities"),
 *     @OA\Schema(type="json", items="string"),
 *     
 * )
 */
        $citie = DB::table('cities')->paginate(8);
        return  $citie->toJson(JSON_PRETTY_PRINT);
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
     *   path="/api/city",
     *   tags={"cities"},
     *   summary="create city",
     *   description="Get all request that have been send to a city",

  *    @OA\Parameter(
     *         name="name",
     *         in="query",
     *         description="city name",
     *         required=true,
     *         @OA\Schema(
     *         type="string"
     *         )
     *     ),
    
     *     @OA\Response(
     *     response=201,
     *     description="created",
     *     @OA\Schema(type="json"),
     *
     *   ),
     * )
     */

        $cities = new cities;
        $cities->name = $request->name;
        $cities->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cities  $cities
     * @return \Illuminate\Http\Response
     */
    public function show(cities $cities)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cities  $cities
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id, cities $cities)
    {
 /**
     * @OA\Patch(
     *   path="/api/city/{city} ",
     *   summary="update city ",
     *    tags={"cities"},
     *   description="Get all request that have been send to a city",
     * 
     *         @OA\Parameter(
     *         name="name",
     *         in="query",
     *         description="name",
     *         required=true,
     *         @OA\Schema(
     *         type="string"
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


    $cities = cities::find($id);
        $cities->name = $request->name;
        $cities->save();

    return response()->json(['succes'=>'modification effectuée avec succes'],200);
}

/**
 * Remove the specified resource from storage.
 *
 * @param  \App\Models\Categorie  $categorie
 * @return \Illuminate\Http\Response
 */
public function destroy(cities $cities)
{

/**
 * @OA\Delete(
 *   path="/api/city/{categorie} ",
 *   summary="delete city by id city ",
 *   tags={"cities"},
 *   description="delete a city",
 *     
 *     @OA\Response(
 *     response=200,
 *     description="deleted",
 *     @OA\Schema(type="json"),
 *
 *   ),
 * )
 */

cities::where('id',$cities->id)->delete();
return response()->json(['succes'=>'suppression effectuée avec succes'], 200);
    }


}
