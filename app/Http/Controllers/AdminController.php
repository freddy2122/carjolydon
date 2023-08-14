<?php

namespace App\Http\Controllers;

use App\Models\Carburant;
use App\Models\Carrosserie;
use App\Models\Image;
use App\Models\Transmission;
use App\Models\Voitures;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function adminIndex()
    {
        return view('adminpages.bodyadmin');
    }


    // transmission

    public function transmission()
    {
        $transmission = Transmission::all();
        return view('adminpages.transmission', compact('transmission'));
    }

    public function transmission_store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
        ]);

        Transmission::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('adminpages.transmission')->with('success', 'Transmission ajoutée avec succès.');
    }

    public function deleteTransmission($id)
    {
        $transmission = Transmission::findOrFail($id);
        $transmission->delete();

        return redirect()->route('adminpages.transmission')->with('success', 'Transmission supprimée avec succès.');
    }

    // carburant

    public function carburant()
    {
        $carburant = Carburant::all();
        return view('adminpages.carburant', compact('carburant'));
    }
    public function carburant_store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',

        ]);

        Carburant::create([
            'name' => $request->name,

        ]);

        return redirect()->route('adminpages.carburant')->with('success', 'Transmission ajoutée avec succès.');
    }












    // carrosserie

    public function carrosserie()
    {
        $carrosserie = Carrosserie::all();
        return view('adminpages.carrosserie', compact('carrosserie'));
    }

    public function carrosserie_store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',

        ]);

        Carrosserie::create([
            'name' => $request->name,

        ]);

        return redirect()->route('adminpages.carrosserie')->with('success', 'Transmission ajoutée avec succès.');
    }


    // voitures

    public function createVoitureForm()
    {
        $carrosserie = Carrosserie::all();
        $transmission = Transmission::all();
        $carburant = Carburant::all();
        $voiture = Voitures::with(['carrosserie', 'transmission', 'carburant'])->get();

        return view('adminpages.voitures', compact('carrosserie', 'transmission', 'carburant', 'voiture'));
    }

    public function storeVoiture(Request $request)
    {
        $request->validate([
            'marque' => 'required',
            'annee' => 'required|integer',
            'modele' => 'required',
            'prix' => 'required',
            'description' => 'required',
            'carrosserie_id' => 'required',
            'transmission_id' => 'required',
            'carburant_id' => 'required',
        ]);


        Voitures::create([
            'marque' => $request->marque,
            'annee' => $request->annee,
            'modele' => $request->modele,
            'prix' => $request->prix,
            'description' => $request->description,
            'carrosserie_id' => $request->carrosserie_id,
            'transmission_id' => $request->transmission_id,
            'carburant_id' => $request->carburant_id,

        ]);

        /*  $voiture = Voitures::create($request->except('images'));

    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            $path = $image->store('voiture_images', 'public');
            $voiture->images()->create(['path' => $path]);
        }
    } */

        return redirect()->route('adminpages.voitures')->with('success', 'Véhicule enregistré avec succès.');
    }


    public function edit(Voitures $voiture)
    {
        $carrosserie = Carrosserie::all();
        $transmission = Transmission::all();
        $carburant = Carburant::all();

        return view('/adminpages/editer-voiture', compact('voiture', 'carrosserie', 'transmission', 'carburant'));
    }

    public function update(Request $request, Voitures $voiture)
    {
        $request->validate([
            'marque' => 'required',
            'modele' => 'required',
            'annee' => 'required|integer',
            'prix' => 'required',
            'description' => 'required',
            'carrosserie_id' => 'required|exists:carrosseries,id',
            'transmission_id' => 'required|exists:transmissions,id',
            'carburant_id' => 'required|exists:carburants,id',
        ]);

        $voiture->update($request->all());

        return redirect()->route('adminpages.voitures')->with('success', 'Voiture mise à jour avec succès.');
    }




    public function showDetails(Voitures $voiture)
{
    $voiture->load('carrosserie', 'transmission', 'carburant', 'images');

    return view('adminpages.detail-voiture', compact('voiture'));
}




    public function deleteVoitures($id)
    {
        $voitures = Voitures::findOrFail($id);
        $voitures->delete();

        return redirect()->route('adminpages.voitures')->with('success', 'Voiture supprimée avec succès.');
    }

    public function voitures()
    {

        return view('adminpages.voitures');
    }











    public function administer()
    {
        return view('adminpages.adminbody');
    }





    //image

    public function image_create()
    {
        $voitures = Voitures::all();
        return view('/adminpages/ajouter-image', compact('voitures'));
    }

    public function image_store(Request $request)
    {
        $request->validate([
            'voiture_id' => 'required|exists:voitures,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $voiture = Voitures::findOrFail($request->voiture_id);

        $imagePath = $request->file('image')->store('images', 'public');

        Image::create([
            'voiture_id' => $voiture->id,
            'path' => $imagePath,
        ]);

        return redirect()->route('image.store')->with('success', 'Image ajoutée avec succès.');
    }
}
