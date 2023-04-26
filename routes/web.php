<?php

use App\Http\Controllers\CatalogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
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

Route::controller(CatalogController::class)->group(function (){
    Route::get('/', 'index')->name('catalog.index');
    Route::get('/show/{catalog}', 'show')->name('catalog.show');
    Route::get('/catalog/create', 'create')->name('catalog.create');
    Route::post('/catalog/store', 'store')->name('catalog.store');
    Route::get('/edit/{catalog}', 'edit')->name('catalog.edit');
    Route::put('/update/{catalog}', 'update')->name('catalog.update');
    Route::delete('/delete/{catalog}', 'destroy')->name('catalog.delete');
});

Route::controller(CategoryController::class)->group(function (){
    Route::get('/{category}/show', 'show')->name('category.show');
    Route::get('/create/{catalog}', 'create')->name('category.create');
    Route::post('/category/store', 'store')->name('category.store');
    Route::get('/category/edit/{category}', 'edit')->name('category.edit');
    Route::put('/category/update/{category}', 'update')->name('category.update');
    Route::delete('/category/delete/{category}', 'destroy')->name('category.delete');
});

Route::controller(ProductController::class)->group(function (){
    Route::get('/show/{product}/product', 'show')->name('product.show');
    Route::get('/create/{category}/product', 'create')->name('product.create');
    Route::post('/product/store', 'store')->name('product.store');
    Route::get('/product/edit/{product}', 'edit')->name('product.edit');
    Route::put('/product/update/{product}', 'update')->name('product.update');
    Route::delete('/product/delete/{product}', 'destroy')->name('product.delete');
});
