<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

//Route ke profile (/profile)
Route::get('/profile/{nama}/{kelas}/{npm}', [UserController::class, 'profile']);

//Route create user (/user/create)
Route::get('/user/create', [UserController::class, 'create']) -> name('user.create');

//Route store user baru (/user/store)
Route::post('/user/store', [UserController::class, 'store']) -> name('user.store');

//Route ke method index pada uc untuk menampilkan daftar user
Route::get('/user', [UserController::class, 'index']) -> name('user.list');

//Route untuk show user
Route::get('/show/{id}', [UserController::class, 'show']) -> name('user.show');

//Route untuk edit user
Route::put('/user/{id}', [UserController::class, 'update']) -> name('user.update');
Route::get('/user/{id}/edit', [UserController::class, 'edit']) -> name('user.edit');

//Route untuk delete user
Route::delete('/user/{id}', [UserController::class, 'destroy']) -> name('user.delete');
