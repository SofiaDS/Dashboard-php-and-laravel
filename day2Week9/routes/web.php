<?php

use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('welcome');
});

// Area riservata: CRUD utenti (solo utenti autenticati)
Route::middleware(['auth'])->group(function () {
    Route::redirect('/dashboard', '/read');

    // Read
    Route::get('/read', [UsersController::class, 'read'])->name('dashboard');

    // Create
    Route::view('/add-users', 'v1.crud.create')->name('add-users');
    Route::post('/add-users', [UsersController::class, 'create']);

    // Update
    Route::get('/update/{id}', [UsersController::class, 'edit'])->name('update-user');
    Route::post('/update/{id}', [UsersController::class, 'update']);

    // Delete
    Route::delete('/delete/{id}', [UsersController::class, 'destroy'])->name('delete-user');
});
