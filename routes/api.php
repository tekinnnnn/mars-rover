<?php

use App\Http\Controllers\PlateauController;
use App\Http\Controllers\RoverController;
use Illuminate\Support\Facades\Route;

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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::get('/', function () {
    return response('welcome to my project. please follow <a href="https://app.swaggerhub.com/apis-docs/t3277/mars-rover/1.0.0">this link</a> to go swagger documentation');
});
Route::post('/plateau', [PlateauController::class, 'store']);
Route::get('/plateau', [PlateauController::class, 'all']);
Route::get('/plateau/{plateauId}', [PlateauController::class, 'show']);
Route::post('/plateau/{plateauId}/rover', [RoverController::class, 'store']);
Route::get('/plateau/{plateauId}/rover', [RoverController::class, 'all']);
Route::get('/rover', [RoverController::class, 'all']);
Route::get('/rover/{roverId}', [RoverController::class, 'show']);
Route::patch('/rover/{roverId}', [RoverController::class, 'command']);
