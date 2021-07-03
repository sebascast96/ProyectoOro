<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\SupplierController;


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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

/*Rutas de Clientes*/
Route::resource('clients', ClientController::class)->except('update')->middleware(['auth']);

Route::POST('clients/update',[ClientController::class,'update'])->name('clients.update');


require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*Rutas de Productos*/
Route::resource('products', ProductController::class)->except('update')->middleware(['auth']);

Route::POST('products/update',[ProductController::class,'update'])->name('products.update');
Route::GET('products-prov/{id}',[ProductController::class,'showProv'])->name('products.prov');

/*Rutas de Vendedor*/
Route::resource('sellers', SellerController::class)->except('update')->middleware(['auth']);

Route::POST('sellers/update',[SellerController::class,'update'])->name('sellers.update');

/*Rutas de Proveedores*/
Route::resource('suppliers', SupplierController::class)->except('update')->middleware(['auth']);

Route::POST('suppliers/update',[SupplierController::class,'update'])->name('suppliers.update');
