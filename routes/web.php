<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SettingController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get("/", [AdminAuthController::class, "showlogin"]);
Route::group(['prefix' => 'admin'], function () {

    Route::get("/", [AdminAuthController::class, "showlogin"]);
    Route::post("postlogin", [AdminAuthController::class, "postlogin"]);

    Route::group(['middleware' => ['AdminCheck']], function () {

        Route::get("dashboard", [AdminAuthController::class, "dashboard"])->name("dashboard");
        Route::get("logout", [AdminAuthController::class, 'logout']);
        Route::get("editprofile", [AdminAuthController::class, "editprofile"]);
        Route::post("updateaccount", [AdminAuthController::class, "updateaccount"]);
        Route::get("changepassword", [AdminAuthController::class, "changepassword"]);
        Route::get("check_password_same/{val}", [AdminAuthController::class, "checkcurrentpassword"]);
        Route::post("updatepassword", [AdminAuthController::class, "updatepassword"]);

        // category
        Route::get("category", [CategoryController::class, "showcategory"]);
        Route::get("addcategory/{id}", [CategoryController::class, "addcategory"]);
        Route::post("savecategory", [CategoryController::class, "savecategory"]);
        Route::get("deletecategory/{id}", [CategoryController::class, "deletecategory"]);

        // product
        Route::get("product", [ProductsController::class, "showproduct"]);
        Route::get("addproduct/{id}", [ProductsController::class, "addproduct"]);
        Route::post("saveproduct", [ProductsController::class, "saveproduct"]);
        Route::get("deleteproduct/{id}", [ProductsController::class, "deleteproduct"]);

        // gallery
        Route::get("gallery", [GalleryController::class, "showgallery"]);
        Route::get("addgallery/{id}", [GalleryController::class, "addgallery"]);
        Route::post("savegallery", [GalleryController::class, "savegallery"]);
        Route::get("deletegallery/{id}", [GalleryController::class, "deletegallery"]);

        // blog
        Route::get("blog", [BlogController::class, "showblog"]);
        Route::get("addblog/{id}", [BlogController::class, "addblog"]);
        Route::post("saveblog", [BlogController::class, "saveblog"]);
        Route::get("deleteblog/{id}", [BlogController::class, "deleteblog"]);

        Route::get("setting", [SettingController::class, "setting"]);
        Route::post("save_setting", [SettingController::class, "save_setting"]);

    });
});
