<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CKEditorController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ReferenceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectCategoryController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\ToolController;
use App\Http\Controllers\WebsettingController;
require __DIR__.'/auth.php';


Route::get('/', function () {
    $projectCategorys = \App\Models\ProjectCategory::where('status','Active')->get();
    $projects = \App\Models\Project::where('status','Active')->get();
    return view('front_end.content.home.index',compact('projects','projectCategorys'));
});


Route::get('/dashboard', function () {
    return view('dashboard.content.home.index');
})->middleware(['auth'])->name('dashboard');


Route::middleware(['auth'])->group(function () {
    Route::name('webSettings.')->group(function(){
        Route::get('/setting/index',[WebsettingController::class,'index'])->name('index');
        Route::post('/setting/update', [WebsettingController::class, 'update'])->name('update');
        Route::post('/setting/social/update', [WebsettingController::class, 'socialUpdate'])->name('social.update');
    });

    Route::name('slider.')->group(function(){
        Route::get('/slider/index',[SliderController::class,'index'])->name('index');
        Route::post('/slider/store', [SliderController::class, 'store'])->name('store');
        Route::get('/slider/fetch', [SliderController::class, 'fetch'])->name('fetch');
        Route::get('/slider/edit', [SliderController::class, 'edit'])->name('edit');
        Route::post('/slider/update', [SliderController::class, 'update'])->name('update');
        Route::delete('/slider/delete', [SliderController::class, 'delete'])->name('delete');
    });

    Route::name('tool.')->group(function(){
        Route::get('/tool/index',[ToolController::class,'index'])->name('index');
        Route::post('/tool/store', [ToolController::class, 'store'])->name('store');
        Route::get('/tool/fetch', [ToolController::class, 'fetch'])->name('fetch');
        Route::get('/tool/edit', [ToolController::class, 'edit'])->name('edit');
        Route::post('/tool/update', [ToolController::class, 'update'])->name('update');
        Route::delete('/tool/delete', [ToolController::class, 'delete'])->name('delete');
    });

    Route::name('projectCategory.')->group(function(){
        Route::get('/projectCategory/index',[ProjectCategoryController::class,'index'])->name('index');
        Route::post('/projectCategory/store', [ProjectCategoryController::class, 'store'])->name('store');
        Route::get('/projectCategory/fetch', [ProjectCategoryController::class, 'fetch'])->name('fetch');
        Route::get('/projectCategory/edit', [ProjectCategoryController::class, 'edit'])->name('edit');
        Route::post('/projectCategory/update', [ProjectCategoryController::class, 'update'])->name('update');
        Route::delete('/projectCategory/delete', [ProjectCategoryController::class, 'delete'])->name('delete');
    });

    Route::name('project.')->group(function(){
        Route::get('/project/index',[ProjectController::class,'index'])->name('index');
        Route::post('/project/store', [ProjectController::class, 'store'])->name('store');
        Route::get('/project/fetch', [ProjectController::class, 'fetch'])->name('fetch');
        Route::get('/project/edit', [ProjectController::class, 'edit'])->name('edit');
        Route::post('/project/update', [ProjectController::class, 'update'])->name('update');
        Route::delete('/project/delete', [ProjectController::class, 'delete'])->name('delete');
    });

});

