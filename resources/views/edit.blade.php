

@extends('layout')
@section('content')
    <h1>Modifier le profil</h1>
    <form method="post" action="/profils/{{ $profil->id }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <!-- Les champs du formulaire -->
        <label for="nom">Nom :</label>
        <input type="text" name="nom" value="{{ $profil->nom }}" required>

        <label for="prenom">Prénom :</label>
        <input type="text" name="prenom" value="{{ $profil->prenom }}" required>

        <label for="sexe">Sexe :</label>
        <select name="sexe" id="sexe" required>
            <option value="homme" {{ $profil->sexe == 'homme' ? 'selected' : '' }}>Homme</option>
            <option value="femme" {{ $profil->sexe == 'femme' ? 'selected' : '' }}>Femme</option>
        </select>

        <label for="date_naissance">Date de naissance :</label>
        <input type="date" name="date_naissance" value="{{ $profil->date_naissance }}" required>

        <label for="photo">Photo :</label>
        <input type="file" name="photo" id="photo">

        <!-- Le bouton de validation du formulaire -->
        <button type="submit">Modifier le profil</button>
    </form>
    <!-- Formulaire pour la suppression du profil -->
    <form method="post" action="/profils/{{ $profil->id }}">
        @csrf
        @method('DELETE')
        <button type="submit">Supprimer le profil</button>
    </form>



