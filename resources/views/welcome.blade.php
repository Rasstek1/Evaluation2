@extends('layout')

<!--Page d'accueil-->
@section('title', 'Accueil')

@section('content')
    <div class="model-section">
        <div class="model-container">
            <img src="{{ asset('img/img-accueil1.webp') }}" alt="Modèle" class="model-img">
            <div class="model-text">
                <h2 style="color:#ffffff;">Trouver du travail en tant que modèle</h2>
                <p style="color:#ffffff;">Emplois de mannequins pour débutants et mannequins professionnels.</p>
                <a href="#" class="btn">Pour mannequins et talents</a>
            </div>
        </div>

        <div class="model-container">
            <img src="{{ asset('img/img-accueil2.jpg') }}" alt="Modèle" class="model-img">
            <div class="model-text">
                <h2 style="color:#ffffff;">Trouver des mannequins et talents</h2>
                <p style="color:#ffffff;">Sources de mannequins, des talents et influenceurs pour tous types de projets.</p>
                <a href="#" class="btn">Pour les professionnels</a>
            </div>
        </div>
    </div>

    <div class="talent-section" style="margin-top: 30px;">
        <h1 class="talent-title">Plus que des modèles</h1>
        <p class="talent-description row">La plateforme de mannequinat du monde, où divers talents de tous niveaux peuvent se connecter et collaborer avec des professionnels en toute sécurité.</p>
        <div class="talent-container">
            <div class="talent-card col-lg-2 col-12">
                <img src="{{ asset('img/img-accueil3.webp') }}" alt="Image description">
                <h3>Je suis un nouveau venu</h3>
                <a href="#">Dites-moi en plus</a>
            </div>
            <div class="talent-card col-lg-2 col-12">
                <img src="{{ asset('img/img-accueil4.webp') }}" alt="Image description">
                <h3>Je suis un nouveau venu</h3>
                <a href="#">Dites-moi en plus</a>
            </div>
            <div class="talent-card col-lg-2 col-12">
                <img src="{{ asset('img/img-accueil5.webp') }}" alt="Image description">
                <h3>Je suis un nouveau venu</h3>
                <a href="#">Dites-moi en plus</a>
            </div>
            <div class="talent-card col-lg-2 col-12">
                <img src="{{ asset('img/img-accueil6.webp') }}" alt="Image description">
                <h3>Je suis un nouveau venu</h3>
                <a href="#">Dites-moi en plus</a>
            </div>
            <div class="talent-card col-lg-2 col-12">
                <img src="{{ asset('img/img-accueil7.webp') }}" alt="Image description">
                <h3>Je suis un nouveau venu</h3>
                <a href="#">Dites-moi en plus</a>
            </div>
            <div class="talent-card col-lg-2 col-12">
                <img src="{{ asset('img/img-accueil8.webp') }}" alt="Image description">
                <h3>Je suis un nouveau venu</h3>
                <a href="#">Dites-moi en plus</a>
            </div>
            <!-- Répétez le bloc ci-dessus pour les autres cartes -->
        </div>
        <button class="btn-talent-function">Comment ça fonctionne</button>
    </div>

@endsection

