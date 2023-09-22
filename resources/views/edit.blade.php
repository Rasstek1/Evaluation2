@extends('layout')
@section('content')
    <h1 class="mt-5">Modifier le profil</h1>
    <div class="col-12 col-md-6 col-lg-4 mx-auto border border-white p-4 boite-blurry mt-5">

    <form method="post" action="/profils/{{ $profil->id }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <!-- Les champs du formulaire -->
            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" class="form-control" name="nom" id="nom" value="{{ $profil->nom }}" required>
            </div>

            <div class="mb-3">
                <label for="prenom" class="form-label">Prénom</label>
                <input type="text" class="form-control" name="prenom" id="prenom" value="{{ $profil->prenom }}" required>
            </div>

            <div class="mb-3">
                <label for="sexe" class="form-label">Sexe</label>
                <select name="sexe" id="sexe" class="form-select" required>
                    <option value="homme" {{ $profil->sexe == 'homme' ? 'selected' : '' }}>Homme</option>
                    <option value="femme" {{ $profil->sexe == 'femme' ? 'selected' : '' }}>Femme</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="date_naissance" class="form-label">Date de naissance</label>
                <input type="date" class="form-control" name="date_naissance" id="date_naissance" value="{{ $profil->date_naissance }}" required>
            </div>

            <div class="mb-3">
                <label for="photo" class="form-label">Photo</label>
                <input type="file" class="form-control" name="photo" id="photo">
            </div>

            <!-- Le bouton de validation du formulaire -->
            <button type="submit" class="btn btn-primary">Modifier le profil</button>
        </form>
        <!-- Formulaire pour la suppression du profil -->
        <form method="post" action="/profils/{{ $profil->id }}" style="display:inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Supprimer le profil</button>
        </form>
    </div>
@endsection

