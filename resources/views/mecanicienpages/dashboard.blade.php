@extends('layouts.mecanicien-index')

@section('content')

<div class="pagetitle">
    <h1>Transmission</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-6">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">General Form Elements</h5>

            <!-- General Form Elements -->
            <form action="" method="POST">
                @csrf
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Nom</label>
                <div class="col-sm-10">
                  <input type="text" name="name" class="form-control">
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                  <input type="text" name="description" class="form-control">
                </div>
              </div>

              <div class="row mb-3">

                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Submit Form</button>

                </div>
              </div>

            </form><!-- End General Form Elements -->

          </div>
        </div>

      </div>

      <div class="col-lg-6">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Advanced Form Elements</h5>

            <!-- Advanced Form Elements -->
            <!-- Table Panel -->
            <table class="table table-bordered border-primary">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nom</th>
                  <th scope="col">Description</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>

                <tr>
                  <th scope="row"></th>
                  <td></td>
                  <td></td>
                  <td>
                    <a class="btn btn-primary" href=""><i class="bi bi-arrow-up-left-square"></i></a>
                    <a class="btn btn-danger" href=""><i class="bi bi-archive"></i></a>
                  </td>
                </tr>

              </tbody>
            </table><!-- End General Form Elements -->

          </div>
        </div>

      </div>
    </div>
  </section>

@endsection
