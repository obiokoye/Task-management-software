<?php

use App\Http\Controllers\Agentcontroller;
use App\Http\Controllers\Bodycontroller;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\PaymentSetupController;

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/agent', [Agentcontroller::class, 'index']);
Route::get('/addagentform',[Agentcontroller::class, 'create']);
Route::post('/store-agents',[Agentcontroller::class, 'store']);
Route::get('agents/{agent}/edit', [Agentcontroller::class, 'edit']);
Route::get('agents/{agent}/destroy', [Agentcontroller::class, 'destroy']);
Route::resource('agents', AgentController::class)->middleware('can:manage-users');
Route::resource('admin', AdminController::class)->middleware('can:manage-users');
Route::resource('body', BodyController::class)->middleware('can:manage-users');
Route::resource('payment',PaymentController::class);
Route::resource('paymentsetup',PaymentSetupController::class);

Route::get('/payment/getpay', [PaymentController:: class, 'getpay'])->name('getpay');
Route::get('/payment/getprice', [PaymentController:: class, 'getprice'])->name('getprice');

Route::post('/admin/search', [AdminController::class, 'search'])->name('search');
Route::post('/body/query', [BodyController::class, 'query'])->name('query');
Route::post('/agent/search', [AgentController::class, 'search'])->name('search');

// Route::post('/search', function(){
//     $q = Input::get('q');
//     dd($q);

// });


