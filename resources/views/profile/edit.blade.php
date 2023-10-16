@extends('layout')

@section('content')
    <h2 class="mt-5">{{ __('Profile') }}</h2>

    <div>
        <div class="row">

            <!-- Mise à jour des informations du profil -->
            <div class="col-md-4 my-4 px-3 mx-auto">
                @include('profile.partials.update-profile-information-form')
            </div>

            <!-- Mise à jour du mot de passe -->
            <div class="col-md-4 my-4 px-3 mx-auto">
                @include('profile.partials.update-password-form')
            </div>

            <!-- Suppression du compte -->
            <div class="col-md-4 my-4 px-3 mx-auto">
                @include('profile.partials.delete-user-form')
            </div>

        </div>
    </div>
@endsection

