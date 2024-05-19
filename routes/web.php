<?php

use App\Http\Controllers\AdminController;
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
    return view('frontend.home');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard', [UserController::class, 'user_dashboard'])->name('dashboard');
    Route::post('/profile/update', [AdminController::class, 'store'])->name('profile.update');
    Route::get('/profile/change_password', [UserController::class, 'change_password'])->name('profile.cng_pwd');
    Route::post('/profile/change_password', [AdminController::class, 'change_pwd'])->name('profile.change_pwd');

    Route::get('/logout', [AdminController::class, 'logout'])->name('logout');
});

require __DIR__.'/auth.php';




// Admin Routes 
Route::middleware(['auth', 'role:admin'])->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'show_dashboard'])->name('admin.dashboard');
    Route::get('/admin/profile', [AdminController::class, 'admin_profile'])->name('admin.profile');
    Route::post('/admin/profile', [AdminController::class, 'store'])->name('admin.profile.store');
    Route::post('/admin/change_password', [AdminController::class, 'change_pwd'])->name('admin.change_pwd');
});