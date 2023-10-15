<x-guest-layout>
    <h2 class="mt-5">Inscription</h2>
    <div class="col-12 col-md-6 col-lg-4 mx-auto border border-white p-4 boite-blurry mt-5">
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Nom</label>
                <input type="text" class="form-control" id="name" name="name" :value="old('name')" required autofocus autocomplete="name">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" :value="old('email')" required autocomplete="username">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" id="password" name="password" required autocomplete="new-password">
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirmer le mot de passe</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required autocomplete="new-password">
            </div>

            <div class="mb-3 d-flex justify-content-between align-items-center">
                <a href="{{ route('login') }}" class="text-decoration-none">
                    Déjà inscrit ?
                </a>
                <button type="submit" class="btn btn-primary">
                    Inscription
                </button>
            </div>
        </form>
    </div>

</x-guest-layout>
