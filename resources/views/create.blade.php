

@extends('layout')
@section('content')
    <h1>Ajouter un nouveau profil</h1>

    <form method="post" action="/profils" enctype="multipart/form-data">
    @csrf
    <label for="nom">Nom :</label>
    <input type="text" name="nom" id="nom" required>

    <label for="prenom">Prénom :</label>
    <input type="text" name="prenom" id="prenom" required>

    <label for="sexe">Sexe :</label>
    <select name="sexe" id="sexe" required>
        <option value="homme">Homme</option>
        <option value="femme">Femme</option>
    </select>

    <label for="date_naissance">Date de naissance :</label>
    <input type="date" name="date_naissance" id="date_naissance" required>



    //photo
    <label for="photo">Photo :</label>
    <input type="file" name="photoPath" id="photo" required>



    <button type="submit">Ajouter le profil</button>
</form>
