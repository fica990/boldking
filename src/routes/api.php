<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SubscriptionController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//1, 2, 3
Route::post('/order', [OrderController::class, 'create']);
Route::put('/customers/{id}/subscription', [SubscriptionController::class, 'updateSubscription']);

//4
Route::get('/customers/{id}/last-paid-order', [OrderController::class, 'getLastPaidOrder']);

//5
Route::get('/customers/multiple-paid-orders', [CustomerController::class, 'getCustomersWithMultiplePaidOrders']);

//6
Route::get('/customers/active-sub/paid-order', [CustomerController::class, 'getCustomers']);

//nista
Route::get('/customers', [CustomerController::class, 'all']);
