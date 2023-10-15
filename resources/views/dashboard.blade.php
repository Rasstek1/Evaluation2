<!--Page quand on est connecté-->

<x-app-layout>
    <x-slot name="header">
        <div class="container mt-5">
            <h2 class="text-center mb-5">{{ __('Dashboard') }}</h2>
        </div>
    </x-slot>

    <div class="col-12 col-md-5 col-lg-5 mx-auto border border-white p-2 boite-blurry">
        <div class="text-center">
            <h5 class="mb-1">{{ __("You're logged in!") }}</h5>
        </div>
    </div>

</x-app-layout>
