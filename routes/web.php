<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\RecordsController;
use App\Http\Controllers\GraphController;
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
    return view('admin/user/welcome');
});

Route::get('/homelogin', function () {
    return view('admin/user/home');
});

Route::get('/admin/usersetting', function () {
    return view('admin/user/usersetting');
});

Route::get('/homeselect', [MenuController::class, 'index']);

Route::get('/timer', [RecordsController::class, 'add']);

Route::post('/graph', [RecordsController::class, 'graph']);

Route::get('/graph', [GraphController::class,"show"]);

Route::get('/create', [UserController::class, 'add']);
Route::post('/create', [UserController::class, 'create']);

Route::get('/admin/setting', [SettingController::class, 'add']);
Route::post('/admin/setting', [SettingController::class, 'create']);

Route::post('/admin/menu', [MenuController::class, 'store']);

Route::get('/complete', [RecordsController::class, 'complete']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('homeselect');


