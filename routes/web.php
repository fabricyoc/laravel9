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
Route::get('/produto/{produto:slug}', [ProdutoController::class, 'show'])->name('produto.show');


// Admin
Route::get('/admin/produtos', [AdminProdutoController::class, 'index'])->name('admin.index');
Route::get('/admin/produtos/create', [AdminProdutoController::class, 'create'])->name('admin_produto.create');
Route::post('/admin/produtos', [AdminProdutoController::class, 'store'])->name('admin_produto.store');

Route::get('/admin/produtos/{produto}/edit', [AdminProdutoController::class, 'edit'])->name('admin_produto.edit');
Route::put('/admin/produtos/{produto}', [AdminProdutoController::class, 'update'])->name('admin_produto.update');
