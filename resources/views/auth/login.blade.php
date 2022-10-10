@extends('layout.app')

@section('extra-css')
    <!-- MATERIAL DESIGN ICONIC FONT -->
    <link rel="stylesheet"
        href="{{ asset('connexion/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css') }}">

    <!-- STYLE CSS -->
    <link rel="stylesheet" href="{{ asset('connexion/css/style.css') }}">
    {{-- <link href="{{ asset('assets/img/logoi.png') }}" rel="icon">
    <link href="{{ asset('assets/img/logoi.png') }}" rel="apple-touch-icon"> --}}
@endsection

@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs d-flex align-items-center"
            style="background-image: url('{{ asset('assets/img/breadcrumbs-bg.jpg') }}');">
            <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

                <h2>Connectez-vous</h2>
                <ol>
                    <li><a href="/">Accueil</a></li>
                    <li>Connectez-vous</li>
                </ol>

            </div>
        </div><!-- End Breadcrumbs -->
        <div class="wrapper" style="background-image: url('{{ asset('images/bg-registration-form-2.jpg') }}');">
            <div class="inner">
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <h3>connexion</h3>
                    <!--<div class="form-group">
                                <div class="form-wrapper">
                                    <label for="">Prénom</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="form-wrapper">
                                    <label for=""> Nom</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>-->
                    <div class="form-wrapper">
                        <label for="">Email ou pseudo</label>
                        <input type="text" name="email" class="form-control @error('email') is-invalid @enderror">
                        @error('email')
                            <span class="text-danger" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="form-wrapper">
                        <label for="">Mot de passe</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                        @error('password')
                            <span class="text-danger" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <!--<div class="form-wrapper">
                                <label for="">Confirmer le mot de passe</label>
                                <input type="password" class="form-control">
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> Nous n'avez pas de compte?<a>Inscrivez vous</a> .
                                    <span class="checkmark"></span>


                                </label>

                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> Mot de passe oublié?<a>cliquez ici</a> .
                                    <span class="checkmark"></span>


                                </label>

                            </div>-->
                    <div class="form-wrapper">
                        <p>vous n'avez pas de compte?<a href="/register">Inscrivez vous</a> .</p>
                    </div><br>
                    {{-- <div class="form-wrapper">
                    <p>Mot de passe oublié?<a href="">cliquez ici</a> .</p>
                </div> --}}

                    <button type="submit">Connexion</button>
                    {{-- <button>RETOUR</button> --}}
                </form>

            </div>
        </div>
    </main><!-- End #main -->
@endsection
