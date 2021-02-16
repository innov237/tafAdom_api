<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sr = User::with(['city'])->orderBy('id', 'DESC')->paginate(8);
        return  $sr->toJson(JSON_PRETTY_PRINT);
    }

    public function indexByTown(Request $request, $id)
    {
        //
        $sr = User::whereHas('city', function($q) use ($id) {
              $q->where('id', $id);
          })->orderBy('id', 'DESC')->paginate(8);
        return  $sr->toJson(JSON_PRETTY_PRINT);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
       
           $user=new User();
           $user->name=$request->name;
           $user->email=$request->email;
           $user->password=bcrypt($request->password);
           $user->residence=$request->residence;
           $user->telephone=$request->telephone;
           $user->cities_id=$request->cities_id;
           $user->save();
           return response()->json(['succes'=>'bien enregistré'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
