<?php

use App\Http\Controllers\CarController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [CarController::class,'index']);

Route::get('/listing', [CarController::class,'listing']);

Route::get('/testimonials', [CarController::class,'testimonials']);

route::get('/blog', [CarController::class,'blog']);

route::get('/about', [CarController::class,'about']);

route::get('/contact', [CarController::class,'contact']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/administer', [App\Http\Controllers\HomeController::class, 'administer']);

Route::get('/layout/admin-index', [AdminController::class,'adminIndex'])->name('layout.admin-index');

Route::get('/adminpages/components-alerts', [AdminController::class,'componentsAlerts'])->name('adminpages.components-alerts');
