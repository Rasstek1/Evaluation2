
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Votre Projet Laravel</title>
    <!-- Liens vers vos fichiers CSS, scripts ou autres ressources -->
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="/profils">Liste des profils</a></li>
                <li><a href="/profils/create">Ajouter un profil</a></li>

            </ul>
        </nav>
    </header>

    <main>
        <div class="container">
            @yield('content')
        </div>
    </main>

    <footer>
        <p>© 2023 Votre entreprise. Tous droits réservés.</p>
    </footer>

    <!-- Liens vers vos scripts JavaScript -->
</body>
</html>
