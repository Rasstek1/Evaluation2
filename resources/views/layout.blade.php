
<!--Layout du site-->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>TheModelFactory</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.0/dist/css/select2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">




    <style>
        .boite-blurry {
            backdrop-filter: blur(10px);
            border: 1px solid white;
        }
    </style>
</head>

<body>
<!--<div class="video-background">
    <video playsinline autoplay muted loop>
        <source src="{{ asset('video/yellow.mp4') }}" type="video/mp4">
    </video>
</div>
<div class="img-background">

        <img src="{{ asset('img/background') }}" type="img" alt="img-back">

</div>-->

<header>

    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('img/Logo2.png') }}" alt="Logo" class="logo-img" style="height: 150px; width: auto;"/>
            </a>
            <h2>Modeling<span style="color: #4261e8;">Agency</span></h2>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto pe-5">
                    <!-- Liens que tout le monde peut visiter en tout temps -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/profils') }}">Models</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/contact') }}">Nous contacter</a>
                    </li>

                    <!-- Liens pour la connexion et l'inscription avec Breeze -->
                    @if (Route::has('login'))
                        @auth
                            <!-- Liens que seuls les utilisateurs connectés peuvent voir -->
                            @if(!auth()->user()->profil)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/profils/create') }}">Joindre l'agence</a>
                                </li>
                            @endif


                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/profils/edit') }}">Modifier profil</a>
                            </li>


                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="{{ url('/dashboard') }}">Tableau de bord</a></li>
                                    <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}" class="d-inline" style="width: 100%; display: block;">
                                            @csrf
                                            <button type="submit" class="btn btn-link nav-link" style="color: black; width: 100%; display: block; text-align: left; padding: 10px 15px; transition: background-color 0.3s;" onmouseover="this.style.backgroundColor='#d4d4d4';" onmouseout="this.style.backgroundColor='transparent';">Déconnexion</button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @else
                            <!-- Liens pour les utilisateurs non authentifiés -->
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Connexion</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Inscription</a>
                                </li>
                            @endif
                        @endauth
                    @endif
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
        <p class="footer-text mb-0 pe-3">© 2023 TheModelFactory.com</p>
        <button id="audioControl" class="play-btn btn btn-warning ps-3">
            Play/Pause
        </button>
    </div>
    <audio id="audioElement" loop style="display:none;">
        <source src="{{ asset('audio/slow.mp3') }}" type="audio/mpeg">
    </audio>
</footer>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.0/dist/js/select2.min.js"></script>
<script src="{{ asset('js/script.js') }}"></script>

</body>
</html>
