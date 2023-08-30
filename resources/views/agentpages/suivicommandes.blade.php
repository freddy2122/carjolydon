@extends('layouts.agent-index')

@section('content')
    <div class="pagetitle">
        <h1>Suivi des Commandes</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item">Suivi des Commandes</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Suivi des Commandes</h5>
                        <!-- Tableau avec le suivi des commandes -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Client</th>
                                    <th scope="col">Voiture</th>
                                    <th scope="col">Statut</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Boucle pour afficher le suivi des commandes -->
                                @foreach($commandes as $commande)
                                    <tr>
                                        <th scope="row">{{ $commande->id }}</th>
                                        <td>{{ $commande->client->nom }} {{ $commande->client->prenom }}</td>
                                        <td>{{ $commande->voiture->marque }} {{ $commande->voiture->modele }}</td>
                                        <td>
                                            <form action="{{ route('agentpages.commandes.updateStatus', $commande->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <select class="form-select" name="statut" onchange="this.form.submit()">
                                                    <option value="en_attente" {{ $commande->statut === 'en_attente' ? 'selected' : '' }}>En Attente</option>
                                                    <option value="livree" {{ $commande->statut === 'livree' ? 'selected' : '' }}>Livrée</option>
                                                </select>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- Fin du tableau de suivi des commandes -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
