<?php

namespace App\Http\Controllers;

use App\Models\provider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Image;

class ProviderController extends Controller
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
         *     path="/api/provider",
         *     tags={"provider"},
         *     summary="return a list of provider",
         *     description="list of provider",
         *     @OA\Response(response="200",
         *       description="a json array of provider"),
         *     @OA\Schema(type="json", items="string"),
         *     
         * )
         */

        $provider = provider::orderBy('id', 'DESC')->paginate(8);
        return  $provider->toJson(JSON_PRETTY_PRINT);
    }

    public function fiterByCity(Request $response, $uuid)
    {
        /**
         * @OA\Get(
         *     path="/api/provider",
         *     tags={"provider"},
         *     summary="return a list of provider",
         *     description="list of provider",
         *     @OA\Response(response="200",
         *       description="a json array of provider"),
         *     @OA\Schema(type="json", items="string"),
         *     
         * )
         */

        $provider = provider::where('cities_id', $uuid)->orderBy('id', 'DESC')->paginate(8);
        return  $provider->toJson(JSON_PRETTY_PRINT);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|string|max:30',
            'email'=>'required|email|unique:users,email',
            'phone_number'=>'required',
        ]);

    /**
     * @OA\Post(
     *   path="/api/provider",
     *   tags={"provider"},
     *   summary="create provider",
     *   description="Get all request that have been send to a provider",
     * 
     *    @OA\Parameter(
     *         name="phone_number",
     *         in="query",
     *         description="end date",
     *         required=true,
     *         @OA\Schema(
     *         type="string"
     *         ),
     *         style="form"
     *     ),
     *    @OA\Parameter(
     *         name="email",
     *         in="query",
     *         description="id of provider",
     *         required=true,
     *         @OA\Schema(
     *         type="string"
     *         ),
     *         style="form"
     *     ),
     * *    @OA\Parameter(
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
     *     description="created",
     *     @OA\Schema(type="json"),
     *
     *   ),
     * )
     */

        $provider = new provider;
        $provider->name = $request->name;
        $provider->email = $request->email;
        $provider->phone_number = $request->phone_number;

        $provider->save();

        if ( $request->hasFile('profile_picture') && $request->file('profile_picture')->isValid()){
        //
            $file = $request->file('profile_picture');
            $extension = $file->getClientOriginalExtension();
            $img = 'profile_'.$provider->id.'.'.$extension;
            Image::make($file)->save(public_path('/profiles/'.$img));
            $provider->profile_picture = $img;
        }

        $provider->save();

        return response()->json(['succes'=> true]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function show(provider $provider)
    {
        //
        return $provider;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

        $this->validate($request,[
            'name'=>'required|string|max:30',
            'email'=>'required|email',
            'phone_number'=>'required',
        ]);
/**
     * @OA\Patch(
     *   path="/api/provider{provider}",
     *   summary="update provider ",
     *   tags={"provider"},
     *   description="Get all request that have been send to a provider",
     * 
     *    @OA\Parameter(
     *         name="phone_number",
     *         in="query",
     *         description="end date",
     *         required=true,
     *         @OA\Schema(
     *         type="string"
     *         ),
     *         style="form"
     *     ),
     *    @OA\Parameter(
     *         name="email",
     *         in="query",
     *         description="id of provider",
     *         required=true,
     *         @OA\Schema(
     *         type="string"
     *         ),
     *         style="form"
     *     ),
     * *    @OA\Parameter(
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
     *     
     *     @OA\Response(
     *     response=201,
     *     description="updated",
     *     @OA\Schema(type="json"),
     *
     *   ),
     * )
     */

        $provider = provider::find($id);


        if ( $request->hasFile('profile_picture') && $request->file('profile_picture')->isValid()){
          @unlink(public_path('/profiles/'.$provider->profile_picture));
          
          $file = $request->file('profile_picture');
          $extension = $file->getClientOriginalExtension();
          $img = 'image_'.$provider->id.'.'.$extension;
          Image::make($file)->save(public_path('/profiles/'.$img));
          $provider->profile_picture =  $img;
       }
        $provider->name = $request->name;
        $provider->email = $request->email;
        $provider->phone_number = $request->phone_number;
        
        $provider->save(); 

        return response()->json(['succes'=>'modification effectuée avec succes'],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function destroy(provider $provider)
    {
 /**
     * @OA\Delete(
     *   path="/api/provider{provider}",
     *   summary="delete provider by id",
     *   tags={"provider"},
     *   description="delete provider",
     *     
     *     @OA\Response(
     *     response=200,
     *     description="deleted",
     *     @OA\Schema(type="json"),
     *
     *   ),
     * )
     */

        provider::where('id',$provider->id)->delete();
        return response()->json(['succes'=>'suppression effectuée avec succes'], 200);
    }
}
