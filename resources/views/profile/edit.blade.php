@extends('layout')

@section('content')
    <h2 class="mt-5">{{ __('Profile') }}</h2>

    <div class="col-12 col-md-6 col-lg-4 mx-auto border border-white p-4 boite-blurry mt-5">
        <!-- Mise à jour des informations du profil -->
        <div class="mb-5">

            <div class="mt-4">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <!-- Mise à jour du mot de passe -->
        <div class="mb-5">

            <div class="mt-4">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <!-- Suppression du compte -->
        <div class="mb-5">

            <div class="mt-4">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
@endsection

