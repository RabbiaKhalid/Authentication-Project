<?php

use App\Http\Controllers\DeviceController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

$namespace = 'App\Http\Controllers';

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();

});

Route::group(['middleware' => 'auth:sanctum'], function () {
    //All secure URL's
    /*Route::get('data', [CheckAPIController::class, 'getData']);
    Route::post('add', [DeviceController::class, 'addData']);
    Route::put('updateData', [DeviceController::class, 'updateData']);
    Route::get('showData', [DeviceController::class, 'showData']);
    Route::get('search/{name}', [DeviceController::class, 'searchData']); */
//CRUD Device Controller
    Route::post('store-data', [DeviceController::class, 'store']);
    Route::post('/update/{device}', [DeviceController::class, 'update']);

    Route::get('details/{device}', [DeviceController::class, 'details']);
    Route::get('edit/{device}', [DeviceController::class, 'edit']);
    Route::get('delete/{device}', [DeviceController::class, 'delete']);
});

Route::post('login', [UserController::class, 'index']);
