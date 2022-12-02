<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostApiController;

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

Route::get('post', [PostApiController::class,'index']);
Route::get('post/search/{keyword}', [PostApiController::class,'search']);
Route::post('post/store', [PostApiController::class,'store']);
Route::get('post/edit/{id}', [PostApiController::class,'edit']);
Route::post('post/update/{id}', [PostApiController::class,'update']);
Route::get('post/delete/{id}', [PostApiController::class,'destroy']);