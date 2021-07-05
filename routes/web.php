<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ResourceController;


Route::get('/', function () {
    return redirect(route("login"));
})->name('welcome');





Auth::routes();


Route::prefix('/')
    ->group(function () {
        Route::any('home', [HomeController::class, 'index'])->name('ttt');
        Route::post('upload_resource', 'App\Http\Controllers\ResourceController@upload')->name('upload_resource');
        Route::post('delete_resource', 'App\Http\Controllers\ResourceController@delete')->name('del_resource');
        Route::get('index', [ProjectController::class, 'index'])->name('index');
        Route::get('new_project/{project_name}', [ProjectController::class, 'create'])->name('new_project');
        Route::get('new_project_page', [ProjectController::class, 'new_project_page'])->name('new_project_page');
        Route::get('my_projects', [ProjectController::class, 'my_projects'])->name('my_projects');
        Route::get('project/{hash}', [ProjectController::class, 'project'])->name('project');
        Route::post('export_video/{hash}', [ProjectController::class, 'export_video'])->name('export_video');
        Route::post('order_video', [ProjectController::class, 'order_video'])->name('order_video');
        Route::post('add_item', [ProjectController::class, 'add_item'])->name('add_item');
        Route::post('save_item', [ProjectController::class, 'save_item'])->name('save_item');
        Route::post('del_item', [ProjectController::class, 'del_item'])->name('del_item');
        Route::post('cut_item', [ProjectController::class, 'cut_item'])->name('cut_item');
        Route::get('getComponent/{resource_id}', [ResourceController::class, 'getComponent'])->name('getComponent');
});

Route::get('/{any}', function(){
    return redirect()->route("welcome");
});


