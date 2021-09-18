<?php

use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\CustomerDuePaymentController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CustomerPaymentController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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

/*Route::get('/', function () {
    return view('auth.login');
});*/

Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Auth::routes();


Route::group(['middleware' => ['auth']], function (){
    Route::get('/dashboard', [HomeController::class, 'index'])->name('home');

    Route::get('/packages', [PackageController::class, 'index']);
    Route::get('/package/create', [PackageController::class, 'create']);
    Route::post('/package/store', [PackageController::class, 'store']);
    Route::get('/package/edit/{id}', [PackageController::class, 'edit']);
    Route::get('/package/delete/{id}', [PackageController::class, 'destroy']);

    Route::get('/customers', [CustomerController::class, 'index']);
    Route::get('/customer/create', [CustomerController::class, 'create']);
    Route::post('/customer/store', [CustomerController::class, 'store']);
    Route::get('/customer/edit/{id}', [CustomerController::class, 'edit']);
    Route::get('/customer/delete/{id}', [CustomerController::class, 'destroy']);

    Route::get('/payments', [CustomerPaymentController::class, 'index']);
    Route::get('/payment/create', [CustomerPaymentController::class, 'create']);
    Route::get('/customer', [CustomerPaymentController::class, 'customerByID']);
    Route::post('/customer/payment/store', [CustomerPaymentController::class, 'store']);
    Route::get('/payment/edit/{id}', [CustomerPaymentController::class, 'edit']);
    Route::get('/payment/delete/{id}', [CustomerPaymentController::class, 'destroy']);

    Route::get('/due/payments', [CustomerDuePaymentController::class, 'index']);
    Route::get('/due/payment/create', [CustomerDuePaymentController::class, 'create']);
    Route::get('/customer/due', [CustomerDuePaymentController::class, 'customerDue']);
    Route::post('/customer/due/payment/store', [CustomerDuePaymentController::class, 'store']);
});
