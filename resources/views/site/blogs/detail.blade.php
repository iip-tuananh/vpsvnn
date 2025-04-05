@extends('site.layouts.master')
@section('title')
    {{ $blog_title }}
@endsection
@section('description')
    {{ $blog_description }}
@endsection

@section('css')
@endsection

@section('content')
    <main>
        <!--page-title-area start-->
        {{-- <div class="page-title-area pt-100 pb-md-60"
            data-background="/site/images/page-title-shadow-bg-1a.png">
            <img class="shape__p1" src="/site/images/ht-star-2b.svg" alt="Shape" loading="lazy">
            <img class="shape__p2" src="/site/images/ht-star-2b.svg" alt="Shape" loading="lazy">
            <img class="shape__p3" src="/site/images/ht-star-2b.svg" alt="Shape" loading="lazy">
            <div class="blur__p4"></div>
            <div class="blur__p5"></div>
            <div class="blur__p6"></div>
            <div class="blur__p7"></div>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-4 col-lg-5">
                        <div class="page-title-wrapper text-lg-start text-center mb-40">
                            <h2 class="page-title mb-10">{{ $blog_title }}</h2>
                            <div class="page-title-border mt-1 mb-10"></div>
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb list-none justify-content-center justify-content-md-start">
                                    <li><a href="{{route('front.home-page')}}">Trang chủ</a></li>
                                    <li><a href="#">Pages</a></li>
                                    <li class="active" aria-current="page">{{ $blog_title }}</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-7">
                        <div class="page__title__img__wrapper text-xl-end text-center mb-40">
                            <img class="main__1 img-fluid" src="/site/images/ilustration-2a.svg"
                                alt="ilustration" loading="lazy">
                            <img class="main__2" src="/site/images/ilustration-1a.svg" alt="ilustration" loading="lazy">
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!--page-title-area end-->
        <!-- blog__details__section start -->
        <section class="blog__details__section pt-50 pt-lg-60 pb-50 pb-lg-60">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-8">
                        <div class="blog__details__wrapper">
                            <div class="ht-blog">
                                <div class="blog__thumb mb-20">
                                    <img class="w-100" src="{{ $blog->image ? $blog->image->path : '' }}" alt="blog" loading="lazy">
                                </div>
                                <div class="ht-blog__meta">
                                    <span><a href="#"><img src="/site/images/icon-1a.svg" alt="icon" loading="lazy">
                                            Admin</a></span>
                                    <span><a href="#"><img src="/site/images/icon-2a.svg" alt="icon" loading="lazy">
                                            {{ $blog->category->name }}</a></span>
                                </div>
                            </div>
                            <h3 class="blog__title__big mb-20"><a href="blog-details.html">{{ $blog->name }}</a>
                            </h3>
                            {!! $blog->body !!}
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 order-lg-first">
                        @include('site.blogs.nav-blog')
                    </div>
                </div>
            </div>
        </section>
        <!-- blog__details__section end -->
    </main>
@endsection

@push('script')
@endpush
