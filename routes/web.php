<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubproductController;

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

Route::get('/', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/{id}/edit', [ProductController::class, 'edit']);
Route::put('/products/{id}/update', [ProductController::class, 'update']);
Route::delete('/products/{id}/delete', [ProductController::class, 'destroy']);
Route::get('/products/{id}/show', [ProductController::class, 'show'])->name('products.show');


Route::get('/subproducts', [SubproductController::class, 'index'])->name('subproducts.category');
Route::get('/subproducts/create', [SubproductController::class, 'create'])->name('subproducts.create');
Route::post('/subproducts/store', [SubproductController::class, 'store'])->name('subproducts.store');
Route::get('/subproducts/{id}/edit', [SubproductController::class, 'edit']);
Route::put('/subproducts/{id}/update', [SubproductController::class, 'update']);
Route::delete('/subproducts/{id}/delete', [SubproductController::class, 'destroy']);
