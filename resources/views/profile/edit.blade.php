@extends('layouts.app')

@section('title', 'Mettre à jour le profil')

@push('scripts')
    <script src="{{ asset('js/SudoDelete.js') }}"></script>
@endpush

@section('content')
    <div class="container">
        <h1>Mettre à jour votre profil</h1>

        <form method="POST" action="{{ route('profile.update') }}" id="update-form">
            @csrf
            <?php // Le csrf sert à protéger votre formulaire des attaques CSRF (Cross-Site Request Forgery) ?>


            <div class="form-group">
                <label for="email">Adresse e-mail</label>
                <input type="email" name="email" id="email" value="{{ Auth::user()->email }}" class="form-control">
                @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password" class="form-control" autocomplete="off">
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirmation du mot de passe</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <br>


            <button type="submit" class="btn btn-primary" id="update-profile">Mettre à jour</button>
        </form>
    </div>
@endsection

