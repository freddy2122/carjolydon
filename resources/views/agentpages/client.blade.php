@extends('layouts.agent-index')

@section('content')


<div class="pagetitle">
    <h1>General Tables</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item">Commandes</li>
        <li class="breadcrumb-item active">Client</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-5">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Ajout de clients</h5>

            <!-- Form client -->
          <form action="{{ route('clients.store') }}" method="POST">
            @csrf
          <div class="row mb-3">
            <label for="inputText" class="col-sm-5 col-form-label">Nom</label>
            <div class="col-sm-6">
              <input type="text" name="nom" class="form-control">
            </div>
          </div>

          <div class="row mb-3">
            <label for="inputText" class="col-sm-5 col-form-label">Prenom</label>
            <div class="col-sm-6">
              <input type="text" name="prenom" class="form-control">
            </div>
          </div>

          <div class="row mb-3">
            <label for="inputText" class="col-sm-5 col-form-label">Adresse</label>
            <div class="col-sm-6">
              <input type="text" name="adresse" class="form-control">
            </div>
          </div>

          <div class="row mb-3">
            <label for="telephone" class="col-sm-5 col-form-label">Téléphone</label>
            <div class="col-sm-6">
              <input type="text" name="telephone" class="form-control" required>
            </div>
          </div>



          <div class="row mb-3">

            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary">Enregistrer</button>

            </div>
          </div>

        </form><!-- End Form Client -->
          </div>
        </div>


      </div>

      <div class="col-lg-7">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Listes des clients</h5>

            <!-- Table client -->
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nom</th>
                  <th scope="col">Prenom</th>
                  <th scope="col">Adresse</th>
                  <th scope="col">Téléphone</th>
                  <th scope="col">Date</th>

                </tr>
              </thead>
              <tbody>
                @foreach($client as $clients)
                <tr>
                  <th scope="row">{{$clients->id}}</th>
                  <td>{{$clients->nom}}</td>
                  <td>{{$clients->prenom}}</td>
                  <td>{{$clients->adresse}}</td>
                  <td>{{$clients->telephone}}</td>
                  <td>{{$clients->created_at}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <!-- End Table client -->

          </div>
        </div>



      </div>
    </div>
  </section>



@endsection
