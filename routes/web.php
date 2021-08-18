<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\SaleController;


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
    return redirect('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

/*Rutas de Clientes*/
Route::resource('clients', ClientController::class)->except('update')->middleware(['auth']);

Route::POST('clients/update', [ClientController::class, 'update'])->name('clients.update');


require __DIR__ . '/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*Rutas de Productos*/
Route::resource('products', ProductController::class)->except('update')->middleware(['auth']);

Route::POST('products/update', [ProductController::class, 'update'])->name('products.update')->middleware(['auth']);
Route::GET('products-prov/{id}', [ProductController::class, 'showProv'])->name('products.prov')->middleware(['auth']);

/*Rutas de Vendedor*/
Route::resource('sellers', SellerController::class)->except('update')->middleware(['auth']);

Route::POST('sellers/update', [SellerController::class, 'update'])->name('sellers.update')->middleware(['auth']);

/*Rutas de Empleado*/
Route::resource('employees', EmployeeController::class)->except('update')->middleware(['auth']);

Route::POST('employees/update', [EmployeeController::class, 'update'])->name('employees.update')->middleware(['auth']);

/*Rutas de Proveedores*/
Route::resource('suppliers', SupplierController::class)->except('update')->middleware(['auth']);

Route::POST('suppliers/update', [SupplierController::class, 'update'])->name('suppliers.update')->middleware(['auth']);
Route::GET('fill', [SupplierController::class, 'fillSelect'])->middleware(['auth']);
Route::POST('suppliers/link', [SupplierController::class, 'link'])->name('suppliers.link')->middleware(['auth']);
Route::DELETE('products/supplier/{supplier}', [SupplierController::class, 'remove'])->name('suppliers.remove')->middleware(['auth']);

/*Rutas de Ventas*/
Route::resource('sales', SaleController::class)->except('update')->middleware(['auth']);
Route::GET('sales-dashboard', [SaleController::class, 'dashboard'])->name('dashboard');
Route::GET('fill-clients', [SaleController::class, 'fillClientsSelect'])->middleware(['auth']);
Route::GET('sales/prod/{sale}', [SaleController::class, 'getProducts'])->middleware(['auth']);
Route::POST('sales/update', [SaleController::class, 'update'])->name('sales.update')->middleware(['auth']);
Route::POST('sales/finish', [SaleController::class, 'finish'])->name('sales.finish')->middleware(['auth']);
