@extends('layouts.admin-index')

@section('content')
    <div class="container">
        <h1>Ajouter une image à une voiture</h1>
        <form action="{{ route('image.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="voiture_id" class="form-label">Sélectionnez une voiture</label>
                <select name="voiture_id" class="form-select" required>
                    @foreach($voitures as $voiture)
                        <option value="{{ $voiture->id }}">{{ $voiture->marque }} {{ $voiture->modele }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Télécharger une image</label>
                <input type="file" name="image" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Ajouter l'image</button>
        </form>
    </div>
@endsection
