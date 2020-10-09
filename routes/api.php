<?php

use App\Models\User;
use App\Models\UserImage;
use App\Http\Controllers\UserController;
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

Route::middleware('auth:sanctum')->get('/user/images', function (Request $request) {
    return \App\Models\UserImage::where('user_id', $request->user()->id)->get();
});

Route::middleware('auth:sanctum')->get('/user/{email}/images', function (Request $request, $email) {
    return \App\Models\User::where('email', $email)->first()->images;
});

Route::post('/user/create', [UserController::class, 'show'])->middleware('can:create');
Route::get('/user/{user}/view', [UserController::class, 'view'])->middleware('can:view,user');
Route::put('/user/{user}/update', [UserController::class, 'update'])->middleware('can:update,user');
Route::delete('/user/{user}/delete', [UserController::class, 'destroy'])->middleware('can:delete,user');
