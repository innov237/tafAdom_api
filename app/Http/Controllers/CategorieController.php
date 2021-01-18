<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CategorieController extends Controller
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
 *     path="/api/categorie",
 *     tags={"categories"},
 *     summary="return a list of categories",
 *     description="list of categories",
 *     @OA\Response(response="200",
 *       description="a json array of categories"),
 *     @OA\Schema(type="json", items="string"),
 *     
 * )
 */

        $categorie = categorie::with(['service'])->get();
        return  $categorie->toJson(JSON_PRETTY_PRINT);
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
     *   path="/api/categorie",
     *   tags={"categories"},
     *   summary="create user",
     *   description="Get all request that have been send to a category",

  *    @OA\Parameter(
     *         name="name",
     *         in="query",
     *         description="category name",
     *         required=true,
     *         @OA\Schema(
     *         type="string"
     *         )
     *     ),
     *    @OA\Parameter(
     *         name="icon",
     *         in="query",
     *         description="category icon ",
     *         required=true,
     *         @OA\Schema(
     *         type="string"
     *         ),
     *         style="form"
     *     ),
     *    @OA\Parameter(
     *         name="image",
     *         in="query",
     *         description="catgory image",
     *         required=true,
     *         @OA\Schema(
     *         type="string"
     *         ),
     *         style="form"
     *     ),
     *     @OA\Response(
     *     response=201,
     *     description="created",
     *     @OA\Schema(type="json"),
     *
     *   ),
     * )
     */

        $categorie = new categorie;

        if($request->file('image')){
            $file = $request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $request->file->move('images/',$filename);
            $service->image = $filename;
        }

        if($request->file('icon')){
            $file = $request->file('icon');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $request->file->move('icons/',$filename);
            $service->icon = $filename;
        }

        $categorie->name = $request->name;
        // $categorie->icon = $request->icon;
        // $categorie->image = $request->image;
        $categorie->save();

        return response()->jSon( [ 'success'=>'created'],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function show(Categorie $categorie)
    {
        
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    /**
     * @OA\Patch(
     *   path="/api/categorie/{categorie} ",
     *   summary="update category ",
     *    tags={"categories"},
     *   description="Get all request that have been send to a category",
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


        if($request->file('image')){
            $file = $request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $request->file->move('images/',$filename);
            $service->image = $filename;
        }

        if($request->file('icon')){
            $file = $request->file('icon');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $request->file->move('icons/',$filename);
            $service->icon = $filename;
        }

        $categorie = categorie::find($id);
        $categorie->name = $request->name;
        //$categorie->icon = $request->icon;
        //$categorie->image = $request->image;
        $categorie->save();

        return response()->json(['succes'=>'modification effectuée avec succes'],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categorie $categorie)
    {


   /**
     * @OA\Delete(
     *   path="/api/categorie/{categorie} ",
     *   summary="delete category by id user ",
     *   tags={"categories"},
     *   description="delete a category",
     *     
     *     @OA\Response(
     *     response=200,
     *     description="deleted",
     *     @OA\Schema(type="json"),
     *
     *   ),
     * )
     */

        categorie::where('id',$categorie->id)->delete();
        return response()->json(['succes'=>'suppression effectuée avec succes'], 200);
    }
}
