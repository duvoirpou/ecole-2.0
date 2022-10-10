@extends('layout.app')

@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs d-flex align-items-center"
            style="background-image: url('{{ asset('assets/img/Des-livres-incontournables-600x200.jpg') }}');">
            <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

                <h2>Ouvrages</h2>
                <ol>
                    <li><a href="/">Accueil</a></li>
                    <li>Ouvrages</li>
                </ol>

            </div>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Blog Section ======= -->
        <section id="blog" class="blog">
            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4 posts-list">

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

                    @livewire('search-ouvrage')

                    @foreach ($ouvrages as $ouvrage)
                        <div class="col-xl-4 col-md-6">
                            <div class="post-item position-relative h-100">

                                <div class="post-img position-relative overflow-hidden">
                                    <img src="{{ asset('storage/' . $ouvrage->image) }}" class="img-fluid" alt=""
                                        style="height: 270px; width: 100%">
                                    <span class="post-date">{{ $ouvrage->created_at->diffForHumans() }}</span>
                                </div>

                                <div class="post-content d-flex flex-column">

                                    <h3 class="post-title">{{ $ouvrage->titre }}</h3>

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
                                        {!! truncate($ouvrage->description, 100) !!}
                                    </p>

                                    <hr>

                                    <a href="{{ route('show.ouvrage', $ouvrage->slug) }}"
                                        class="readmore stretched-link"><span>en savoir
                                            plus</span><i class="bi bi-arrow-right"></i></a>

                                </div>

                            </div>
                        </div>
                    @endforeach
                    <!-- End post list item -->

                    <div> {{-- class="blog-pagination" --}}
                        {{ $ouvrages->links('pagination::bootstrap-4') }}
                        {{-- <ul class="justify-content-center">
                            <li><a href="#">1</a></li>
                            <li class="active"><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                        </ul> --}}
                    </div>


        </section>
        <!-- End Blog Section -->
    </main><!-- End #main -->
@endsection
