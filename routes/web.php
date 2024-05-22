<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\NewsPostController;
use App\Http\Controllers\IndexController;
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

Route::get('/', [IndexController::class, 'home'])->name('home');
Route::get('/news', [IndexController::class, 'all_news'] )->name('all_news');
Route::get('/news/category/{id}/{slug}', [IndexController::class, 'category_news'] )->name('category_news');
Route::get('/news/subcategory/{id}/{slug}', [IndexController::class, 'sub_category_news'] )->name('sub_category_news');
Route::get('/news/{id}/{slug}', [IndexController::class, 'news_details'] )->name('news_details');

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

require __DIR__ . '/auth.php';




// Admin Routes 
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin']], function () {
    Route::get('/', function () {
        return redirect()->route('admin.dashboard');
    });
    Route::get('/dashboard', [AdminController::class, 'show_dashboard'])->name('admin.dashboard');
    Route::get('/profile', [AdminController::class, 'admin_profile'])->name('admin.profile');
    Route::post('/profile', [AdminController::class, 'store'])->name('admin.profile.store');
    Route::post('/change_password', [AdminController::class, 'change_pwd'])->name('admin.change_pwd');

    Route::controller(CategoryController::class)->middleware('status:active')->group(function () {
        // Category Routes
        Route::get('/category', 'index')->name('admin.category');
        Route::post('/category', 'store')->name('admin.category');

        Route::get('/category/{id}/edit', 'edit')->name('category.edit');
        Route::post('/category/{id}/edit', 'update')->name('category.edit');

        Route::get('/category/{id}/delete', 'destroy')->name('category.delete');

        // Sub Category Routes
        Route::get('/subcategory', 'sub_index')->name('admin.sub_category');
        Route::post('/subcategory', 'sub_store')->name('admin.sub_category');

        Route::get('/subcategory/{id}/edit', 'sub_edit')->name('sub_category.edit');
        Route::post('/subcategory/{id}/edit', 'sub_update')->name('sub_category.edit');

        Route::get('/subcategory/{id}/delete', 'sub_destroy')->name('sub_category.delete');

        Route::get('/sub_category/ajax/{cat_id}', 'ajax_sub_cat');
    });

    Route::controller(AdminController::class)->middleware('status:active')->group(function () {
        Route::get('/manage', 'manage')->name('admin.manage');
        Route::get('/active/{id}', 'active')->name('admin.active');
        Route::get('/inactive/{id}', 'inactive')->name('admin.inactive');
    });

    Route::resource('/news_post', NewsPostController::class)->middleware('status:active');
});