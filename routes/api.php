<?php

use App\Http\Controllers\api\ProductosController;
use App\Http\Controllers\api\ProductosVariantesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;




// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::resource("productos",ProductosController::class);
Route::resource("variantes",ProductosVariantesController::class);
Route::get("variantes_producto/{id}",[ProductosVariantesController::class,"buscarXIdProductos"]);