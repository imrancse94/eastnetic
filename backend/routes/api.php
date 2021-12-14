<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// auth login
Route::post('login',[AuthController::class,'login']);

Route::group(['middleware' => ['auth:api']], function() {

    //user 
    Route::post('user/signup',[AuthController::class,'userSignup']);

    // For products
    Route::post('product/add/',[ProductController::class,'addProduct']);
    Route::put('product/edit/{id}',[ProductController::class,'editProduct']);
    Route::get('product/list',[ProductController::class,'getProductList']);
    Route::get('product/{id}',[ProductController::class,'getProductById']);
    Route::delete('product/delete/{product_id}',[ProductController::class,'deleteProductById']);


    // For orders
    Route::post('order/add/',[OrderController::class,'addOrder']);
    Route::put('order/edit/{order_id}',[OrderController::class,'editOrder']);
    Route::get('order/list',[OrderController::class,'getOrderListByUserId']);
    Route::get('order/{order_id}',[OrderController::class,'getOrderById']);
    Route::delete('order/delete/{order_id}',[ProductController::class,'deleteOrderById']);

});
