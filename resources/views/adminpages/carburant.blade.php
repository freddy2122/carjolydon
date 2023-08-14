@extends('layouts.admin-index')

@section('content')

<div class="pagetitle">
    <h1>Carburant</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Gestion des véhicules</li>
        <li class="breadcrumb-item active">carburant</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-6">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Nouveau type de carburant</h5>

            <!-- General Form Elements -->
            <form action="{{ route('carburant_store') }}" method="POST">
                @csrf
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Nom</label>
                <div class="col-sm-10">
                  <input type="text" name="name" class="form-control">
                </div>
              </div>


              <div class="row mb-3">

                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Enregistrer</button>

                </div>
              </div>

            </form><!-- End General Form Elements -->

          </div>
        </div>

      </div>

      <div class="col-lg-6">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Types de carburant</h5>

            <!-- Advanced Form Elements -->
            <!-- Table Panel -->
            <table class="table table-bordered border-primary">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nom</th>
                </tr>
              </thead>
              <tbody>
                @foreach($carburant as $carbu)
                <tr>
                  <th scope="row">{{$carbu->id}}</th>
                  <td>{{$carbu->name}}</td>
                </tr>
                @endforeach
              </tbody>
            </table><!-- End General Form Elements -->

          </div>
        </div>

      </div>
    </div>
  </section>


@endsection
