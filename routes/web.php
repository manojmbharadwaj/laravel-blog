<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Middleware\AdminUser;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DummyLoginController;
use App\Http\Controllers\GoogleAuthController;

Route::get('/', function () {
    return view('welcome');
})->name('home_page');

Route::get('callback/google', [GoogleAuthController::class, 'auth'])->name('g_login.login');
Route::get('gauth-success', [GoogleAuthController::class, 'callback'])->name('g_login.success');
Route::post('logout', [GoogleAuthController::class, 'logout'])->name('g_login.logout');

// Fake login should only be available in dev environments.
if (env('APP_DEBUG')) {
    Route::get('callback/fl', [DummyLoginController::class, 'fakeLogin']);
    Route::get('callback/fr/{email}', [DummyLoginController::class, 'fakeRegister']);
}

// Admin Only Routes
Route::middleware(['auth', AdminUser::class])->group(function () {
    Route::get('/admin', [DashboardController::class, 'index'])->name('admin.index');
    Route::resource('admin/post', PostController::class);
    Route::resource('admin/category', CategoryController::class);
});
