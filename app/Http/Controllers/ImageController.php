<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Voitures;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function image_create()
    {
        $voitures = Voitures::all();
        return view('ajouter-image', compact('voitures'));
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

        return redirect()->route('image.create')->with('success', 'Image ajoutée avec succès.');
    }
}
