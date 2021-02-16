<?php

namespace App\Http\Controllers;


use Intervention\Image\Facades\Image;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;


class ImageController extends Controller
{
    public function show($fileName){
        $path = public_path().'/default/'.$fileName;
        return Image::make($path)->response();
    }
}


