<?php

use App\Http\Controllers\AdminController;
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




Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/administer', [AdminController::class, 'administer']);

    Route::get('/layout/admin-index', [AdminController::class,'adminIndex'])->name('layout.admin-index');
//transmission
    Route::get('/adminpages/transmission', [AdminController::class,'transmission'])->name('adminpages.transmission');
    Route::post('/adminpages/transmission', [AdminController::class,'transmission_store'])->name('transmission_store');
    Route::get('/adminpages/transmission/{id}/delete', [AdminController::class, 'deleteTransmission'])->name('transmission.delete');


    //carburant
    Route::get('/adminpages/carburant', [AdminController::class,'carburant'])->name('adminpages.carburant');
    Route::post('/adminpages/carburant', [AdminController::class,'carburant_store'])->name('carburant_store');


//image
Route::get('/adminpages/ajouter-image', [AdminController::class, 'image_create']);
Route::post('/adminpages/ajouter-image', [AdminController::class, 'image_store'])->name('image.store');


// carrosserie
    Route::get('/adminpages/carrosserie', [AdminController::class,'carrosserie'])->name('adminpages.carrosserie');
    Route::post('/adminpages/carrosserie', [AdminController::class,'carrosserie_store'])->name('carrosserie_store');


    //voitures
    Route::get('/adminpages/voitures', [AdminController::class,'createVoitureForm'])->name('adminpages.voitures');
    Route::post('/adminpages/voitures', [AdminController::class,'storeVoiture'])->name('voiture.store');
    Route::get('/adminpages/voitures/{id}/delete', [AdminController::class, 'deleteVoitures'])->name('voitures.delete');
    Route::get('/adminpages/voitures/{voiture}/editer', [AdminController::class, 'edit'])->name('voiture.edit');
    Route::put('/adminpages/voitures/{voiture}', [AdminController::class, 'update'])->name('voiture.update');
    Route::get('/adminpages/voitures/{voiture}/details', [AdminController::class, 'showDetails'])->name('voiture.showDetails');
});
