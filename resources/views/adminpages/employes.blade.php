@extends('layouts.admin-index')

@section('content')
    <div class="container">
        <div class="col-lg-12">
            
            <div class="row">
                <!-- FORM Panel -->
                <h1>Employés</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item">Gestion des employés</li>
                        <li class="breadcrumb-item active">Employés</li>
                    </ol>
                </nav>
                <!-- Table Panel -->
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <b>Liste des employés</b>
                            <span class="float:right"><!-- Button trigger modal -->

                                {{--   <a href="" class="btn btn-primary float-end"
                                  >
                                    Ajouter un employé
                            </a> --}}

                                <!-- Modal -->
                            </span>
                        </div>
                        <div class="card-body">
                            <table class="table table-condensed table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nom & Prénom</th>
                                        <th scope="col">Adresse email</th>
                                        <th scope="col">Rôle</th>
                                        <th scope="col">Attribué rôle</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <th scope="row">{{ $user->id }}</th>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->role }}</td>
                                            <td>
                                                <form method="post"
                                                    action="{{ route('admin.users.updateRole', ['user' => $user->id]) }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <select name="role" class="form-select">
                                                        @foreach (['ADMIN', 'PERSONEL', 'AGENT', 'MECANICIEN', 'COMMERCIAL'] as $role)
                                                            <option value="{{ $role }}"
                                                                {{ $user->role === $role ? 'selected' : '' }}>
                                                                {{ $role }}</option>
                                                        @endforeach
                                                    </select><br>
                                                    <button class="btn btn-primary" type="submit"><i
                                                            class="bi bi-check"></i></button>
                                                </form>
                                            </td>
                                            <td class="text-center">


                                                <a href="{{route('employes.destroy',$user->id)}}" class="btn btn-sm btn-danger delete_car"><i
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
