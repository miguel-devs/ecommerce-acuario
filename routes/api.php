<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\ProductController;
use App\Http\Controllers\api\StripeController;

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

Route::get("/buscar/producto/{nombre}",[ProductController::class,"searchProduct"]);
Route::get("/productos/random/{cantidad}",[ProductController::class,"randomProducts"]);
Route::get("/productos/masvendidos/{limit}",[ProductController::class,"moreSaleProducts"]);
Route::get("/productos/category-random-products",[ProductController::class,"categoryRandomProducts"]);
Route::post("/realizar-orden",[StripeController::class,"realizarPago"])->middleware('auth');

