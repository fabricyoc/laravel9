<?php

use App\Http\Controllers\AdminProdutoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('home');
// });


Route::resource('/', HomeController::class);

//
// Rotas de Produtos
//
// Route::resource('/produto', ProdutoController::class);
Route::get('/produto', [ProdutoController::class, 'index'])->name('produto.index');
// Route::get('/produto/{produto}', [ProdutoController::class, 'show'])->name('produto.show');
Route::get('/produto/{produto:slug}', [ProdutoController::class, 'show'])->name('produto.show');


// Admin
Route::get('/admin/produtos', [AdminProdutoController::class, 'index']);
Route::get('/admin/produtos/edit', [AdminProdutoController::class, 'edit']);
