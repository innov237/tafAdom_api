<?php

namespace App\Http\Controllers;

use App\Models\Service;
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
        $service = service::with(['categorie'])->get();
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
        $service = new service;

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

        $service->name = $request->name;
        //$service->icon = $request->icon;
       //$service->image = $request->image;
        $service->service_request_id = $request->service_request_id;
        $service->categorie_id = $request->categorie_id;
        $service->save();

        return response()->jSon( [ 'success'=>'service enregistré avec succes'],200);
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
        $service = service::find($id);

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
        
        $service->name = $request->name;
        // $service->icon = $request->icon;
        // $service->image = $request->image;
        $service->service_request_id = $request->service_request_id;
        $service->categorie_id = $request->categorie_id;;
        $service->save();

        return response()->json(['succes'=>'modification effectuée avec succes'],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        service::where('id',$service->id)->delete();
        return response()->json(['succes'=>'suppression effectuée avec succes'], 200);
    }
}
