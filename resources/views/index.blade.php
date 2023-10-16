@extends('layout')

@section('content')

<!--Page de profils ou on affiche tout les profils-->
    <div class="container mt-5">
        <h2 class="my-4">Models</h2>
        <div class="row row-cols-1 row-cols-md-3 g-4">

            @if(count($profils) > 0)
                @foreach ($profils as $profil)
                    <div class="col">
                        <div class="boite-blurry d-flex flex-column align-items-center" style="border: rgb(128,128,128) 1px solid;"> <!-- Modifications ici -->

                            <!-- Photo de profil -->
                            <div class="p-3">
                                <img src="{{ asset($profil->photoPath) }}" alt="Photo de profil" class="img-profil"/>
                            </div>

                            <!-- Informations du profil -->
                            <div class="card-body text-center"> <!-- Ajout de text-center pour centrer le texte -->
                                <h4 class="card-title">{{ $profil->prenom }} {{ $profil->nom }}</h4>
                                <p class="card-text">
                                    <!--   <strong>Id :</strong> {{ $profil->id }} <br>   j'ai commenté le ID-->
                                    <strong>Pays :</strong> {{ $profil->pays }} <br>
                                    <strong>Sexe :</strong> {{ $profil->sexe }} <br>
                                    <strong>Date de naissance :</strong> {{ $profil->date_naissance }}
                                </p>
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
    </div>

@endsection





