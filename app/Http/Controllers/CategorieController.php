<?php

namespace App\Http\Controllers;

use App\Models\categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Image;

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

        $categorie = categorie::with(['service'])->orderBy('id', 'DESC')->paginate(8);
        return $this->reply(true,null, $categorie);
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
            'image'=>'required',
        ]);
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
        
        $categorie->name = $request->name;    

       $file = $request->file('icon');
       $extension = $file->getClientOriginalExtension();
       $icn = 'icon_'.$categorie->id.'.'.$extension;
       Image::make($file)->resize(122,122)->save(public_path('/icons/'.$icn));
       $categorie->icon = $icn;

        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $img = 'image_'.$categorie->id.'.'.$extension;
        Image::make($file)->save(public_path('/images/'.$img));
        $categorie->image = $img;
        $categorie->save();

   

        $categorie->save();

        return $this->reply(true,"bien enregistré",null);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function show(Categorie $categorie)
    {
        return view('create_cat');
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
       
      return response()->json(['name' => request('name') , 'data'=> $categorie]);
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
    $categorie = categorie::find($id);
        
    $categorie->name = $request->name;
       
        if ($request->file('icon')) {
            @unlink(public_path('/icons/'.$categorie->icon));
            $file = $request->file('icon');
            $extension = $file->getClientOriginalExtension();
            $icn = 'icon_'.$categorie->id.'.'.$extension;
            Image::make($file)->save(public_path('/icons/'.$icn));
            $categorie->icon =  $icn;
        }

        if ($request->file('image')) {
            @unlink(public_path('/images/'.$categorie->image));
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $img = 'image_'.$categorie->id.'.'.$extension;
            Image::make($file)->save(public_path('/images/'.$img));
            $categorie->image =  $img;
        }
        
        $categorie->save();

        return response()->json(['succes'=>'modification effectuée avec succes'], 200);
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

        $categorie->delete();
        return response()->json(['success'=>'suppression effectuée avec succes'], 200);
    }
}
