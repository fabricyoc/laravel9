<?php

use App\Http\Controllers\AdminProdutoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('home');
// });


Route::resource('/', HomeController::class);
Route::resource('/produto', ProdutoController::class);


// Admin
Route::get('/admin/produtos', [AdminProdutoController::class, 'index']);
Route::get('/admin/produtos/edit', [AdminProdutoController::class, 'edit']);
 