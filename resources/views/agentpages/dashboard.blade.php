@extends('layouts.agent-index')

@section('content')

<div class="pagetitle">
    <h1>Tableau de bord</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Accueil</a></li>
            <li class="breadcrumb-item">Tableau de bord</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Commandes</h5>
                    <!-- Table avec les commandes -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Agent</th>
                                <th scope="col">Client</th>
                                <th scope="col">Voiture</th>
                                <th scope="col">Date</th>
                                <th scope="col">Action</th>
                                <th scope="col">Commande</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Boucle pour afficher les commandes -->
                            @foreach($commandes as $commande)
                            <tr>
                                <th scope="row">{{ $commande->id }}</th>
                                <td>{{ $commande->agent->name }}</td>
                                <td>{{ $commande->client->nom }} {{ $commande->client->prenom }}</td>
                                <td>{{ $commande->voiture->marque }} {{ $commande->voiture->modele }}</td>
                                <td>{{ $commande->created_at }}</td>
                                <td>
                                    <a href="{{ route('agentpages.commandes.show', $commande) }}" class="btn btn-primary btn-sm">Détails</a>
                                </td>
                                <td>
                                    <a href="{{ route('agentpages.commandes.pdf', ['id' => $commande->id]) }}" target="_blank">Télécharger PDF</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- Fin de la table des commandes -->
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
