@extends('layouts.admin-index')

@section('content')
    <div class="container">
        <div class="col-lg-12">
            <div class="row mb-4 mt-4">
                <div class="col-md-12">

                </div>
            </div>
            <div class="row">
                <!-- FORM Panel -->
                <h1>Voitures</h1>
                <nav>
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item">Gestion des véhicules</li>
                    <li class="breadcrumb-item active">Voitures</li>
                  </ol>
                </nav>
                <!-- Table Panel -->
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <b>List of Cars</b>
                            <span class="float:right"><!-- Button trigger modal -->
                                <a  href="/adminpages/ajouter-image" class="btn btn-primary ps-3 ">
                                    Prendre une image
                                </a>
                                <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    Ajouter
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">

                                                <form class="row g-3" method="POST" action="{{ route('voiture.store') }}">
                                                    @csrf
                                                    <div class="col">
                                                        <div class="col-md-12">
                                                            <label for="marque" class="form-label">Marque</label>
                                                            <input type="text" name="marque" class="form-control"
                                                                id="marque" required>
                                                        </div><br>

                                                        <div class="col-md-12">
                                                            <label for="annee" class="form-label">Année</label>
                                                            <input type="text" name="annee" class="form-control"
                                                                id="annee" required>
                                                        </div><br>

                                                        <div class="col-md-12">
                                                            <label for="modele" class="form-label">Modèle</label>
                                                            <input type="text" name="modele" class="form-control"
                                                                id="modele" required>
                                                        </div><br>

                                                        <div class="col-md-12">
                                                            <label for="carrosserie_id" class="form-label">Types de
                                                                carrosserie</label>
                                                            <select name="carrosserie_id" class="form-select"
                                                                id="carrosserie_id" required>
                                                                @foreach ($carrosserie as $carrosseries)
                                                                    <option value="{{ $carrosseries->id }}">
                                                                        {{ $carrosseries->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div><br>

                                                        <div class="col-md-12">
                                                            <label for="transmission_id" class="form-label">Types de
                                                                transmission</label>
                                                            <select name="transmission_id" class="form-select"
                                                                id="transmission_id" required>
                                                                @foreach ($transmission as $transmissions)
                                                                    <option value="{{ $transmissions->id }}">
                                                                        {{ $transmissions->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div><br>

                                                        <div class="col-md-12">
                                                            <label for="carburant_id" class="form-label">Types de
                                                                carburant</label>
                                                            <select name="carburant_id" class="form-select"
                                                                id="carburant_id" required>
                                                                @foreach ($carburant as $carburants)
                                                                    <option value="{{ $carburants->id }}">
                                                                        {{ $carburants->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div><br>

                                                        <div class="col-md-12">
                                                            <label for="" class="form-label">Prix</label>
                                                            <input type="text" name="prix" class="form-control"
                                                                id="" required>
                                                        </div><br>
                                                        <div class="col-md-12">
                                                            <label for="" class="form-label">Description</label>
                                                            <input type="text" name="description" class="form-control"
                                                                id="" required>
                                                        </div><br>

                                                        <div class="col-12">
                                                            <button type="submit"
                                                                class="btn btn-primary">Enregistrer</button>
                                                        </div>
                                                    </div>


                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </span>
                        </div>
                        <div class="card-body">
                            <table class="table table-condensed table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Marque</th>
                                        <th scope="col">Année</th>
                                        <th scope="col">Modèle</th>
                                        <th scope="col">Style de carrosserie</th>
                                        <th scope="col">Types de transmission</th>
                                        <th scope="col">Types de carburant</th>
                                        <th scope="col">Prix</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($voiture as $voit)
                                        <tr>
                                            <th scope="row">{{$voit->id}}</th>
                                            <td>{{$voit->marque}}</td>
                                            <td>{{$voit->annee}}</td>
                                            <td>{{$voit->modele}}</td>
                                            <td>{{$voit->carrosserie->name}}</td>
                                            <td>{{$voit->transmission->name}}</td>
                                            <td>{{$voit->carburant->name}}</td>
                                            <td>{{$voit->prix}}</td>
                                            <td class="text-center">
                                                <a href="{{ route('voiture.showDetails', $voit->id) }}" class="btn btn-sm btn-outline-primary view_car"><i
                                                        class="bi bi-eye"></i></a>
                                                <a href="{{ route('voiture.edit', $voit->id) }}" class="btn btn-sm btn-outline-secondary edit_car"><i
                                                        class="bi bi-pen"></i></a>
                                                <a href="{{ route('voitures.delete', $voit->id) }}" class="btn btn-sm btn-outline-danger delete_car"><i
                                                        class="bi bi-archive"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Table Panel -->
            </div>
        </div>

    </div>
@endsection
