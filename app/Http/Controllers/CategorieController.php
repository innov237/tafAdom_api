<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function save_categorie(Request $request)
    {
        $save = Categorie::create([
          'libelle_categorie'=>$request->input('libelle_categorie'),
          'description_categorie'=>$request->input('description_categorie'),
          'icon_categorie'=>$request->input('icon_categorie'),
          'img_categorie'=>$request->input('img_categorie'),
        ]);

        if ($save) {
            return  response()->json(array('success'=>true,'message'=>'enregistrement éffectué',200));
        }

        return response()->json(array('success'=>false,'message'=>'erreur enregistrement',500));
    }

    public function delete_categorie(Request $request)
    {
        $delete = Categorie::where('id', $request->idCategorie)
        ->delete();

        if ($delete) {
            return   response()->json(array('success'=>true,'message'=>'suppression éffectué',200));
        }

        return  response()->json(array('success'=>true,'message'=>'erreur suppression',200));
    }
}
