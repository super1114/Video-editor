<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TCLEmailController;


Route::get('/', function () {
    return view('welcome');
})->name('welcome');



Route::get('/newhiremockup', function () {
    return view('newbooking');
});

Route::get('/checkoutmockup', function () {
    return view('checkout');
});
Route::get('/rigid', function () {
    return view('rigid');
});

Auth::routes();

Route::post('videosStore', 'App\Http\Controllers\MediaController@saveVideo')->name('videos.store');
Route::post('imagesStore', 'App\Http\Controllers\MediaController@saveImage')->name('images.store');

Route::post('upload_resource', 'App\Http\Controllers\ResourceController@upload')->name('upload_resource');

Route::get('index', [ProjectController::class, 'index'])->name('index');
Route::get('new_project/{project_name}', [ProjectController::class, 'create'])->name('new_project');
Route::get('project/{hash}', [ProjectController::class, 'project'])->name('project');


Route::get('sendMail', [TCLEmailController::class, 'sendHireEmailToCustomer'])->name('email');


Route::prefix('/')
    ->group(function () {
        Route::get('home', [HomeController::class, 'index'])->name('home');

        
    });

Route::get('/{any}', function(){
    return redirect()->route("welcome");
});
Route::get('qrcode', 'QRController@generateQrCode');

