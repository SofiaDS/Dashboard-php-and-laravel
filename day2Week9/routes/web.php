<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\Auth;
/*
controlla i controller
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
require __DIR__.'/auth.php';

Route::get('/',function() {
    return view('welcome');
});
Route::redirect('/dashboard', '/read')->middleware(['auth']);

// CRUD
//read
Route::get('/read', [UsersController::class,'read'])->middleware(['auth'])->name('dashboard');

//create
Route::view('/add-users', 'v1.crud.create')->middleware(['auth'])->name('add-users'); // la view della create
Route::post('/add-users', [UsersController::class,'create'])->middleware(['auth'])->name('add-users');//la creazione vera e propria


//aggiornamento
Route::get('/update/{id}',[UsersController::class,'edit'])->middleware(['auth'])->name('update-user');//mostra un form già compilato con il contenuto
Route::post('/update/{id}', [UsersController::class,'update'])->middleware(['auth']);

//delete user from
Route::get('/delete/{id}',[UsersController::class,'destroy'])->middleware(['auth'])->name('delete-user');

// //dopo log in re indirizza qui
// Route::post('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');
