@extends('layout')

@section('content')

    <div class="row">

        @if(count($profils) > 0)

            @foreach ($profils as $profil)

                <div class="col-md-4"> <!-- Erreur corrigée ici, enlèvement d'un "<" supplémentaire -->

                    <div class="card">

                        <img src="{{ asset($profil->photoPath) }}" class="card-img-top" alt="{{ $profil->nom }}">

                        <div class="card-body">

                            <h5 class="card-title">{{ $profil->nom }} {{ $profil->prenom }}</h5>

                            <p class="card-text">
                                Sexe: {{ $profil->sexe }}<br>
                                Date de naissance: {{ $profil->date_naissance }}
                            </p>

                            <a href="/profils/{{ $profil->id }}/edit" class="btn btn-primary">Modifier</a>

                            <form action="/profils/{{ $profil->id }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>

                        </div>

                    </div>

                </div>

            @endforeach

        @else

            <p>Aucun profil pour le moment.</p>

        @endif <!-- Il manque ce endif ici -->

    </div>




