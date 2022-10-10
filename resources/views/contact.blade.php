@extends('layout.app')

@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs d-flex align-items-center" style="background-image: url('{{ asset('assets/img/breadcrumbs-bg.jpg') }}');">
            <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

                <h2>Contact</h2>
                <ol>
                    <li><a href="/">Accueil</a></li>
                    <li>Contact</li>
                </ol>

            </div>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">
                    <div class="col-lg-6">
                        <div class="info-item  d-flex flex-column justify-content-center align-items-center">
                            <i class="bi bi-map"></i>
                            <h3>Notre adresse</h3>
                            <p>32 rue Bouanga, Talangaï référence l'arret de la liberté, pharmacie vert D'ô</p>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="col-lg-3 col-md-6">
                        <div class="info-item d-flex flex-column justify-content-center align-items-center">
                            <i class="bi bi-envelope"></i>
                            <h3>Notre email</h3>
                            <p>Chitechinnova@gmail.com</p>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="col-lg-3 col-md-6">
                        <div class="info-item  d-flex flex-column justify-content-center align-items-center">
                            <i class="bi bi-telephone"></i>
                            <h3>Appelez nous</h3>
                            <p>+242 06 935 42 12/ 06 859 85 11</p>
                        </div>
                    </div><!-- End Info Item -->

                </div>

                <div class="row gy-4 mt-1">

                    <div class="col-lg-6 ">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1448.001992287997!2d15.28637681539314!3d-4.225115689168734!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1a6bccc057d40b09%3A0xfbb37d0c84490305!2sPharmacie%20Vert-Do!5e0!3m2!1sfr!2scg!4v1656110033757!5m2!1sfr!2scg" style="border:0; width: 100%; height: 384px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div><!-- End Google Maps -->

                    <div class="col-lg-6">
                        @livewire('contact')
                    </div><!-- End Contact Form -->

                </div>

            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->
@endsection
