<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\SellerController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('report/product', [App\http\controllers\ProductController::class,'pdf'])->name('report.product');

Route::get('report/seller', [App\http\controllers\ProductController::class,'seller'])->name('report.seller');
Route::get('generateRepByAdmin/{id}', [ReportController::class, 'generateRepByAdmin']);
//Route::get('report.productid/{$id}', [ProductController::class, 'productid'])->name('report.productid');;

Route::middleware(['auth', 'role:seller'])->name('seller.')->prefix('seller')->group(function () {
    Route::get('/', [SellerController::class, 'index'])->name('index');
    Route::post('/add', [ProductController::class, 'store'])->name('create'); 
    Route::post('/update', [ProductController::class, 'update'])->name('update');
    Route::post('/destroy', [ProductController::class, 'destroy'])->name('destroy');
});
