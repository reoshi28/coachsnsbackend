<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ShareController;
use App\Http\Controllers\RestController;


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


Route::apiResource('/contact', ContactController::class);
Route::apiResource('/share', ShareController::class);
Route::apiResource('/v1/rest', RestController::class);

Route::get('/hello', function () {
    return response()->json([
        'message' => 'Hello'
    ], 200);
});