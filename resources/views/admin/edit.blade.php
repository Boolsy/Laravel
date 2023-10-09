@extends('layouts.app')

@section('title', 'Mettre à jour le profil')

@section('content')
    <div class="container">
        <h1>Mettre à jour le profil</h1>

        <form method="POST" action="{{ route('admin.update', ['user' => $user]) }}">
            @csrf
            @method('POST')

            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="form-control" readonly>
            </div>

            <div class="form-group">
                <label for="email">Adresse e-mail</label>
                <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" class="form-control" readonly>
            </div>

            <div class="form-group">
                <label for="role">Rôle</label>
                <select name="role" id="role" class="form-control">
                    <option value="visiteur" {{ $user->role === 'visiteur' ? 'selected' : '' }}>Visiteur</option>
                    <option value="etudiant" {{ $user->role === 'etudiant' ? 'selected' : '' }}>Étudiant</option>
                    <option value="professeur" {{ $user->role === 'professeur' ? 'selected' : '' }}>Professeur</option>
                </select>
            </div>
            <br>

            <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </form>

    </div>
@endsection
