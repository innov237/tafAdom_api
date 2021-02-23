<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;


class ImageController extends Controller
{
     public function show(Request $request,$path, $filename){

        $path = public_path().'/'.$path.'/'.$filename;
        //return $path;
        return Response::download($path);
    }
}


