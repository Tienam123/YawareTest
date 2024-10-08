<?php

use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\ProfileController;
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



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard')->middleware('can:dashboard');
    Route::get('/reports', function () {return view('reports');})->name('reports')->middleware('can:reports');
    Route::get('/configuration', function () {return view('configuration');})->name('configuration')->middleware('can:configuration');
    Route::resource('admin/users', UsersController::class)->names('admin.users')->except('show')->middleware('can:users');
    Route::resource('admin/roles', RoleController::class)->names('admin.roles')->except('show')->middleware('can:roles');
});



require __DIR__.'/auth.php';
