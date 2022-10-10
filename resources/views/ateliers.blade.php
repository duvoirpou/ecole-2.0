@extends('layout.app')

@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs d-flex align-items-center"
            style="background-image: url('{{ asset('assets/img/tech.jpg') }}');">
            <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

                <h2>Ateliers pratiques</h2>
                <ol>
                    <li><a href="/">Accueil</a></li>
                    <li>Ateliers pratiques</li>
                </ol>

            </div>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Blog Section ======= -->
        <section id="blog" class="blog">
            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4 posts-list">
                    @foreach ($ateliers as $atelier)
                        <div class="col-xl-4 col-md-6">
                            <div class="post-item position-relative h-100">

                                <div class="post-img position-relative overflow-hidden">
                                    <iframe class="video-fluid" alt="" src="{{ $atelier->link }}" frameborder="0"
                                        allowfullscreen style="width: 100%"></iframe>
                                    {{-- <span class="post-date">December 12</span> --}}
                                </div>
                                <div class="post-content d-flex flex-column">

                                    <h3 class="post-title">{{ $atelier->title }} </h3>

                                    <div class="meta d-flex align-items-center">
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-clock"></i> <span
                                                class="ps-2">{{ $atelier->created_at->diffForHumans() }}</span>
                                        </div>
                                        {{-- <span class="px-3 text-black-50"></span>
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-folder2"></i> <span class="ps-2">Politics</span>
                                    </div> --}}
                                    </div>

                                    {{-- <p>
                                    Similique neque nam consequuntur ad non maxime aliquam quas. Quibusdam animi
                                    praesentium. Aliquam et laboriosam eius aut nostrum quidem aliquid dicta.
                                </p> --}}

                                    {{-- <hr>

                                <a href="#blog-detail.html"> {{-- class="readmore stretched-link" -}}
                                    <span>en sasoir plus</span><i class="bi bi-arrow-right"></i>
                                </a> --}}

                                </div>

                            </div>
                        </div><!-- End post list item -->
                    @endforeach

                    <div>
                        {{ $ateliers->links('pagination::bootstrap-4') }}
                    </div>
        </section>
        <!-- End Blog Section -->

    </main><!-- End #main -->
@endsection
