<x-guest-layout>
    <h2 class="mt-5 text-center">Connexion</h2>
    <div class="col-12 col-md-6 col-lg-4 mx-auto border border-white p-4 boite-blurry mt-5">
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="mb-3">
                <label for="email" class="form-label">{{ __('Email') }}</label>
                <input type="email" class="form-control" id="email" name="email" :value="old('email')" required autofocus autocomplete="username">
                @error('email')
                <span class="text-danger mt-2">{{ $message }}</span>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label for="password" class="form-label">{{ __('Password') }}</label>
                <input type="password" class="form-control" id="password" name="password" required autocomplete="current-password">
                @error('password')
                <span class="text-danger mt-2">{{ $message }}</span>
                @enderror
            </div>

            <!-- Remember Me -->
            <div class="mb-3">
                <input id="remember_me" type="checkbox" name="remember" class="form-check-input">
                <label for="remember_me" class="form-check-label">{{ __('Remember me') }}</label>
            </div>

            <div class="mb-3 d-flex justify-content-between align-items-center">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-decoration-none">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
                <button type="submit" class="btn btn-primary">
                    {{ __('Log in') }}
                </button>
            </div>
        </form>
    </div>
</x-guest-layout>
