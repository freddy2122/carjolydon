@extends('layouts.admin-index')

@section('content')
    <div class="container">
        <h1>Détails de la voiture</h1>
        <div class="card mb-3">
            <div class="card-header">
                {{ $voiture->marque }} {{ $voiture->modele }}
            </div>
            <div class="card-body">
                <h5 class="card-title">Année : {{ $voiture->annee }}</h5>
                <h5 class="card-title">Prix : {{ $voiture->prix }}</h5>
                <h5 class="card-title">Description : {{ $voiture->description }}</h5>
                <p class="card-text">Style de carrosserie : {{ $voiture->carrosserie->name }}</p>
                <p class="card-text">Type de transmission : {{ $voiture->transmission->name }}</p>
                <p class="card-text">Type de carburant : {{ $voiture->carburant->name }}</p>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                Images associées
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach($voiture->images as $image)
                        <div class="col-md-4 mb-3">
                            <img src="{{ asset('storage/images' . $image->url) }}" class="img-fluid" alt="Image">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
