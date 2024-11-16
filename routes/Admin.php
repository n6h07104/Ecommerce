<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\productController;
use App\Http\Controllers\Dashboard\Auth\loginController;
use App\Http\Controllers\dashboard\Auth\logoutController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::group(["middleware"=>"AuthAdmin"],function(){
    Route::get("logout",[logoutController::class,"logout"])->name("admin/logout");
    route::resource("admin",AdminController::class);
    route::resource("product",productController::class);
});


Route::group(["middleware"=>"guest:admin"],function(){
Route::get("login",[loginController::class,"login"])->name("admin/login");
Route::post("login/check",[loginController::class,"loginCheck"])->name('admin/login/check');
});
