@extends('layouts.agent-index')

@section('content')
    <div class="pagetitle">
        <h1>Commandes</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/agentpages/commandes">Commandes</a></li>
                <li class="breadcrumb-item active">Détail</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Détails de la commande</h5>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th scope="row">ID de la commande</th>
                                    <td>{{ $commande->id }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Agent</th>
                                    <td>{{ $commande->agent->name }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Client</th>
                                    <td>{{ $commande->client->nom }} {{ $commande->client->prenom }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Adresse du client</th>
                                    <td>{{ $commande->client->adresse }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Téléphone du client</th>
                                    <td>{{ $commande->client->telephone }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Voiture</th>
                                    <td>{{ $commande->voiture->marque }} {{ $commande->voiture->modele }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Transmission</th>
                                    <td>{{ $commande->voiture->transmission->name }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Carrosserie</th>
                                    <td>{{ $commande->voiture->carrosserie->name }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Carburant</th>
                                    <td>{{ $commande->voiture->carburant->name }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Prix de la voiture</th>
                                    <td>{{ $commande->voiture->prix }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Description de la voiture</th>
                                    <td>{{ $commande->voiture->description }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Images de la voiture</th>
                                    <td>
                                        @if ($commande->voiture->images->count() > 0)
                                            <div class="row">
                                                @foreach ($commande->voiture->images as $image)
                                                    <div class="col-md-4">
                                                        <a href="{{ asset('storage/' . $image->path) }}" target="_blank">
                                                            <img src="{{ asset('storage/' . $image->path) }}" alt="Image de la voiture" class="img-thumbnail">
                                                        </a>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @else
                                            Aucune image disponible pour cette voiture.
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center">
                        <a href="{{ route('agentpages.commandes') }}" class="btn btn-secondary">Retour à la liste des commandes</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
