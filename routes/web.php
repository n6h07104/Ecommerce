<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\web\webController;
use App\Http\Controllers\web\ajaxController;
use App\Http\Controllers\web\loginController;
use App\Http\Controllers\Admin\AdminController;

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

Route::group(["as"=>"web"],function(){
    Route::get('/', function () {
        return view('welcome');
    });
    Route::controller(webController::class)->group(function(){
        Route::get("index","index")->name("index");
    });

    Route::controller(loginController::class)->group(function(){
        Route::get("login","login",)->name("login");
        Route::get("register","register",)->name("register");
        Route::post("data","data",)->name("data");
        Route::post("loginCheck","loginCheck",)->name("loginCheck");
    });

    Route::controller(ajaxController::class)->group(function(){
        Route::post("add_to_cart","add_to_cart")->name("add_to_cart");
        Route::delete("destroy","destroy")->name("destroy");
        Route::post("search","search")->name("search");
    });

});
