<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminDashboard;
use App\Http\Controllers\instructorDashboard;
use App\Http\Controllers\UserController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [UserController::class, 'index'])->name('index');
Route::get('/dashboard', function () {
    return view('frontend.dashboard.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth','role:admin'])->group(function(){
    Route::get('/adminDashboard', [adminDashboard::class, 'adminDashboard'])->name('adminDashboard');
    Route::get('/adminprofile', [adminDashboard::class, 'adminprofile'])->name('adminprofile');
    Route::POST('/adminprofilechange', [adminDashboard::class, 'adminprofilechange'])->name('adminprofilechange');
    Route::get('admin/password', [adminDashboard::class, 'adminpassword'])->name('admin.password');
    Route::POST('admin/password/update', [adminDashboard::class, 'adminpasswordupdate'])->name('admin.password.update');
});

Route::middleware(['auth', 'role:instructor'])->group(function () {
    Route::get('/instructorDashboard', [instructorDashboard::class, 'instructorDashboard'])->name('instructorDashboard');
    Route::get('/instructroprofile', [instructorDashboard::class, 'instructroprofile'])->name('instructroprofile');
    Route::POST('/instructroprofileupdate', [adminDashboard::class, 'instructroprofileupdate'])->name('instructroprofileupdate');
});
Route::get('/adminlogin', [adminDashboard::class, 'adminlogin'])->name('adminlogin');
Route::get('/adminlogout', [adminDashboard::class, 'adminlogout'])->name('adminlogout');
Route::get('/instructorlogout', [adminDashboard::class, 'instructorlogout'])->name('instructorlogout');

