<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;


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

Route::PUT('clients/update',[ClientController::class,'updat'])->name('clients.updat');


require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*Rutas de Productos*/
Route::resource('products', ProductController::class)->except('update')->middleware(['auth']);

Route::PUT('products/update',[ProductController::class,'update'])->name('products.update');