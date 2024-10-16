<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
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

Route::controller(AuthController::class,)->group(function() {
    Route::get('/', 'login')->name('Login');
    Route::post('/login', 'loginAction')->name('login.action');
    Route::get('/register', 'register')->name('Register');
    Route::post('/registersave', 'registerSave')->name('register.save');
});

Route::controller(AdminController::class,)->middleware('admin')->group(function(){
    Route::get('/admin/dashboard', 'index')->name('Admin.dashboard');
    Route::get('/admin/dashboard/novopost', 'novopost')->name('NovoPost.dashboard');
    Route::get('/admin/dashboard/meusposts', 'meusposts')->name('MeusPosts.dashboard');
});

Route::controller(UserController::class,)->middleware('user')->group(function(){
    Route::get('user/dashboard', 'index')->name('User.dashboard');
});


