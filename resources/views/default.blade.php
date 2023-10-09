@extends('layouts.app')

@section('title', 'Accueil')

@section('content')
    @if(session('message'))
        <script>
            Swal.fire('Déconnexion réussie', '{{ session('message') }}', 'success');
        </script>
    @endif


    <section class="container-fluid home text-center paralax" id="welcome-section">
        <div class="" id="homeH1">
            <h1>Examen<br>Framework</h1>
            <div class="homeSocial">
                <a href="https://github.com/boolsy" target="_blank" title="GitHub" id="profile-link">
                    <i class="fa fa-github" style="font-size:48px;color:white"></i>
                </a>
            </div>
        </div>
    </section>

@endsection
