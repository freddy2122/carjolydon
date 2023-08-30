@extends('layouts.agent-index')

@section('content')
<div class="pagetitle">
    <h1>Rendez-vous</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/agentpages/rendezVous">Rendez-vous</a></li>
            <li class="breadcrumb-item active">Nouveau Rendez-vous</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-4">
            <!-- Formulaire de création -->
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Nouveau Rendez-vous</h5>
                    <form action="{{ route('agentpages.rendezvous') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="client_nom" class="form-label">Nom du Client</label>
                            <input type="text" class="form-control" id="client_nom" name="client_nom" required>
                        </div>
                        <div class="mb-3">
                            <label for="client_prenom" class="form-label">Prénom du Client</label>
                            <input type="text" class="form-control" id="client_prenom" name="client_prenom" required>
                        </div>
                        <div class="mb-3">
                            <label for="date" class="form-label">Date du Rendez-vous</label>
                            <input type="date" class="form-control" id="date" name="date" required>
                        </div>
                        <div class="mb-3">
                            <label for="lieu" class="form-label">Lieu du Rendez-vous</label>
                            <input type="text" class="form-control" id="lieu" name="lieu" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <!-- Tableau des rendez-vous enregistrés -->
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Rendez-vous Enregistrés</h5>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nom du Client</th>
                                <th>Prénom du Client</th>
                                <th>Date du Rendez-vous</th>
                                <th>Lieu du Rendez-vous</th>
                                <th>Agents</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($rendezvous as $rdv)
                            <tr>
                                <td>{{ $rdv->client_nom }}</td>
                                <td>{{ $rdv->client_prenom }}</td>
                                <td>{{ $rdv->date }}</td>
                                <td>{{ $rdv->lieu }}</td>
                                <td>{{ $rdv->agent->name }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>








    </div>
</section>
@endsection
