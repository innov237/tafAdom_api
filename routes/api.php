<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceRequestController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ServiceProviderController;
use App\Http\Controllers\CitiesController;
use App\Http\Controllers\DeliveryAddress;
use App\Http\Controllers\DeliveryServiceRequestController;
use App\Http\Controllers\DiscountedServiceController;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('media/{filename}','ImageController@show')->name('images.show');

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);    
});



Route::apiResource('categorie',CategorieController::class);
Route::apiResource('user',UserController::class);
Route::apiResource('service',ServiceController::class);
Route::apiResource('serviceRequest',ServiceRequestController::class);
Route::apiResource('provider',ProviderController::class);
Route::apiResource('serviceProvider',ServiceProviderController::class);
Route::apiResource('city',CitiesController::class);
Route::apiResource('deliveryAddress',DeliveryAddress::class);
Route::apiResource('deliveryServiceRequest',DeliveryServiceRequestController::class);
Route::apiResource('discounted',DiscountedServiceController::class);
