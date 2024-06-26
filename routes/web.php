<?php

use App\Http\Controllers\Backend\PermissionController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Frontend\NewsCommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\NewsPostController;
use App\Http\Controllers\Backend\SettingsController;
use App\Http\Controllers\Backend\PhotoGalleryController;
use App\Http\Controllers\Backend\VideoGalleryController;

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
Route::get('/changlang', [IndexController::class, 'changlang'])->name('changlang');
Route::get('/news', [IndexController::class, 'all_news'])->name('all_news');
Route::get('/news/category/{id}/{slug}', [IndexController::class, 'category_news'])->name('category_news');
Route::get('/news/subcategory/{id}/{slug}', [IndexController::class, 'sub_category_news'])->name('sub_category_news');
Route::get('/news/{id}/{slug}', [IndexController::class, 'news_details'])->name('news_details');
Route::post('/search_by_date', [IndexController::class, 'search_by_date'])->name('search_by_date');
Route::post('/search', [IndexController::class, 'search'])->name('search');
Route::get('/reporter/{id}', [IndexController::class, 'search_by_reporter'])->name('search_by_reporter');


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard', [UserController::class, 'user_dashboard'])->name('dashboard');
    Route::post('/profile/update', [AdminController::class, 'store'])->name('profile.update');
    Route::get('/profile/change_password', [UserController::class, 'change_password'])->name('profile.cng_pwd');
    Route::post('/profile/change_password', [AdminController::class, 'change_pwd'])->name('profile.change_pwd');

    Route::get('/logout', [AdminController::class, 'logout'])->name('logout');

    Route::post('/comment', [NewsCommentController::class, 'store_comment'])->name('comment');

});

require __DIR__ . '/auth.php';




// =============================== Admin Routes ===============================
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin']], function () {
    Route::get('/', function () {
        return redirect()->route('admin.dashboard');
    });
    Route::get('/dashboard', [AdminController::class, 'show_dashboard'])->name('admin.dashboard');
    Route::get('/profile', [AdminController::class, 'admin_profile'])->name('admin.profile');
    Route::post('/profile', [AdminController::class, 'store'])->name('admin.profile.store');
    Route::post('/change_password', [AdminController::class, 'change_pwd'])->name('admin.change_pwd');

    // Admin setting Routes
    Route::get('/web_settings', [SettingsController::class, 'index'])->name('admin.web_settings');
    Route::post('/web_settings_trnslt', [SettingsController::class, 'web_settings_trnslt'])->name('admin.web_settings_trnslt')->middleware('can:meta.translation');
    Route::post('/web_settings_backend', [SettingsController::class, 'web_settings_backend'])->name('admin.web_settings_backend');

    Route::middleware('status:active')->group(function () { // Keeping all Routes in status:active middleware 
        Route::controller(CategoryController::class)->middleware('status:active')->group(function () {
            // Category Routes
            Route::get('/category', 'index')->name('admin.category')->middleware('can:category.show');
            Route::post('/category', 'store')->name('admin.category')->middleware('can:category.add');
            Route::get('/category/{id}/edit', 'edit')->name('category.edit')->middleware('can:category.edit');
            Route::post('/category/{id}/edit', 'update')->name('category.edit')->middleware('can:category.edit');
            Route::get('/category/{id}/delete', 'destroy')->name('category.delete')->middleware('can:category.delete');

            // Sub Category Routes
            Route::get('/subcategory', 'sub_index')->name('admin.sub_category')->middleware('can:category.sub.show');
            Route::post('/subcategory', 'sub_store')->name('admin.sub_category')->middleware('can:category.sub.add');
            Route::get('/subcategory/{id}/edit', 'sub_edit')->name('sub_category.edit')->middleware('can:category.sub.edit');
            Route::post('/subcategory/{id}/edit', 'sub_update')->name('sub_category.edit')->middleware('can:category.sub.edit');
            Route::get('/subcategory/{id}/delete', 'sub_destroy')->name('sub_category.delete')->middleware('can:category.sub.delete');
            Route::get('/sub_category/ajax/{cat_id}', 'ajax_sub_cat');
        });

        Route::controller(AdminController::class)->group(function () {
            // Manage Admin Routes
            Route::get('/manage', 'manage')->name('admin.manage')->middleware('can:admins.show');
            Route::get('/active/{id}', 'active')->name('admin.active')->middleware('can:admins.deactive');
            Route::get('/inactive/{id}', 'inactive')->name('admin.inactive')->middleware('can:admins.deactive');

            Route::get('/user_manage', 'user_manage')->name('admin.user_manage')->middleware('can:admins.show.users');
            Route::get('/make_admin/{id}', 'make_admin')->name('admin.make_admin')->middleware('can:admins.make');
            Route::get('/make_user/{id}', 'make_user')->name('admin.make_user');

            Route::get('/admin_user_manage/{id}', 'admin_user_manage')->name('admin.admin_user_manage')->middleware('can:admins.edit');
            Route::put('/admin_user_manage/{id}', 'admin_user_manage_update')->name('admin.admin_user_manage_update')->middleware('can:admins.edit');
        });

        // Resoures Routes
        Route::resource('/news_post', NewsPostController::class);
        Route::resource('/photo_gallery', PhotoGalleryController::class);
        Route::resource('/video_gallery', VideoGalleryController::class);

        // Banner Routes
        Route::get('/banner', [BannerController::class, 'show_banners'])->name('admin.banner')->middleware('can:banner.show');
        Route::post('/banner/{id}', [BannerController::class, 'update_banners'])->name('admin.update.banner')->middleware('can:banner.show');

        // LiveTV Routes
        Route::get('/livetv', [BannerController::class, 'livetv'])->name('admin.livetv')->middleware('can:gallery.live.tv');
        Route::put('/livetv', [BannerController::class, 'livetvUpdate'])->name('admin.livetvUpdate')->middleware('can:gallery.live.tv');

        // Comments manage Routes
        Route::get('/news_comments', [NewsCommentController::class, 'news_comments'])->name('admin.news.comments')->middleware('can:news.comments');
        Route::get('/news_comments/{id}', [NewsCommentController::class, 'news_comments_approve'])->name('admin.news.comments.approve')->middleware('can:news.comment.delete');
        Route::get('/news_comments/{id}/delete', [NewsCommentController::class, 'news_comments_delete'])->name('admin.news.comments.delete')->middleware('can:news.comment.delete');
        Route::get('/notification/{id}', [NewsCommentController::class, 'notificationMarkAsRead'])->name('admin.notification');
        Route::get('/notif_mark_read', [NewsCommentController::class, 'allNotificationMarkAsRead'])->name('admin.notification_all');

        // Web Meta Data updating Routes 
        Route::get('/web_meta_data', [SettingsController::class, 'web_meta_data'])->name('admin.web_meta_data')->middleware('can:meta.manage');
        Route::post('/web_meta_data', [SettingsController::class, 'update_web_meta_data'])->name('admin.update_web_meta_data')->middleware('can:meta.manage');


        Route::resource('/permissions', PermissionController::class);// Permissions Routes
        Route::resource('/roles', RoleController::class);// Roles Routes
        Route::put('/roles_permissions/{id}', [RoleController::class, 'update_permissions'])->name('admin.permission_update');

    });
});