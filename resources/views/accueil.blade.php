@extends('layout.app')

@php
function truncate($text, $chars = 25)
{
    if (strlen($text) <= $chars) {
        return $text;
    }
    $text = $text . ' ';
    $text = substr($text, 0, $chars);
    $text = substr($text, 0, strrpos($text, ' '));
    $text = $text . '&hellip;';
    return $text;
}
@endphp

@section('content')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero">

        <div class="info d-flex align-items-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center ">
                        <h2 data-aos="fade-down">Bienvenu à l'école <span>Ecole 2.0</span></h2>
                        <p data-aos="fade-up">Ecole du numérique de l'intelligence artificielle et du management. La première
                            école du numérique et de l'intelligence artificielle au Congo.</p>
                        <a data-aos="fade-up" data-aos-delay="200" href="#get-started" class="btn-get-started">Prêt étudiant</a>
                        <a data-aos="fade-up" data-aos-delay="200" href="#get-started" class="btn-get-started">Pépinière
                            d'entreprise</a>
                        {{-- <a data-aos="fade-up" data-aos-delay="200" href="#get-started"
                            class="btn-get-started">Bibliothèque</a> --}}
                    </div>
                </div>
            </div>
        </div>

        <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">

            <div class="carousel-item active"
                style="background-image: url({{ asset('assets/img/hero-carousel/ati.jpg') }})"></div>
            <div class="carousel-item" style="background-image: url({{ asset('assets/img/hero-carousel/drone.jpg') }})">
            </div>
            <div class="carousel-item" style="background-image: url({{ asset('assets/img/hero-carousel/data.jpeg') }})">
            </div>
            <div class="carousel-item" style="background-image: url({{ asset('assets/img/hero-carousel/jeux.jpg') }})">
            </div>
            <div class="carousel-item" style="background-image: url({{ asset('assets/img/hero-carousel/cs.jpg') }})">
            </div>

            <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
            </a>

            <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
            </a>

        </div>

    </section><!-- End Hero Section -->

    <main id="main">
        <!-- ======= Get Started Section ======= -->
        <section id="get-started" class="get-started section-bg">
            <div class="container">

                <div class="row justify-content-between gy-4">

                    <div class="col-lg-6 d-flex align-items-center" data-aos="fade-up">
                        <div class="content">
                            <h3>Minus hic non reiciendis ea possimus at quia.</h3>
                            <p style="text-align: justify">Rem id rerum. Debitis deserunt quidem delectus expedita ducimus dolor. Aut iusto ipsa. Eos
                                ipsum nobis
                                ipsa soluta itaque perspiciatis fuga ipsum perspiciatis. Eum amet fugiat totam nisi possimus
                                ut delectus
                                dicta.
                            <p style="text-align: justify">Aliquam velit deserunt autem. Inventore et saepe. Tenetur suscipit eligendi labore culpa eos.
                                Deserunt
                                porro magni qui necessitatibus dolorem at animi cupiditate.</p>
                        </div>
                    </div>

                    {{-- <div class="col-lg-5" data-aos="fade">
                        <form action="forms/quote.php" method="post" class="php-email-form">
                            <h3>Get a quote</h3>
                            <p>Vel nobis odio laboriosam et hic voluptatem. Inventore vitae totam. Rerum repellendus enim
                                linead sero
                                park flows.</p>
                            <div class="row gy-3">

                                <div class="col-md-12">
                                    <input type="text" name="name" class="form-control" placeholder="Name" required>
                                </div>

                                <div class="col-md-12 ">
                                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                                </div>

                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="phone" placeholder="Phone" required>
                                </div>

                                <div class="col-md-12">
                                    <textarea class="form-control" name="message" rows="6" placeholder="Message" required></textarea>
                                </div>

                                <div class="col-md-12 text-center">
                                    <div class="loading">Loading</div>
                                    <div class="error-message"></div>
                                    <div class="sent-message">Your quote request has been sent successfully. Thank you!
                                    </div>

                                    <button type="submit">Get a quote</button>
                                </div>

                            </div>
                        </form>
                    </div> --}}<!-- End Quote Form -->

                </div>

            </div>
        </section><!-- End Get Started Section -->

        <!-- ======= Recent Blog Posts Section ======= -->
        <section id="recent-blog-posts" class="recent-blog-posts">
            <div class="container" data-aos="fade-up">
                <div class=" section-header">
                    <h2>Actualités récentes</h2>
                    <p>In commodi voluptatem excepturi quaerat nihil error autem voluptate ut et officia consequuntu</p>
                </div>

                <div class="row gy-5">
                    @foreach ($actualites as $actualite)
                        <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="post-item position-relative h-100">

                                <div class="post-img position-relative overflow-hidden">
                                    <img src="{{ asset('storage/' . $actualite->image) }}" class="img-fluid"
                                        alt="" style="height: 270px; width: 100%">
                                    <span class="post-date">{{ $actualite->created_at->diffForHumans() }}</span>
                                </div>

                                <div class="post-content d-flex flex-column">

                                    <h3 class="post-title">{{ $actualite->title }}</h3>

                                    {{-- <div class="meta d-flex align-items-center">
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-person"></i> <span class="ps-2">John Doe</span>
                                    </div>
                                    <span class="px-3 text-black-50"></span>
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-folder2"></i> <span class="ps-2">Politics</span>
                                    </div>
                                </div> --}}

                                    <p style="text-align: justify">
                                        {!! truncate($actualite->content, 100) !!}
                                    </p>

                                    <hr>

                                    <a href="{{ route('show.actualite', $actualite->slug) }}"
                                        class="readmore stretched-link"><span>en savoir
                                            plus</span><i class="bi bi-arrow-right"></i></a>

                                </div>

                            </div>
                        </div>
                    @endforeach
                    <!-- End post item -->
                </div>

            </div>
        </section>
        <!-- End Recent Blog Posts Section -->

    </main><!-- End #main -->
@endsection
