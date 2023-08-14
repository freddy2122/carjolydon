@extends('layouts.admin-index')

@section('content')
    <div class="container">
        <h1>Modifier une voiture</h1>
        <form action="{{ route('voiture.update', $voiture->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="marque" class="form-label">Marque</label>
                <input type="text" name="marque" class="form-control" value="{{ $voiture->marque }}" required>
            </div>
            <div class="mb-3">
                <label for="modele" class="form-label">Modèle</label>
                <input type="text" name="modele" class="form-control" value="{{ $voiture->modele }}" required>
            </div>
            <div class="mb-3">
                <label for="annee" class="form-label">Année</label>
                <input type="text" name="annee" class="form-control" value="{{ $voiture->annee }}" required>
            </div>
            <div class="mb-3">
                <label for="carrosserie_id" class="form-label">Style de carrosserie</label>
                <select name="carrosserie_id" class="form-select" required>
                    @foreach($carrosserie as $carrosseries)
                        <option value="{{ $carrosseries->id }}" {{ $voiture->carrosserie_id == $carrosseries->id ? 'selected' : '' }}>
                            {{ $carrosseries->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="transmission_id" class="form-label">Type de transmission</label>
                <select name="transmission_id" class="form-select" required>
                    @foreach($transmission as $transmissions)
                        <option value="{{ $transmissions->id }}" {{ $voiture->transmission_id == $transmissions->id ? 'selected' : '' }}>
                            {{ $transmissions->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="carburant_id" class="form-label">Type de carburant</label>
                <select name="carburant_id" class="form-select" required>
                    @foreach($carburant as $carburants)
                        <option value="{{ $carburants->id }}" {{ $voiture->carburant_id == $carburants->id ? 'selected' : '' }}>
                            {{ $carburants->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Prix</label>
                <input type="text" value="{{ $voiture->prix }}" name="prix" class="form-control"
                    id="" required>
            </div><br>
            <div class="mb-3">
                <label for="" class="form-label">Description</label>
                <input type="text" value="{{ $voiture->description }}"  name="description" class="form-control"
                    id="" required>
            </div><br>
            <!-- Ajoutez d'autres champs ici -->
            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
    </div>
@endsection
