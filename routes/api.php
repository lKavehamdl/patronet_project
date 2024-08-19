<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CodingController;
use App\Http\Controllers\ProductController;
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


Route::resource('/brand', BrandController::class);
Route::resource('/coding', CodingController::class);
Route::resource('/product', ProductController::class);
Route::get('/get_brand_by_ids', [BrandController::class, 'findByIds']);
Route::get('/get_coding_by_ids', [CodingController::class, 'findByIds']);
Route::get('/get_product_by_ids', [ProductController::class, 'findByIds']);
Route::post('/get_product_by_code', [ProductController::class, 'searchForProduct']);
Route::get('/brand_excel' , [BrandController::class, 'import']);
Route::get('/coding_excel' , [CodingController::class, 'import']);
Route::get('/product_excel' , [ProductController::class, 'import']);





