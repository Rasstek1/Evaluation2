<section class="mb-5 d-flex flex-column align-items-center">
    <header class="text-center mb-4">
        <h2 class="text-lg font-weight-medium">
            {{ __('Update Password') }}
        </h2>

        <p class="text-sm text-white">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mb-4 d-flex flex-column align-items-center">
        @csrf
        @method('put')

        <div class="mb-3 d-flex flex-column align-items-center">
            <label for="current_password" class="form-label text-white">{{ __('Current Password') }}</label>
            <input type="password" id="current_password" name="current_password" class="form-control w-75" autocomplete="current-password" required>
            @error('updatePassword.current_password')
            <div class="alert alert-danger mt-2 w-75">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3 d-flex flex-column align-items-center">
            <label for="password" class="form-label text-white">{{ __('New Password') }}</label>
            <input type="password" id="password" name="password" class="form-control w-75" autocomplete="new-password" required>
            @error('updatePassword.password')
            <div class="alert alert-danger mt-2 w-75">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3 d-flex flex-column align-items-center">
            <label for="password_confirmation" class="form-label text-white">{{ __('Confirm Password') }}</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control w-75" autocomplete="new-password" required>
            @error('updatePassword.password_confirmation')
            <div class="alert alert-danger mt-2 w-75">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex justify-content-center mt-3">
            <button type="submit" class="btn btn-primary px-4 py-2">{{ __('Save') }}</button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-muted text-center mt-2"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
