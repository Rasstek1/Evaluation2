@extends('layout')

@section('content')

    <div class="container mt-5">
        <h2 class="my-4">Liste des profils</h2>
        <div class="row row-cols-1 row-cols-md-3 g-4">

            @if(count($profils) > 0)
                @foreach ($profils as $profil)
                    <div class="col">
                        <div class="boite-blurry">
                            <img src="{{ asset($profil->photoPath) }}" alt="Photo de profil" class="img-profil" />
                            <div class="card-body">
                                <h4 class="card-title">{{ $profil->prenom }} {{ $profil->nom }}</h4>
                                <p class="card-text">
                                    <strong>Id :</strong> {{ $profil->id }} <br>
                                    <strong>Pays :</strong> {{ $profil->pays }} <br>
                                    <strong>Sexe :</strong> {{ $profil->sexe }} <br>
                                    <strong>Date de naissance :</strong> {{ $profil->date_naissance }}
                                </p>
                                <a href="/profils/{{ $profil->id }}/edit" class="btn btn-primary">Modifier</a>
                                <form action="/profils/{{ $profil->id }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <a href="#" data-id="{{ $profil->id }}" class="btn btn-danger delete-profil">Supprimer</a>

                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col">
                    <div class="boite-blurry">
                        <div class="card-body">
                            <p class="card-text text-center">Aucun profil disponible.</p>
                        </div>
                    </div>
                </div>
            @endif

        </div>
        <div class="my-4">
            <a href="/profils/create" class="btn btn-success">Ajouter un nouveau profil</a>
        </div>
    </div>

@endsection






