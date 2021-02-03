<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(
 *    title="Your super  ApplicationAPI",
 *    version="0.1.9",
 * )
 */


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function reply($success, $message=null, $data=null){
        $response = [
            "success"=>$success, 
            "message"=>$message, 
            "data"=>$data
        ];

        return response()->json($response);
    }
}
