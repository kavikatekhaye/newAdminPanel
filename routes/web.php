<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\FrontController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/',[FrontController::class,'index'])->name('index');
Route::get('admin/dashboard',[DashboardController::class,'index'])->middleware('auth');


Route::get('admin/blog/create',[BlogController::class,'create'])->name('admin.blog.create')->middleware('auth');
Route::post('admin/blog/store',[BlogController::class,'store'])->name('admin.blog.store')->middleware('auth');
Route::get('admin/blog/table',[BlogController::class,'table'])->name('admin.blog.table')->middleware('auth');
Route::get('admin/blog/edit/{id}',[BlogController::class,'edit'])->name('admin.blog.edit')->middleware('auth');
Route::post('admin/blog/update/{id}',[BlogController::class,'update'])->name('admin.blog.update')->middleware('auth');
Route::get('admin/blog/delete/{id}',[BlogController::class,'delete'])->name('admin.blog.delete')->middleware('auth');


route::get('admin/category/create',[CategoryController::class,'create'])->name('admin.category.create')->middleware('auth');
Route::post('admin/category/store',[CategoryController::class,'store'])->name('admin.category.store')->middleware('auth');
Route::get('admin/category/table',[CategoryController::class,'table'])->name('admin.category.table')->middleware('auth');
Route::get('admin/category/edit/{id}',[CategoryController::class,'edit'])->name('admin.category.edit')->middleware('auth');
Route::post('admin/category/update/{id}',[CategoryController::class,'update'])->name('admin.category.update')->middleware('auth');
Route::get('admin/category/delete/{id}',[CategoryController::class,'delete'])->name('admin.category.delete')->middleware('auth');

Route::get('/detail/{id}',[FrontController::class,'detail'])->name('detail');
Route::get('/view/{id}',[FrontController::class,'view'])->name('view');

    // Route::fallback(function(){return "Route Nahi  Delas n bhau";});

    Route::get('master',[FrontController::class,'master']);

// Kavi
