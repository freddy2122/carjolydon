<?php

use App\Http\Controllers\CarController;
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

Route::get('/', [CarController::class,'index']);

Route::get('/listing', [CarController::class,'listing']);

Route::get('/testimonials', [CarController::class,'testimonials']);

route::get('/blog', [CarController::class,'blog']);

route::get('/about', [CarController::class,'about']);

route::get('/contact', [CarController::class,'contact']);
