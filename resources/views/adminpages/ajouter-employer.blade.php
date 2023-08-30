@extends('layouts.admin-index')

@section('content')
    <div class="container">
        <h1>Ajouter un employé</h1>
        <form action="{{ route('employes.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Nom & Prénoms:</label>

                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">E-mail:</label>

                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Téléphone:</label>

                <input type="text" name="phone" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Télécharger une image</label>
                <input type="file" name="image" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Ajouter l'image</button>
        </form>
    </div>
@endsection
