<?php

use App\Http\Controllers\API\ApiController;
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

Route::get("getproduct", [ApiController::class, "getproduct"]);
Route::get("getgallery", [ApiController::class, "getgallery"]);
Route::get("get_extra_details", [ApiController::class, "get_extra_details"]);
Route::get("get_blog", [ApiController::class, "get_blog"]);
