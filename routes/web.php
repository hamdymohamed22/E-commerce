<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;
use App\Http\Middleware\AuthMiddleware;
use Illuminate\Support\Facades\Route;

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


Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});



Route::controller(HomeController::class)->group(function(){

    Route::get('control_dashboard', "admin_dashboard")->name('control_dashboard')->middleware('is_admin','auth');
    Route::get('/',"home")->name('home');
});

Route::controller(AdminController::class)->group(function(){
    Route::middleware('is_admin','auth')->group(function(){
        // show all
        Route::get('all/products', "all_products")->name('products');
        // create
        Route::get('create_product', "create")->name('create_product');
        Route::post('store_product', "store")->name('store_product');
        // // update
        Route::get('edit_product/{id}', "edit")->name('edit_product');
        Route::put('update_product/{id}', "update")->name('update_product');
        // delete
        Route::delete('delete/{id}', "delete")->name('delete');
        // search 
        Route::get('search', "search")->name('search');
    });
});

Route::middleware(AuthMiddleware::class)->group(function(){
    Route::controller(UsersController::class)->group(function(){
        Route::get('all_users','all_users')->name('all_users')->middleware('is_admin','auth');
        Route::post('promote/{id}','promote')->name('promote')->middleware('auth','is_admin');
        Route::post('down/{id}', 'down')->name('down')->middleware('auth','is_admin');
    });
});