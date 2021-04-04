<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SubscriptionController;
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

//Tasks 1, 2, 3
Route::post('/orders', [OrderController::class, 'create']);
Route::put('/customers/{id}/subscription', [SubscriptionController::class, 'updateSubscription']);

//Task 4
Route::get('/customers/{id}/last-paid-order', [OrderController::class, 'getLastPaidOrder']);

//Task 5
Route::get('/customers/multiple-paid-orders', [CustomerController::class, 'getCustomersWithMultiplePaidOrders']);

//Task 6
Route::get('/customers/subbed-with-paid-order', [CustomerController::class, 'getSubbedCustomersWithPaidOrders']);

//Bonus task - Pay order, create delivery
Route::post('/orders/{id}/pay', [OrderController::class, 'payOrder']);

//Bonus task - Delivery csv export
Route::get('/deliveries/export', [DeliveryController::class, 'exportDeliveries']);
