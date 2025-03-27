@extends('site.layouts.master')
@section('title')
    {{ $config->web_title }}
@endsection
@section('description')
    {{ $config->web_des }}
@endsection
@section('image')
    {{ url('' . $banners[0]->image->path) }}
@endsection
@section('css')
@endsection
@section('content')
<main>
    <!-- theme__main__banner start -->
    <section class="theme__main__banner-one position-relative pt-105 pb-150 pb-md-100">
        <div class="shapes__1"></div>
        <div class="shapes__2"></div>
        <div class="shapes__3"></div>
        <img class="shapes__4" src="/site/images/he-shape-1a.svg" alt="Shape Four">
        <img class="shapes__5" src="/site/images/he-shape-2a.svg" alt="Shape Five">
        <img class="shapes__6" src="/site/images/he-shape-3a.svg" alt="Shape Six">
        <img class="shapes__7" src="/site/images/he-shape-4a.svg" alt="Shape Seven">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="theme__content text-lg-start text-center mb-5 mb-lg-0">
                        <h4 class="theme__subtitle">We Provide</h4>
                        <h2>
                            <span data-text="Best Ultrafast" class="main__title">Best Ultrafast</span>
                            <span data-text="Hosting Solution" class="main__title">Hosting Solution</span>
                        </h2>
                        <p class="fw-medium">Dramatically supply transparent deliverables before caward comp
                            internal or "organic" sources comp transparent.
                        </p>
                        <a href="#" class="ht_btn">Start 7 Days Trial</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="hero__img">
                        <img src="/site/images/hero-img-1a.png " alt="hero__img">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- theme__maina__banner end -->
    <!-- about__area start -->
    <section class="about__area pt-150 pb-45 pt-lg-80">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-7 col-lg-6">
                    <div class="about__img position-relative mb-30">
                        <img src="/site/images/about-ilus-1a.png" alt="Main" class="about__main">
                        <div class="about__shapes-one"></div>
                        <img class="about__shapes-two" src="/site/images/ab-star-1a.svg"
                            alt="About Shape Two">
                        <img class="about__shapes-three" src="/site/images/ab-star-2a.svg"
                            alt="About Shape Three">
                        <img class="about__shapes-four" src="/site/images/ab-star-3a.svg"
                            alt="About Shape Four">
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6 ps-xxl-5">
                    <div class="about__wrapper ps-xxl-5 mb-30" data-aos="fade-left" data-aos-delay="300">
                        <div class="section__title mb-15">
                            <h4 class="section__title-sub">About Us</h4>
                            <h2 class="section__title-main">
                                {{$config->short_name_company}}
                            </h2>
                            <p>
                                {{$config->web_des}}
                            </p>
                        </div>
                        <a href="{{route('front.about-us')}}" class="ht_btn">More Details</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about__area end -->
    {{-- <!-- brand__area start -->
    <section class="brand__area pt-75 pb-150 pt-lg-30 pb-lg-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section__title text-center mb-60" data-aos="fade-up" data-aos-delay="200">
                        <h4 class="section__title-sub">Partners</h4>
                        <h2 class="section__title-main">Over 100+ Company <br /> Trusted us</h2>
                    </div>
                </div>
            </div>
            <div class="row brand-slider-one" data-aos="fade-up" data-aos-delay="300">
                <div class="col-2">
                    <div class="brand__wrapper text-center">
                        <a class="brand__logo" href="#"><img src="assets/img/brand/brand-1a.svg"
                                alt="Brand Image"></a>
                    </div>
                </div>
                <div class="col-2">
                    <div class="brand__wrapper text-center">
                        <a class="brand__logo" href="#"><img src="assets/img/brand/brand-2a.svg"
                                alt="Brand Image"></a>
                    </div>
                </div>
                <div class="col-2">
                    <div class="brand__wrapper text-center">
                        <a class="brand__logo" href="#"><img src="assets/img/brand/brand-3a.svg"
                                alt="Brand Image"></a>
                    </div>
                </div>
                <div class="col-2">
                    <div class="brand__wrapper text-center">
                        <a class="brand__logo" href="#"><img src="assets/img/brand/brand-4a.svg"
                                alt="Brand Image"></a>
                    </div>
                </div>
                <div class="col-2">
                    <div class="brand__wrapper text-center">
                        <a class="brand__logo" href="#"><img src="assets/img/brand/brand-5a.svg"
                                alt="Brand Image"></a>
                    </div>
                </div>
                <div class="col-2">
                    <div class="brand__wrapper text-center">
                        <a class="brand__logo" href="#"><img src="assets/img/brand/brand-6a.svg"
                                alt="Brand Image"></a>
                    </div>
                </div>
                <div class="col-2">
                    <div class="brand__wrapper text-center">
                        <a class="brand__logo" href="#"><img src="assets/img/brand/brand-2a.svg"
                                alt="Brand Image"></a>
                    </div>
                </div>
                <div class="col-2">
                    <div class="brand__wrapper text-center">
                        <a class="brand__logo" href="#"><img src="assets/img/brand/brand-1a.svg"
                                alt="Brand Image"></a>
                    </div>
                </div>
                <div class="col-2">
                    <div class="brand__wrapper text-center">
                        <a class="brand__logo" href="#"><img src="assets/img/brand/brand-3a.svg"
                                alt="Brand Image"></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- brand__area end --> --}}
    <!-- services__area start -->
    <section class="services__area pt-100 pb-70 pt-lg-60 pb-lg-30">
        <img class="shapes__one" src="/site/images/s-pattern-1a.svg" alt="pattern">
        <img class="shapes__two" src="/site/images/s-pattern-2a.svg" alt="pattern two">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section__title text-center mb-60" data-aos="fade-up" data-aos-delay="100">
                        <h4 class="section__title-sub">Services</h4>
                        <h2 class="section__title-main">Tổng quan về dịch vụ</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($productCategories as $productCategory)
                <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up">
                    <div class="ht-services mb-30">
                        <a class="ht-services__icon" href="{{route('front.show-product-category', $productCategory->slug)}}">
                            <div class="ht-services__icon-front">
                                <img src="{{$productCategory->image ? $productCategory->image->path : ''}}" alt="cloud" class="img-fluid" loading="lazy" style="width: 100%; height: 100%; object-fit: cover; border-radius: 50%;">
                            </div>
                            <div class="ht-services__icon-back">
                                <img src="{{$productCategory->image ? $productCategory->image->path : ''}}" alt="cloud" class="img-fluid" loading="lazy" style="width: 100%; height: 100%; object-fit: cover; border-radius: 50%;">
                            </div>
                        </a>
                        <h3 class="ht-services__title"><a href="{{route('front.show-product-category', $productCategory->slug)}}">{{$productCategory->name}}</a></h3>
                        <p>{{$productCategory->short_des}}</p>
                        <h4 class="ht-services__price mb-4">
                            <span>{{ formatCurrency($productCategory->min_sell_price) }}đ/tháng</span>
                        </h4>
                        <a class="ht-services__btn" href="{{route('front.show-product-category', $productCategory->slug)}}">Learn More</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- services__area end -->
    <!-- price__area start -->
    @foreach($categorySpecial as $category)
    <section class="price__area pt-140 pb-95 pt-lg-60 pb-lg-30">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section__title text-center mb-60" data-aos="fade-up" data-aos-delay="100">
                        <h4 class="section__title-sub">Our Pricing</h4>
                        <h2 class="section__title-main">{{$category->name}}</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                @foreach($category->products as $key => $product)
                @if($key == 1)
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="ht-plan active mb-30">
                        <div class="ht-plan__header">
                            <div class="ht-plan__icon">
                                <img class="ht-plan__icon-front" src="/site/images/server.svg"
                                    alt="icon" loading="lazy">
                                <img class="ht-plan__icon-back" src="/site/images/server.svg"
                                    alt="icon" loading="lazy">
                            </div>
                            <h3 class="ht-plan__header-title">{{$product->name}}</h3>
                            <p class="ht-plan__header-desc">{{$product->short_des}}</p>
                            <div class="ht-plan__header-price">
                                <h2 class="price-title">{{ formatCurrency($product->sell_price) }}</h2>
                                <span>đ/tháng</span>
                            </div>
                        </div>
                        <div class="ht-plan__body mb-35">
                            <ul class="ht-plan__body-feature">
                                <li><a href="#">{{$product->cpu}} CPU</a></li>
                                <li><a href="#">{{$product->ram}} RAM</a></li>
                                <li><a href="#">{{$product->storage}} Storage</a></li>
                                <li><a href="#">{{$product->band_width}} Bandwidth</a></li>
                                @if($product->stream)
                                <li><a href="#">{{$product->stream}} Stream</a></li>
                                @endif
                                @if($product->os)
                                <li><a href="#">{{$product->os}}</a></li>
                                @endif
                                @if($product->origin)
                                <li><a href="#">{{$product->origin}}</a></li>
                                @endif
                            </ul>
                        </div>
                        <div class="ht-plan__footer">
                            <a class="ht_btn" href="javascript:void(0)" ng-click="addToCart({{$product->id}})">Đăng ký</a>
                        </div>
                    </div>
                </div>
                @else
                <div class="col-lg-4 col-md-6 mt-lg-4 pt-lg-1" data-aos="fade-up" data-aos-delay="200">
                    <div class="ht-plan mb-30">
                        <div class="ht-plan__header">
                            <div class="ht-plan__icon">
                                <img class="ht-plan__icon-front" src="/site/images/server.svg" alt="icon" loading="lazy">
                                <img class="ht-plan__icon-back" src="/site/images/server.svg" alt="icon" loading="lazy">
                            </div>
                            <h3 class="ht-plan__header-title">{{$product->name}}</h3>
                            <p class="ht-plan__header-desc">{{$product->short_des}}</p>
                            <div class="ht-plan__header-price">
                                <h2 class="price-title">{{ formatCurrency($product->sell_price) }}</h2>
                                <span>đ/tháng</span>
                            </div>
                        </div>
                        <div class="ht-plan__body mb-35">
                            <ul class="ht-plan__body-feature">
                                <li><a href="#">{{$product->cpu}} CPU</a></li>
                                <li><a href="#">{{$product->ram}} RAM</a></li>
                                <li><a href="#">{{$product->storage}} Storage</a></li>
                                <li><a href="#">{{$product->band_width}} Bandwidth</a></li>
                                @if($product->stream)
                                <li><a href="#">{{$product->stream}} Stream</a></li>
                                @endif
                                @if($product->os)
                                <li><a href="#">{{$product->os}}</a></li>
                                @endif
                                @if($product->origin)
                                <li><a href="#">{{$product->origin}}</a></li>
                                @endif
                            </ul>
                        </div>
                        <div class="ht-plan__footer">
                            <a class="ht_btn" href="javascript:void(0)" ng-click="addToCart({{$product->id}})">Đăng ký</a>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </section>
    @endforeach
    <!-- price__area end -->
    <!-- chose__area start -->
    <section class="chose__area pt-75 pb-120 pt-lg-55 pb-lg-30">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-5 col-lg-6" data-aos="fade-right" data-aos-delay="100">
                    <div class="chose__content-wrapper mb-30">
                        <div class="section__title mb-40 pe-xl-3">
                            <h4 class="section__title-sub">Why Choose Us</h4>
                            <h2 class="section__title-main">Tại sao nên chọn chúng tôi</h2>
                            {{-- <p>Dynamically innovate enabled synergy vis-a-vis user friendly channels.
                                Appropriately engage extensible supply chains before cutting-edge opportunities.
                            </p> --}}
                        </div>
                        <div class="chose__feature">
                            <a href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#collapseOne"> Hiệu suất mạnh mẽ <span class="float-end"><i class="fa fa-caret-down"></i></span></a>
                            <div class="collapse p-3" id="collapseOne" style="background-color: #f8f9fa;">
                                <p class="text-dark">Chúng tôi sử dụng CPU Intel Xeon dòng E3 và E5 trên các máy chủ của mình, cùng với ổ SSD trong RAID để mang đến cho bạn những máy ảo nhanh vượt trội</p>
                            </div>
                            <a href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#collapseTwo"> Hệ điều hành đa dạng <span class="float-end"><i class="fa fa-caret-down"></i></span></a>
                            <div class="collapse p-3" id="collapseTwo" style="background-color: #f8f9fa;">
                                <p class="text-dark">Chúng tôi hỗ trợ nhiều hệ điều hành khác nhau bao gồm Windows Server, Windows Desktop và Linux</p>
                            </div>
                            <a href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#collapseThree"> An toàn thông tin<span class="float-end"><i class="fa fa-caret-down"></i></span></a>
                            <div class="collapse p-3" id="collapseThree" style="background-color: #f8f9fa;">
                                <p class="text-dark">Kiểm soát, ngăn chặn xâm nhập, hạn chế rủi ro hệ thống. Bảo đảm dữ liệu bảo mật và an toàn</p>
                            </div>
                            <a href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#collapseFour"> Hỗ trợ 24/7<span class="float-end"><i class="fa fa-caret-down"></i></span></a>
                            <div class="collapse p-3" id="collapseFour" style="background-color: #f8f9fa;">
                                <p class="text-dark">Đội ngũ IT, Chăm sóc khách hàng chuyên nghiệp, sẵn sàng cho mọi tình huống, hỗ trợ nhanh chóng</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-6">
                    <div class="chose__img text-lg-end mb-30 pe-lg-3">
                        <img src="/site/images/ilus-main-1a.png" alt="ilustration"
                            class="chose__img-ilus img-fluid">
                        <img src="/site/images/tick-mark-1a.svg" alt="tickmark" class="chose__img-top">
                        <img src="/site/images/board-1a.svg" alt="board" class="chose__img-top-1">
                        <img class="chose__img-shapes-two" src="/site/images/ab-star-1a.svg"
                            alt="About Shape Two">
                        <img class="chose__img-shapes-three" src="/site/images/ch-big-star-1a.svg"
                            alt="About Shape Three">
                        <img class="chose__img-shapes-four" src="/site/images/ab-star-3a.svg"
                            alt="About Shape Four">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- chose__area end -->
    <!-- testimonial__area start -->
    <section class="testimonial__area pt-100 pb-100 pt-lg-60 pb-lg-30">
        <img class="shapes__one" src="/site/images/s-pattern-1a.svg" alt="pattern">
        <img class="shapes__two" src="/site/images/s-pattern-2a.svg" alt="pattern two">
        <div class="container">
            <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="100">
                <div class="col-xl-6">
                    <div class="section__title text-center mb-60">
                        <h4 class="section__title-sub">Testimonials</h4>
                        <h2 class="section__title-main">Đánh giá khách hàng
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="testimonial-slider-container">
            <div class="row testimonial__slider">
                @foreach($reviews as $review)
                <div class="col-lg-4">
                    <div class="testimonial__wrapper">
                        <div class="rating">
                            <a href="#"><i class="fas fa-star"></i></a>
                            <a href="#"><i class="fas fa-star"></i></a>
                            <a href="#"><i class="fas fa-star"></i></a>
                            <a href="#"><i class="fas fa-star"></i></a>
                            <a href="#"><i class="fas fa-star"></i></a>
                        </div>
                        <p>
                            {{$review->message}}
                        </p>
                        {{-- <img class="author__avatar" src="assets/img/testimonial/author-1.jpg"
                            alt="autho avatar"> --}}
                        <h3 class="author__name">
                            {{$review->name}}
                        </h3>
                        {{-- <h5 class="author__designation">
                            Medical Assistant
                        </h5> --}}
                    </div>
                </div>
                @endforeach
            </div>
            <div class="pagination-area d-none d-md-inline-block">
                <div class="next_t1"><i class="bi bi-chevron-left"></i></div>
                <div class="prev_t1"><i class="bi bi-chevron-right"></i></div>
            </div>
        </div>
    </section>
    <!-- testimonial__area end -->
    <!-- blog__area start -->
    @foreach($categorySpecialPost as $category)
    <section class="blog__area pt-150 pb-60 pt-lg-60">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section__title text-center mb-60" data-aos="fade-up" data-aos-delay="100">
                        <h4 class="section__title-sub">Latest Blogs</h4>
                        <h2 class="section__title-main">{{$category->name}}</h2>
                    </div>
                </div>
            </div>
            <div class="row blog__slider__one">
                @foreach($category->posts as $post)
                <div class="col-lg-6">
                    <div class="ht-blog">
                        <div class="ht-blog__thumb me-xl-3 pe-xl-1 mb-20">
                            <img class="w-100" src="{{$post->image ? $post->image->path : ''}}" alt="blog" loading="lazy">
                            <div class="ht-blog__date">
                                {{ formatDate($post->created_at) }}
                            </div>
                        </div>
                        <div class="ht-blog__content mb-20">
                            <div class="ht-blog__meta mt-10">
                                <span><a href="#"><img src="/site/images/icon-1a.svg" alt="icon">
                                        Admin</a></span>
                                <span><a href="#"><img src="/site/images/icon-2a.svg" alt="icon">
                                        {{$post->category->name}}</a></span>
                            </div>
                            <h3 class="blog-title"><a href="{{route('front.detail-blog', $post->slug)}}">{{$post->name}}</a>
                            </h3>
                            <p>{{$post->intro}}</p>
                            <div class="ht-blog-btn mt-2">
                                <a class="ht_btn" href="{{route('front.detail-blog', $post->slug)}}">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endforeach
    <!-- blog__area end -->
</main>
@endsection
@push('script')
@endpush
