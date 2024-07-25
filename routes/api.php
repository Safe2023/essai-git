<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/creat_product', [ApiController::class,'store']);
Route::get('/liste', [ApiController::class,'liste']);
Route::get('/delete/{id}' , [ApiController::class,'destroy']);
Route::get('/detail/{id}', [ApiController::class,'show']);
Route::post('/edit_product/{id}' , [ApiController::class,'update']);




