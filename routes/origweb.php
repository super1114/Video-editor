<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QrController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HireController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TankerController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\CheckListNrController;
use App\Http\Controllers\CheckListRigidController;

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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('/')
    ->middleware('auth')
    ->group(function () {
        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);

        Route::resource('settings', SettingController::class);
        Route::resource('qrs', QrController::class);
        Route::resource('logs', LogController::class);
        Route::resource('companies', CompanyController::class);
        Route::resource('users', UserController::class);
        Route::resource('check-list-rigids', CheckListRigidController::class);
        Route::resource('hires', HireController::class);
        Route::resource('tankers', TankerController::class);
        Route::resource('check-list-n-rs', CheckListNrController::class);
    });
