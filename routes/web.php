<?php

use App\Http\Controllers\{BlogController, CategoryController,PostController,TagController,DashboardController, FileManagerController, RoleController, UserController};
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();
Route::get('/', [BlogController::class,'index'])->name('blog.index');
Route::get('/home', [BlogController::class,'home'])->name('blog.home');
Route::get('/blog', [BlogController::class,'content'])->name('blog.content');
Route::get('/blog/{slug}', [BlogController::class,'detail'])->name('blog.detail');
Route::get('/blog/author', [BlogController::class,'authors'])->name('blog.authors');
Route::get('/category', [BlogController::class,'category'])->name('blog.category');

Route::group(['prefix' => 'dashboard', 'middleware' => ['auth']], function(){
    Route::get('/', [DashboardController::class,'index'])->name('dashboard.index');
    Route::get('/tags/select', [TagController::class,'select'])->name('tags.select');
    Route::resource('/tags', TagController::class);
    Route::resource('/posts', PostController::class);
    Route::get('/category/select',[CategoryController::class,'select'])->name('category.select');
    Route::resource('/category', CategoryController::class);
    // Filemanager
    Route::group(['prefix' => 'filemanager'], function () {
        Route::get('/index', [FileManagerController::class,'index'])->name('filemanager.index');
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });

    // Roles
    Route::get('/roles/select',[RoleController::class,'select'])->name('roles.select');
    Route::resource('/roles', RoleController::class);
    // Roles
    Route::resource('/users', UserController::class);
});

