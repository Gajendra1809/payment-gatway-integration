<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentsController;

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


Route::get('/',[PaymentsController::class,'index']);
Route::post('/payment',[PaymentsController::class,'payment'])->name('payment');
Route::post('/pay',[PaymentsController::class,'pay'])->name('pay');
Route::get('/success',[PaymentsController::class,'success'])->name('success');