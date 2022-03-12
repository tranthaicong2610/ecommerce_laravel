<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\OrderController;

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

Route::get('/', [HomeController::class,'index'])->name('home.index');
Route::get('/shop', [HomeController::class,'shop'])->name('home.shop');

Route::prefix('admin')->group(function () {
    route::get('/',[AdminController::class,'dashboard'])->name('admin.dashboard');

    Route::resources([
        'category' => CategoryController::class,
        'product' => ProductController::class,
        'banner' => BannerController::class,
        'account' => AccountController::class,
        'blog' => BlogController::class,
        'order' => OrderController::class,
    ]);
});
route::get('test',function(){
    return view('layouts.admin');
});
