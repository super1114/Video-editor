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
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\TCLEmailController;


Route::get('/', function () {
    return redirect(route("login"));
})->name('welcome');





Auth::routes();
//Route::get('sendMail', [TCLEmailController::class, 'sendHireEmailToCustomer'])->name('email');


Route::prefix('/')
    ->group(function () {
        Route::get('home', [HomeController::class, 'index'])->name('home');
        Route::post('upload_resource', 'App\Http\Controllers\ResourceController@upload')->name('upload_resource');
        Route::post('delete_resource', 'App\Http\Controllers\ResourceController@delete')->name('del_resource');
        Route::get('index', [ProjectController::class, 'index'])->name('index');
        Route::get('new_project/{project_name}', [ProjectController::class, 'create'])->name('new_project');
        Route::get('new_project_page', [ProjectController::class, 'new_project_page'])->name('new_project_page');
        Route::get('project/{hash}', [ProjectController::class, 'project'])->name('project');
        Route::get('export_video/{hash}', [ProjectController::class, 'export_video'])->name('export_video');
        Route::post('order_video', [ProjectController::class, 'order_video'])->name('order_video');
        Route::get('getComponent/{resource_id}', [ResourceController::class, 'getComponent'])->name('getComponent');
        Route::get('qrcode', [QRController::class, 'generateQrCode'])->name('qrcode');
});

Route::get('/{any}', function(){
    return redirect()->route("welcome");
});


