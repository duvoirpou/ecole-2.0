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
    <main id="main">
        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs d-flex align-items-center"
            style="background-image: url('{{ asset('assets/img/tech.jpg') }}');">
            <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

                <h2>Résultat(s) de la recherche</h2>
                <ol>
                    <li><a href="/">Accueil</a></li>
                    <li>Résultats de la recherche</li>
                </ol>

            </div>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Blog Section ======= -->
        <section id="blog" class="blog">
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row gy-4 posts-list">
                    <div class="sidebar">
                        <div class="sidebar-item search-form">
                            @if (request()->input())
                                <div class="col">
                                    <div class="left_area">
                                        <p>
                                            {{ $actualites->total() }} résultat(s) pour la recherche «
                                            <span class="text-danger text-capitalize text-bold">
                                                <i>
                                                    <u>
                                                        @if ($search)
                                                            {!! truncate($search, 30) !!}
                                                        @endif
                                                    </u>
                                                </i>
                                            </span> »
                                        </p>
                                    </div>
                                </div>
                            @endif
                            <h3 class="sidebar-title">Rechecher</h3>
                            <form action="{{ route('search.actualite') }}" method="GET" class="mt-3">
                                <input type="text" name="search">
                                <button type="submit"><i class="bi bi-search"></i></button>
                            </form>
                        </div>
                    </div>
                    @foreach ($actualites as $actualite)
                        <div class="col-xl-4 col-md-6">
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
                    <!-- End post list item -->

                    <div> {{-- class="blog-pagination" --}}
                        {{ $actualites->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
