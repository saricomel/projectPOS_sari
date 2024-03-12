<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Models\Customer;
use App\Models\User;
use GuzzleHttp\Promise\Create;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('dashboard',[
        "title"=>"Dashboard"
    ]);
});
Route::resource('kategori',CategoryController::class)
->except('show','destroy','create');
Route::resource('pelanggan',CustomerController::class)->except('destroy');
Route::resource('produk',ProductController::class);
route::resource('pengguna',UserController::class)->except('destroy','Create','show','update','edit');
