
<!--Layout du site-->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>TheProfileFactory</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Select2 CSS & JS (même version pour les deux) -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.0/dist/css/select2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.0/dist/js/select2.min.js"></script>

    <!-- Liens CSS et JS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="{{ asset('js/script.js') }}"></script>

    <style>
        .boite-blurry {
            backdrop-filter: blur(10px);
            border: 1px solid white;
        }
    </style>
</head>

<body>
<div class="video-background">
    <video playsinline autoplay muted loop>
        <source src="{{ asset('video/yellow.mp4') }}" type="video/mp4">
    </video>
</div>

<header>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('img/Logo.png') }}" alt="Logo" class="logo-img"/>
            </a>
            <h2>TheProfile<span style="color: #3d73fc;">Factory</span></h2>



            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto pe-5">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/profils/create') }}">Ajouter évaluation</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/profils') }}">Liste évaluations</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/contact') }}">Nous contacter</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<main class="content">
    <div class="container">
        @yield('content')
    </div>
</main>

<footer class="text-center ">
    <div class="d-flex justify-content-between align-items-center">
        <p class="footer-text mb-0 pe-3">© 2023 TheProfileFactory.com</p>
        <button id="audioControl" class="play-btn btn btn-warning ps-3">
            Play/Pause
        </button>
    </div>
    <audio id="audioElement" loop style="display:none;">
        <source src="{{ asset('audio/slow.mp3') }}" type="audio/mpeg">
    </audio>
</footer>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
