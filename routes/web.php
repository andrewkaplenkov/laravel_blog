<?php

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Main\IndexController;
use App\Http\Controllers\Admin\IndexController  as AdminIndexController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::prefix('admin')->as('admin.')->group(function () {
    Route::get('/', AdminIndexController::class)->name('index');

    Route::resource('/categories', AdminCategoryController::class)->except(['show']);
});

Route::as('main.')->group(function () {
    Route::get('/', IndexController::class)->name('index');
});

Auth::routes();





// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
