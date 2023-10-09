@extends('layouts.app')

@section('title', 'Error 404')

@section('content')
    <section class="page_404">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 ">
                    <div class="col-sm-10 col-sm-offset-1  text-center">
                        <div class="four_zero_four_bg">
                            <h1 class="text-center ">404</h1>


                        </div>

                        <div class="contant_box_404">
                            <p class="h2">
                                On dirait que tu es perdu

                              <br>
                            La page que vous recherchez n'est pas disponible !</p>

                            <a href="/" class="link_404">Retour à l'accueil</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
