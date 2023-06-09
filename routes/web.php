<?php

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
    if (auth()->user()) {
        return redirect()->route('home');
    }else {
        return redirect()->route('login');
    }
});
Route::get('/trends/query/get', [App\Http\Controllers\Controller::class, 'getQueriesGoogleTrends'])->name('trends.query.get');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Google Trends
Route::get('/google/trends', [App\Http\Controllers\HomeController::class, 'google_trends_index'])->name('google.trends.index');

// Links
Route::get('/links', [App\Http\Controllers\HomeController::class, 'links_index'])->name('links.index');
Route::get('/links/delete/{link}', [App\Http\Controllers\HomeController::class, 'links_delete'])->name('links.delete');
Route::post('links/store', [App\Http\Controllers\HomeController::class, 'links_store'])->name('links.store');
Route::post('/links/status/change', [App\Http\Controllers\HomeController::class, 'links_status_change'])->name('links.status.change');

// Contents
Route::get('/contents', [App\Http\Controllers\HomeController::class, 'contents_index'])->name('contents.index');

// Setting
Route::get('/setting', [App\Http\Controllers\HomeController::class, 'setting_index'])->name('setting.index');
Route::put('/setting/robot/update', [App\Http\Controllers\HomeController::class, 'setting_robot_update'])->name('setting.robot.update');
Route::post('/settings/checklist/status', [App\Http\Controllers\HomeController::class, 'settings_check_status'])->name('setting.checklist.status');

// Users
Route::get('/users', [App\Http\Controllers\HomeController::class, 'users_index'])->name('users.index');
Route::post('/users/store', [App\Http\Controllers\HomeController::class, 'users_store'])->name('users.store');
Route::put('/users/update', [App\Http\Controllers\HomeController::class, 'users_update'])->name('users.update');
Route::get('/users/delete/{user}', [App\Http\Controllers\HomeController::class, 'users_delete'])->name('users.delete');

