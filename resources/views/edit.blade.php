@extends('layout')
@section('content')

    <!--Page de modification de profil-->
    <h2 class="mt-5 text-center">Modifier le profil</h2>
    <div class="col-12 col-md-6 col-lg-4 mx-auto border border-white p-4 boite-blurry mt-5">

        <form method="post" action="/profils" enctype="multipart/form-data">

        @csrf
            @method('PATCH')
            <!-- Les champs du formulaire -->
            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" value="{{ auth()->user()->name }}" required readonly>
            </div>

            <div class="mb-3">
                <label for="prenom" class="form-label">Prénom</label>
                <input type="text" class="form-control" id="prenom" name="prenom" value="{{ auth()->user()->firstname }}" required readonly>
            </div>


            <div class="mb-3">
                <label for="pays" class="form-label">Pays</label>
                <select name="pays" id="pays" class="form-control" required>
                    <option value="Canada">Canada</option>
                    <option value="France">France</option>
                    <option value="États-Unis">États-Unis</option>
                    <option value="Mexique">Mexique</option>
                    <option value="Brésil">Brésil</option>
                    <option value="Argentine">Argentine</option>
                    <option value="Chine">Chine</option>
                    <option value="Japon">Japon</option>
                    <option value="Corée du Sud">Corée du Sud</option>
                    <option value="Inde">Inde</option>
                    <option value="Russie">Russie</option>
                </select>
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
                <input type="date" class="form-control" name="date_naissance" id="date_naissance"
                       value="{{ $profil->date_naissance }}" required>
            </div>

            <div class="mb-3">
                <label for="photo" class="form-label">Photo</label>
                <input type="file" class="form-control" name="photoPath" id="photo">
            </div>

            <!-- Le bouton de validation du formulaire -->
            <div class="text-center mb-3"> <!-- Ajouté pour centrer les boutons -->
                <button type="submit" class="btn btn-primary">Modifier le profil</button>
            </div>
        </form>

        <form method="post" action="{{ route('profils.destroy', $profil->id) }}" class="text-center"> <!-- Ajouté pour centrer les boutons -->
            @csrf
            @method('DELETE')
            <input type="hidden" name="profil_id" value="{{ $profil->id }}">

            <button type="submit" class="btn btn-danger mt-3" onclick="return confirm('Êtes-vous sûr de vouloir supprimer votre profil? Cette action est irréversible.');">Supprimer le profil</button>
        </form>

    </div>
    @endsection





<script>
    $(document).ready(function() {
        $('#pays').select2();
    });
</script>


