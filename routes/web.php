<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminDashboard;
use App\Http\Controllers\instructorDashboard;
use App\Http\Middleware\Role;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth','role:admin'])->group(function(){
    Route::get('/adminDashboard', [adminDashboard::class, 'adminDashboard'])->name('adminDashboard');
    Route::get('/adminprofile', [adminDashboard::class, 'adminDashboard'])->name('adminprofile');
});

Route::middleware(['auth', 'role:instructor'])->group(function () {
    Route::get('/instructorDashboard', [instructorDashboard::class, 'instructorDashboard'])->name('instructorDashboard');
});
Route::get('/adminlogin', [adminDashboard::class, 'adminlogin'])->name('adminlogin');
Route::get('/adminlogout', [adminDashboard::class, 'adminlogout'])->name('adminlogout');
