<?php

use App\Http\Controllers\BusinessController;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\PessoaController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
})->name('home');


/*
    PRÁTICA 01
*/
// Route::get('/users/{id}', function ($id) {
//     return $id;
// });


/*
    PRÁTICA 02
*/
// Route::prefix('usuarios')->group(function(){
//     Route::get('edit', function () {
//         return 'edit';
//     })->name("usuarios.edit");
// });


/*
    PRÁTICA 03
*/
// Route::get('user/{user:email}', function (\App\Models\User $user) {
// Route::get('user/{user}', function (\App\Models\User $user) {
//     // return $user;
//     dd($user);
// });


/*
    PRÁTICA 04
*/
// Route::get('request', function (\Illuminate\Http\Request $request) {
//     dd($request->all());
//     return 'x';
// });


/*
    PRÁTICA 05
*/
Route::get('user/{user}', [UserController::class, 'show'])->name('user.show');

Route::get('users', [UserController::class, 'index'])->name('user.index');


// LIVROS
Route::resource('livros', LivroController::class);


// Business
Route::resource('business', BusinessController::class);

// Pessoa
Route::resource('pessoas', PessoaController::class);

// Posts
Route::resource('posts', PostController::class);

// Team
Route::resource('teams', TeamController::class);
