<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategorieController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/m', function () {
    return view('create_cat');
});

Route::put('categorie/update/{id}', [CategorieController::class,'update', 'as'=>'update']);
Route::get('/up',[CategorieController::class,'edit']);

