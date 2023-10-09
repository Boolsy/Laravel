@extends('layouts.app')

@section('title', 'Profil de ' . $user->name)

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Profil') }}</div>

                    <div class="card-body">
                        <script>
                            document.addEventListener("DOMContentLoaded", function() {
                                @if(session('success'))
                                Swal.fire('Succès', '{{ session('success') }}', 'success');
                                @endif
                            });
                        </script>


                    @if(session('status'))
                            <script>
                                Swal.fire('Bienvenue', '{{ session('status') }}', 'success');
                            </script>
                        @endif

                        <p>Nom : {{ $user->name }}</p>
                        <p>Adresse mail : {{ $user->email }}</p>
                        <p>Créé le : {{ $user->created_at->format('d-m-Y H\hi') }}</p>
                        <p>Mis à jour le : {{ date('d-m-Y H\hi', strtotime($user->lastlogin)) }}</p>
                        <p>Rôle : {{ ucfirst($user->role) }}</p>
                        <a href="{{ route('profile.edit') }}" class="btn btn-primary">Éditer</a>
                        <a href="{{ route('profile.export') }}" class="btn btn-primary">Export JSON</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
