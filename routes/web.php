<?php

use App\Http\Controllers\DeviceController;
use App\Http\Controllers\WeatherController;
$namespace = 'App\Http\Controllers';
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::post('insert', $namespace . '\DeviceController@addData');
//Route::get('/insert', [DeviceController::class, 'addData']);

/*Route::get('show', [DeviceController::class, 'index']);
Route::get('create', [DeviceController::class, 'create']);
//Route::post('store-data', [DeviceController::class, 'store']);
Route::get('details/{device}', [DeviceController::class, 'details']);
Route::get('edit/{device}', [DeviceController::class, 'edit']);
//Route::post('/update/{device}', [DeviceController::class, 'update']);
Route::get('delete/{device}', [DeviceController::class, 'delete']);*/
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('create', [DeviceController::class, 'create']);
    Route::get('show', [DeviceController::class, 'index']);
});
//Route::view('weather','weather');

/*Route::get('weather', function () {
   
    $location='Rawalpindi';
    $apiKey='1e55dd07527577d82b9c759099721129';
    $response=Http::withOptions([
        'verify' => false,
    ])->get("https://api.openweathermap.org/data/2.5/weather?q={$location}&appid={$apiKey}");
    dump($response->json());
   
    return view('weather',
    [ 
        'currentweather' =>$response->json(),

    ]);
});*/
Route::get('weather', [WeatherController::class, 'weatherData']);
Route::post('/forecast', [WeatherController::class, 'searchcity']);