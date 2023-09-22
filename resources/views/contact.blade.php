@extends('layout')
@section('content')



<div class="container boite-blurry mt-5" style="max-width: 600px; border: 1px solid #dee2e6; border-radius: 0.25rem; box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15); padding: 2rem;">
    <h2 class="mb-4" style="text-align: center;">Contactez-nous</h2>

    <div style="margin-bottom: 2rem;">
        <p><strong>Adresse :</strong> 1188 Boulevard Java</p>
        <p><strong>Téléphone :</strong> 819-456-7890</p>
        <p><strong>Email :</strong> info@Evaluationparadise.com</p>
    </div>

    <form action="/envoyerEmail" method="POST">
        @csrf  <!-- N'oubliez pas ce jeton CSRF pour la sécurité -->
        <div class="mb-3">
            <label for="email" class="form-label">Votre Email</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Votre message</label>
            <textarea class="form-control" id="message" name="message"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
</div>
@endsection
