@extends('layout')
@section('content')

    <!--Page De creation de profil-->
    <h2 class="mt-5 text-center">Créer le profil</h2>
    <div class="col-12 col-md-6 col-lg-4 mx-auto border border-white p-4 boite-blurry mt-5">
        <form method="post" action="/profils" enctype="multipart/form-data">
            @csrf

            <!-- Les champs du formulaire avec les noms pour designer les attribut -->
            <div class="mb-3">
                <label for="name" class="form-label">Nom</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ auth()->user()->name }}" required readonly>
            </div>

            <div class="mb-3">
                <label for="firstname" class="form-label">Prénom</label>
                <input type="text" class="form-control" id="firstname" name="firstname" value="{{ auth()->user()->firstname }}" required readonly>
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
                    <option value="homme">Homme</option>
                    <option value="femme">Femme</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="date_naissance" class="form-label">Date de naissance</label>
                <input type="date" class="form-control" name="date_naissance" id="date_naissance" required>
            </div>

            <div class="mb-3">
                <label for="photo" class="form-label">Photo</label>
                <input type="file" class="form-control" name="photoPath" id="photo">
            </div>

            <!-- Le bouton de validation du formulaire -->
            <button type="submit" class="btn btn-primary">Creer le profil</button>
        </form>

    </div>
@endsection


<!--Script pour le select2-->
<script>
    $(document).ready(function () {
        $('#pays').select2();
    });
</script>









