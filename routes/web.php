<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\CreditController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;

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
Route::get('/{locale}/locale', [Controller::class, 'setLocaleLanguage'])->name('locale');

Route::middleware(['auth', 'verified', 'locale'])->group(function () {
    
    Route::resource('users', UserController::class);
    Route::resource('credits', CreditController::class);
    Route::resource('students', StudentController::class);

    Route::get('/dashboard', [Controller::class, 'dashboard'])->name('dashboard');
    Route::get('/students-search', [StudentController::class, 'search'])->name('students.search');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
