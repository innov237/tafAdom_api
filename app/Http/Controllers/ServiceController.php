<?php

namespace App\Http\Controllers;

use App\Models\service;
use App\Models\categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
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
 *     path="/api/service",
 *     tags={"service"},
 *     summary="return a list of services",
 *     description="list of services",
 *     @OA\Response(response="200",
 *       description="a json array of services"),
 *     @OA\Schema(type="json", items="string"),
 *     
 * )
 */
        $service = service::with(['categorie'])->paginate(8);
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
  /**
     * @OA\Post(
     *   path="/api/service",
     *   tags={"service"},
     *   summary="create service",
     *   description="Get all request that have been send to a service",

  *    @OA\Parameter(
     *         name="name",
     *         in="query",
     *         description="service name",
     *         required=true,
     *         @OA\Schema(
     *         type="string"
     *         )
     *     ),
     * 
     *          @OA\Parameter(
     *         name="image",
     *         in="query",
     *         description="catgory image",
     *         required=true,
     *         @OA\Schema(
     *         type="string"
     *         ),
     *         style="form"
     *     ),
     * *            @OA\Parameter(
     *         name="icon",
     *         in="query",
     *         description="icon",
     *         required=true,
     *         @OA\Schema(
     *         type="string"
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

        $service = new service;

        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $img = 'image_'.$categorie->id.'.'.$extension;
        Image::make($file)->save(public_path('/images/'.$img));
        $categorie->image = $img;

        $file = $request->file('icon');
        $extension = $file->getClientOriginalExtension();
        $icn = 'icon_'.$categorie->id.'.'.$extension;
        Image::make($file)->save(public_path('/icons/'.$icn));
        $categorie->icon = $icn; 

        $service->name = $request->name;
        $service->service_request_id = $request->service_request_id;
        $service->categorie_id = $request->categorie_id;
        $service->save();

        return response()->jSon( [ 'success'=>'created'],200);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {

          /**
     * @OA\Patch(
     *   path="/api/service/{service} ",
     *   summary="update service ",
     *    tags={"service"},
     *   description="Get all request that have been send to a service",
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

  *            @OA\Parameter(
     *         name="image",
     *         in="query",
     *         description="catgory image",
     *         required=true,
     *         @OA\Schema(
     *         type="string"
     *         ),
     *         style="form"
     *     ),
     * *            @OA\Parameter(
     *         name="icon",
     *         in="query",
     *         description="icon",
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

        $service = service::find($id);

        if($request->file('image')){
            @unlink(public_path('/images/'.$categorie->image));
            $file = $request->file('image');
         $extension = $file->getClientOriginalExtension();
         $img = 'image_'.$categorie->id.'.'.$extension;
         Image::make($file)->save(public_path('/images/'.$img));
         $categorie->image =  $img;
       }
    
       if($request->file('icon')){
        @unlink(public_path('/icons/'.$categorie->icon));
        $file = $request->file('icon');
     $extension = $file->getClientOriginalExtension();
     $icn = 'icon_'.$categorie->id.'.'.$extension;
     Image::make($file)->save(public_path('/icons/'.$icn));
     $categorie->icon =  $icn;

        $service->name = $request->name;
        $service->service_request_id = $request->service_request_id;
        $service->categorie_id = $request->categorie_id;;
        $service->save();

        return response()->json(['succes'=>'modification effectuée avec succes'],200);
    }
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
/**
     * @OA\Delete(
     *   path="/api/service/{service} ",
     *   summary="delete category by id user ",
     *   tags={"service"},
     *   description="delete a service",
     *     
     *     @OA\Response(
     *     response=200,
     *     description="deleted",
     *     @OA\Schema(type="json"),
     *
     *   ),
     * )
     */

        service::where('id',$service->id)->delete();
        return response()->json(['succes'=>'suppression effectuée avec succes'], 200);
    }
}
