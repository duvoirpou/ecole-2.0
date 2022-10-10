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

                <h2>Inscrivez-vous</h2>
                <ol>
                    <li><a href="/">Accueil</a></li>
                    <li>Inscrivez-vous</li>
                </ol>

            </div>
        </div><!-- End Breadcrumbs -->
        <div class="wrapper"
            style="background-image: url('{{ asset('images/bg-registration-form-2.jpg') }}'); background-size: cover; background-repeat: no-repeat">
            <div class="inner">
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <h3>Inscription</h3>
                    <div class="form-group">
                        <div class="form-wrapper">
                            <label for="">Nom(s) et prénom(s)</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name') }}">
                            @error('name')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-wrapper">
                            <label for=""> Sexe</label>
                            <select name="sexe" id="" class="form-control @error('sexe') is-invalid @enderror">
                                <option value="">Sexe</option>
                                <option value="M" {{ old('sexe') == 'M' ? 'selected' : '' }}>Homme
                                </option>
                                <option value="F" {{ old('sexe') == 'F' ? 'selected' : '' }}>Femme
                                </option>
                            </select>
                            @error('sexe')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-wrapper">
                            <label for="">Adresse</label>
                            <input type="text" name="adresse" class="form-control @error('adresse') is-invalid @enderror" value="{{ old('adresse') }}">
                            @error('adresse')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-wrapper">
                            <label for="">Téléphone</label>
                            <input type="text" name="tel" class="form-control @error('tel') is-invalid @enderror" value="{{ old('tel') }}">
                            @error('tel')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-wrapper">
                            <label for="">Statut</label>
                            <select class="form-control @error('statut') is-invalid @enderror" name="statut" id="">
                                <option value="">Statut</option>
                                <option value="Etudiant" {{ old('statut') == 'Etudiant' ? 'selected' : '' }}>Etudiant
                                </option>
                                <option value="Professeur" {{ old('statut') == 'Professeur' ? 'selected' : '' }}>Professeur
                                </option>
                            </select>
                            @error('statut')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-wrapper">
                            <label for="">Pseudo</label>
                            <input type="text" name="pseudo" class="form-control @error('pseudo') is-invalid @enderror" value="{{ old('pseudo') }}">
                            @error('pseudo')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-wrapper">
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror">
                            @error('email')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-wrapper">
                            <label for="">Mot de passe</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                            @error('password')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-wrapper">
                            <label for="">Confirmer le mot de passe</label>
                            <input type="password" name="password_confirmation" class="form-control"
                            id="password_confirmation">
                            @error('password_confirmation')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>

                    <!--<div class="checkbox">
                                            <label>
                                                <input type="checkbox"> I caccept the Terms of Use & Privacy Policy.
                                                <span class="checkmark"></span>


                                            </label>

                                        </div>-->
                    <p>Vous avez déja un compte?<a href="connexion.html">Connectez vous</a> .</p>

                    <button type="submit">Inscrivez-vous</button>
                </form>
            </div>
        </div>
    </main><!-- End #main -->
@endsection
