<?php

use App\Http\Controllers\MainUserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'admin', 'middleware' => ['admin:admin']], function() {
    Route::get('/login', [\App\Http\Controllers\AdminController::class, 'loginForm']);
    Route::post('/login', [\App\Http\Controllers\AdminController::class, 'store'])->name('admin.login');
} );

Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    return view('user.index');
})->name('dashboard');

Route::get('/user/logout', [MainUserController::class, 'logout'])->name('user.logout');
Route::get('/admin/logout', [\App\Http\Controllers\AdminController::class, 'destroy'])->name('admin.logout');

//User All Route
Route::get('/user/profile', [MainUserController::class, 'UserProfile'])->name('user.profile');
Route::get('/user/profile/edit', [MainUserController::class, 'UserProfileEdit'])->name('profile.edit');
Route::post('/user/profile/update', [MainUserController::class, 'UserProfileUpdate'])->name('profile.update');

