<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\NumberController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
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

Route::redirect('/', '/home');

Route::group(['prefix' => 'login', 'middleware' => 'guest'], function () {
    Route::get('/', [LoginController::class, 'create'])->name('login');
    Route::post('/', [LoginController::class, 'store'])->name('login.store');
});

Route::middleware(['auth'])->group(function () {
    Route::get('logout', [LoginController::class, 'destroy'])->name('logout');

    // visão geral
    Route::get('/home', DashboardController::class)->name('dashboard');

    Route::resources([
        'users' => UserController::class,
        'customers' => CustomerController::class,
        'numbers' => NumberController::class,

        // ACL
        'permissions' => PermissionController::class,
        'roles' => RoleController::class,
    ], []);
});
