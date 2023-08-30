<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CommercialController;
use App\Http\Controllers\MecanicienController;
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

Route::get('/', [CarController::class, 'index']);

Route::get('/listing', [CarController::class, 'listing']);

Route::get('/testimonials', [CarController::class, 'testimonials']);

route::get('/blog', [CarController::class, 'blog']);

route::get('/about', [CarController::class, 'about']);

route::get('/contact', [CarController::class, 'contact']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



// administrateur

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/administer', [AdminController::class, 'administer']);

    Route::get('/layout/admin-index', [AdminController::class, 'adminIndex'])->name('layout.admin-index');
    //transmission
    Route::get('/adminpages/transmission', [AdminController::class, 'transmission'])->name('adminpages.transmission');
    Route::post('/adminpages/transmission', [AdminController::class, 'transmission_store'])->name('transmission_store');
    Route::get('/adminpages/transmission/{id}/delete', [AdminController::class, 'deleteTransmission'])->name('transmission.delete');


    //carburant
    Route::get('/adminpages/carburant', [AdminController::class, 'carburant'])->name('adminpages.carburant');
    Route::post('/adminpages/carburant', [AdminController::class, 'carburant_store'])->name('carburant_store');


    //image
    Route::get('/adminpages/ajouter-image', [AdminController::class, 'image_create']);
    Route::post('/adminpages/ajouter-image', [AdminController::class, 'image_store'])->name('image.store');


    // carrosserie
    Route::get('/adminpages/carrosserie', [AdminController::class, 'carrosserie'])->name('adminpages.carrosserie');
    Route::post('/adminpages/carrosserie', [AdminController::class, 'carrosserie_store'])->name('carrosserie_store');


    //voitures
    Route::get('/adminpages/voitures', [AdminController::class, 'createVoitureForm'])->name('adminpages.voitures');
    Route::post('/adminpages/voitures', [AdminController::class, 'storeVoiture'])->name('voiture.store');
    Route::get('/adminpages/voitures/{id}/delete', [AdminController::class, 'deleteVoitures'])->name('voitures.delete');
    Route::get('/adminpages/voitures/{voiture}/editer', [AdminController::class, 'edit'])->name('voiture.edit');
    Route::put('/adminpages/voitures/{voiture}', [AdminController::class, 'update'])->name('voiture.update');
    Route::get('/adminpages/voitures/{voiture}/details', [AdminController::class, 'showDetails'])->name('voiture.showDetails');

    //employés

    Route::get('/adminpages/employes', [AdminController::class, 'employes'])->name('adminpages.employes');
    Route::put('/adminpages/employes/{user}', [AdminController::class, 'updateRole'])->name('admin.users.updateRole');
    Route::delete('/adminpages/employes/{user}', [AdminController::class, 'destroy'])->name('employes.destroy');


});



// agent

Route::middleware(['auth', 'agent'])->group(function () {
    Route::get('/agentpages/dashboard', [AgentController::class, 'index']);
  //client

  Route::get('/agentpages/client', [AgentController::class, 'client'])->name('adminpages.client');
  Route::post('/agentpages/client', [AgentController::class, 'createClient'])->name('clients.store');

  //commandes
  Route::get('/agentpages/commandes', [AgentController::class, 'commandes'])->name('agentpages.commandes');
Route::get('/agentpages/commandes/create', [AgentController::class, 'createCommandeForm'])->name('agentpages.commandes.create');
Route::post('/agentpages/commandes', [AgentController::class, 'storeCommande'])->name('agentpages.commandes.store');
Route::get('/agentpages/commandes/{commande}', [AgentController::class, 'showCommandeDetails'])->name('agentpages.commandes.show');
Route::get('/agentpages/commandes/{id}/pdf', [AgentController::class, 'generatePdf'])->name('agentpages.commandes.pdf');
Route::get('/agentpages/commande/{id}/pdf', [AgentController::class, 'showCommandeDetails'])->name('agentpages.commande.detail.pdf');
Route::put('agentpages/commandes/{commande}/update-status', [AgentController::class, 'updateCommandeStatus'])->name('agentpages.commandes.updateStatus');
Route::get('agentpages/suivicommandes', [AgentController::class, 'suiviCommandes'])->name('agentpages.suiviCommandes');
//rendezvous
// Route pour afficher le formulaire et la liste des rendez-vous
Route::get('/agentpages/rendezvous', [AgentController::class,'rendezVous'])->name('agentpages.rendezvous');

// Route pour enregistrer un nouveau rendez-vous
Route::post('/agentpages/rendezvous', [AgentController::class,'rendezVous'])->name('agentpages.rendezvous');

});


//mécanicien

Route::middleware(['auth', 'mecanicien'])->group(function () {
    Route::get('/mecanicienpages/dashboard', [MecanicienController::class, 'index']);


});


//commercial

Route::middleware(['auth', 'commercial'])->group(function () {
    Route::get('/commercialepages/dashboard', [CommercialController::class, 'index']);


});
