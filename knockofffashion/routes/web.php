<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
// TEMP: Remove when real index() is implemented
Route::resource('products', ProductController::class);
/*Route::get('/products', function () {
    return "Products index coming soon...";
})->name('products.index');*/
