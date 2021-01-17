<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


    /**
    *openapi: 3.0.0
*info:
  *title: Sample API
  *description: Optional multiline or single-line description in [CommonMark](http://commonmark.org/help/) or HTML.
  *version: 0.1.9
 */


class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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

        return response()->jSon( [ 'success'=>'categorie enregistré avec succes'],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function show(Categorie $categorie)
    {
        //
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
        categorie::where('id',$categorie->id)->delete();
        return response()->json(['succes'=>'suppression effectuée avec succes'], 200);
    }
}
