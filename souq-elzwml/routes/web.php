<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\SubCategoryController;

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


Auth::routes();

Route::get('/', function () {
    if(Auth::check()){
        return redirect('/home');
    }
    return view('auth.login');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/lang/{locale}', [LangController::class, 'change'])->middleware('SetLocal')->name('lang');


Route::resource('/admin/categories', CategoryController::class)->middleware('IsAdmin');

Route::resource('/admin/subCategories', SubCategoryController::class)->middleware('IsAdmin');

Route::resource('/user/products', ProductController::class);

