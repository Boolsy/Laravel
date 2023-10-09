@extends('layouts.app')

@section('title', 'Error 403')

@section('content')
    <body class="background">
    <div class="scene">
        <div class="overlay"></div>
        <div class="overlay"></div>
        <div class="overlay"></div>
        <div class="overlay"></div>
        <span class="bg-403">403</span>
        <div class="text">
            <span class="hero-text"></span>
            <span class="msg">Ici, même les <span>licornes</span> ne passent pas !</span>
            <span class="support">
      <a href="/">Retour à l'accueil</a>
    </span>
        </div>
        <div class="lock"></div>
    </div>
    </body>
@endsection
