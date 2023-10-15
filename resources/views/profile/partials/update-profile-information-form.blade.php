<section class="mb-5 d-flex flex-column align-items-center">
    <header class="text-center mb-4">
        <h2 class="text-lg font-weight-medium">
            {{ __('Profile Information') }}
        </h2>

        <p class="text-sm text-white">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}" class="mb-4">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mb-4 d-flex flex-column align-items-center">
        @csrf
        @method('patch')

        <div class="mb-3 d-flex flex-column align-items-center">
            <label for="name" class="form-label text-white">{{ __('Name') }}</label>
            <input type="text" id="name" name="name" class="form-control w-75" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
            @error('name')
            <div class="alert alert-danger mt-2 w-75">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3 d-flex flex-column align-items-center">
            <label for="email" class="form-label text-white">{{ __('Email') }}</label>
            <input type="email" id="email" name="email" class="form-control w-75" value="{{ old('email', $user->email) }}" required autocomplete="username">
            @error('email')
            <div class="alert alert-danger mt-2 w-75">{{ $message }}</div>
            @enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-white">
                        {{ __('Your email address is unverified.') }}
                        <button form="send-verification" class="underline text-sm text-white hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>
                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="d-flex justify-content-center mt-3">
            <button type="submit" class="btn btn-primary px-4 py-2">{{ __('Save') }}</button>
            @if (session('status') === 'profile-updated')
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
