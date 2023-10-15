<section class="mb-5 d-flex flex-column align-items-center">
    <header class="text-center mb-4">
        <h2 class="text-lg font-weight-medium">
            {{ __('Delete Account') }}
        </h2>

        <p class="text-sm text-white">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <!-- Bouton de suppression -->
    <button type="button" class="btn btn-danger mb-3 px-4 py-2" data-bs-toggle="modal" data-bs-target="#confirmUserDeletionModal">
        {{ __('Delete Account') }}
    </button>

    <!-- Modal de confirmation -->
    <div class="modal fade" id="confirmUserDeletionModal" tabindex="-1" aria-labelledby="confirmUserDeletionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" action="{{ route('profile.destroy') }}" class="p-4">
                    @csrf
                    @method('delete')

                    <h2 class="text-lg font-weight-medium text-dark text-center mb-3">
                        {{ __('Are you sure you want to delete your account?') }}
                    </h2>

                    <p class="text-sm text-dark text-center mb-4">
                        {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                    </p>

                    <div class="mb-4 d-flex flex-column align-items-center">
                        <label for="password" class="form-label sr-only">{{ __('Password') }}</label>
                        <input type="password" id="password" name="password" class="form-control w-50" placeholder="{{ __('Password') }}" required>
                        @error('userDeletion.password')
                        <div class="alert alert-danger mt-2 w-50">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-center mt-3">
                        <button type="button" class="btn btn-secondary me-3 px-4 py-2" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                        <button type="submit" class="btn btn-danger px-4 py-2">{{ __('Delete Account') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
