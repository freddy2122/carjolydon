@extends('layouts.agent-index')

@section('content')

<div class="pagetitle">
    <h1>Commandes</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item">Commandes</li>
            <li class="breadcrumb-item active">Commandes</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-4">
            <div class="card mb-3" style="max-width: 18rem;">
                <div class="card-header">Ajout</div>
                <div class="card-body">
                    <h5 class="card-title">Commandes</h5>
                    <form action="{{ route('agentpages.commandes.store') }}" method="POST" class="bg-transparent">
                        @csrf

                        <div class="mb-3">
                            <label for="agent_id" class="form-label">Agents</label>
                            <select class="form-select" name="agent_id" aria-label="Agent select">
                                <option selected>Choisissez un agent</option>
                                @foreach($agents as $agent)
                                <option value="{{ $agent->id }}">{{ $agent->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="client_id" class="form-label">Clients</label>
                            <select class="form-select" name="client_id" aria-label="Client select">
                                <option selected>Choisissez un client</option>
                                @foreach($clients as $client)
                                <option value="{{ $client->id }}">{{ $client->nom }} {{ $client->prenom }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="voiture_id" class="form-label">Voitures</label>
                            <select class="form-select" name="voiture_id" aria-label="Voiture select">
                                <option selected>Choisissez une voiture</option>
                                @foreach($voitures as $voiture)
                                <option value="{{ $voiture->id }}">{{ $voiture->marque }} {{ $voiture->modele }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary btn-sm">Ajouter une commande</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Datatables</h5>
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
