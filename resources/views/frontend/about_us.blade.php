@extends('frontend.layouts.master')
@section('title')
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('/assets/frontend/css/product-detail.css') }}">
@endsection
@section('main-content')
    <section class="page-header">
        <div class="page-header__bg_about-us"></div>
        <!-- /.page-header__bg -->
        <div class="container">
            <h2 class="page-header__title wow animated fadeInLeft" data-wow-delay="0s" data-wow-duration="1500ms">About</h2>
            <div class="page-header__breadcrumb-box">
                <ul class="trevlo-breadcrumb">
                    <li><a href="/">Home</a></li>
                    <li>About</li>
                </ul><!-- /.trevlo-breadcrumb -->
            </div><!-- /.page-header__breadcrumb-box -->
        </div><!-- /.container -->
    </section><!-- /.page-header -->

    <!-- Why Choose Two Start -->
    <section class="why-choose-two">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-xl-6">
                    <div class="why-choose-two__img">
                        <div class="why-choose-two__img__one wow fadeInUp" data-wow-delay="200ms">
                            <div class="trevlo-tilt" data-tilt-options='{ "glare": false, "maxGlare": 0, "maxTilt": 7, "speed": 700, "scale": 1 }'>
                                <img src="/images/about-us/why-choose-2-1.jpg.png" alt="why-choose">
                            </div>
                            <div class="trevlo-tilt" data-tilt-options='{ "glare": false, "maxGlare": 0, "maxTilt": 7, "speed": 700, "scale": 1 }'>
                                <img src="/images/about-us/why-choose-2-2.jpg.png" alt="why-choose">
                            </div>
                        </div><!-- /.why-choose-two__img__one -->
                        <div class="why-choose-two__img__two wow fadeInUp" data-wow-delay="300ms">
                            <div class="trevlo-tilt" data-tilt-options='{ "glare": false, "maxGlare": 0, "maxTilt": 7, "speed": 700, "scale": 1 }'>
                                <img src="/images/about-us/why-choose-2-3.jpg.png" alt="why-choose">
                            </div>
                            <div class="trevlo-tilt" data-tilt-options='{ "glare": false, "maxGlare": 0, "maxTilt": 7, "speed": 700, "scale": 1 }'>
                                <img src="/images/about-us/why-choose-2-4.jpg.png" alt="why-choose">
                            </div>
                        </div><!-- /.why-choose-two__img__two -->
                    </div><!-- /.why-choose-two__img-box -->
                </div><!-- /.col-lg-6 col-xl-6 -->
                <div class="col-lg-6 col-xl-6 wow fadeInLeft" data-wow-delay="200ms">
                    <div class="why-choose-two__content">
                        <div class="sec-title text-left">

                            <p class="sec-title__tagline">@lang('translation.about_us')</p><!-- /.sec-title__tagline -->

                            <h2 class="sec-title__title">@lang('translation.elon_farm_in_vn')</h2><!-- /.sec-title__title -->
                        </div><!-- /.sec-title -->
                        <p class="why-choose-two__text">
                            @lang('translation.about_us_description_1')
                        </p>
                        <p class="why-choose-two__text">
                            @lang('translation.about_us_description_2')
                        </p>
                        <div class="why-choose-two__box-wrapper">
                            <div class="why-choose-two__box">
                                <div class="why-choose-two__box__icon">
                                    <img src="{{asset('/assets/frontend/images/about/leaves.png')}}" alt="">
                                </div><!-- /.why-choose-two__box__icon -->
                                <h4 class="why-choose-two__box__title">@lang('translation.farming_practices')</h4>
                            </div><!-- /.why-choose-two__box -->
                            <div class="why-choose-two__box">
                                <div class="why-choose-two__box__icon">
                                    <img src="{{asset('/assets/frontend/images/about/capa_1.png')}}" alt="">
                                </div><!-- /.why-choose-two__box__icon -->
                                <h4 class="why-choose-two__box__title">@lang('translation.coffee_experiences')</h4>
                            </div><!-- /.why-choose-two__box -->

                        </div><!-- /.why-choose-two__service -->
                        <div class="why-choose-two__box-wrapper">
                            <div class="why-choose-two__box">
                                <div><img src="{{asset('/assets/frontend/images/about/whapsapp-icon.svg')}}" alt=""></div>
                                <div class="about-contact">
                                    <div>@lang('translation.chat_on_whatsapp')</div>
                                    <p>(+84) 969285991</p>
                                </div>
                            </div>
                            <div class="why-choose-two__box">
                                <div><img src="{{asset('/assets/frontend/images/about/zalo-icon.svg')}}" alt=""></div>
                                <div class="about-contact">
                                    <div>@lang('translation.chat_on_zalo')</div>
                                    <p>(+84) 969285991</p>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.why-choose-two__content -->
                </div><!-- /.col-lg-6 col-xl-6 -->

            </div><!-- /.row -->
        </div><!-- /.container -->
    </section>
    <!-- Why Choose Two End -->

    <!-- Destination Start -->
    <section class="destination-two" id="destination">
        <div class="container">
            <div class="row wow fadeInUp" data-wow-delay="200ms">
                <div class="col-xl-4">
                    <div class="destination-two__content">
                        <div class="sec-title text-left">

                            <p class="sec-title__tagline">@lang('translation.our_homestay')</p><!-- /.sec-title__tagline -->

                            <h2 class="sec-title__title">@lang('translation.welcome_to_homestay')</h2><!-- /.sec-title__title -->
                        </div><!-- /.sec-title --><!-- /.sec-title -->
                        <p class="destination-two__text">@lang('translation.about_us_description')</p>
                        <a href="/experiences"
                           class="main-header__button trevlo-btn trevlo-btn--two trevlo-btn--base">
                            <span>Start Booking</span>
                            <i class="trevlo-one-icon-up-right-arrow"></i>
                        </a>
                    </div>
                </div>
                <div class="col-xl-8">
                    <div class="trevlo-stretch-element-inside-column">
                        <div class="destination-two__carousel trevlo-owl__carousel trevlo-owl__carousel--basic-nav trevlo-owl__carousel--with-shadow owl-theme owl-carousel" data-owl-options='{
                        "items": 4,
                        "margin": 30,
                        "smartSpeed": 700,
                        "loop":false,
                        "autoplay": 6000,
                        "nav":false,
                        "dots":false,
                        "navText": ["<span class=\"fa fa-angle-left\"></span>","<span class=\"fa fa-angle-right\"></span>"],
                        "responsive":{
                            "0":{
                                "items": 1
                            },
                            "500":{
                                "items": 2
                            },
                            "768":{
                                "items": 3
                            },
                            "1400":{
                                "items": 4
                            }
                        }
                        }'>
                            <div class="item">
                                <div class="destination-two__card">
                                    <div class="destination-two__card-img-box destination-two__card-img-box--round">
                                        <img src="assets/frontend/images/about/destination-2-2.jpeg" alt="destination" class="destination-two__card-img destination-two__card-img--round">
                                        <div class="destination-two__card-overlay destination-two__card-overlay--round">
                                            <a href="assets/frontend/images/about/destination-2-2.jpeg" class="destination-two__card-plus img-popup"><span class="icon-plus"></span></a>
                                        </div><!-- /.destination-two__card-overlay destination-two__card-overlay--round -->
                                    </div><!-- /.destination-two__card-img-box -->
                                    <div class="destination-two__card-title-box">
                                        <h4 class="destination-two__card-title"><a href="javascript:void(0)">Serene</a></h4>
                                    </div><!-- /.destination-two__card-title-box -->
                                </div><!-- /.destination-two__card -->
                            </div>
                            <div class="item">
                                <div class="destination-two__card">
                                    <div class="destination-two__card-img-box destination-two__card-img-box--circle">
                                        <img src="assets/frontend/images/about/destination-2-3.jpeg" alt="destination" class="destination-two__card-img destination-two__card-img--circle">
                                        <div class="destination-two__card-overlay destination-two__card-overlay--circle">
                                            <a href="assets/frontend/images/about/destination-2-3.jpeg" class="destination-two__card-plus img-popup"><span class="icon-plus"></span></a>
                                        </div><!-- /.destination-two__card-overlay destination-two__card-overlay--circle -->
                                    </div><!-- /.destination-two__card-img-box -->
                                    <div class="destination-two__card-title-box">
                                        <h4 class="destination-two__card-title"><a href="javascript:void(0)">Tranquil</a></h4>
                                    </div><!-- /.destination-two__card-title-box -->
                                </div><!-- /.destination-two__card -->
                            </div>
                            <div class="item">
                                <div class="destination-two__card">
                                    <div class="destination-two__card-img-box destination-two__card-img-box--round">
                                        <img src="assets/frontend/images/about/destination-2-4.jpeg" alt="destination" class="destination-two__card-img destination-two__card-img--round">
                                        <div class="destination-two__card-overlay destination-two__card-overlay--round">
                                            <a href="assets/frontend/images/about/destination-2-4.jpeg" class="destination-two__card-plus img-popup"><span class="icon-plus"></span></a>
                                        </div><!-- /.destination-two__card-overlay destination-two__card-overlay--round -->
                                    </div><!-- /.destination-two__card-img-box -->
                                    <div class="destination-two__card-title-box">
                                        <h4 class="destination-two__card-title"><a href="javascript:void(0)">Cozy</a></h4>
                                    </div><!-- /.destination-two__card-title-box -->
                                </div><!-- /.destination-two__card -->
                            </div>
                            <div class="item">
                                <div class="destination-two__card">
                                    <div class="destination-two__card-img-box destination-two__card-img-box--circle">
                                        <img src="assets/frontend/images/about/destination-2-5.webp" alt="destination" class="destination-two__card-img destination-two__card-img--circle">
                                        <div class="destination-two__card-overlay destination-two__card-overlay--circle">
                                            <a href="assets/frontend/images/about/destination-2-5.webp" class="destination-two__card-plus img-popup"><span class="icon-plus"></span></a>
                                        </div><!-- /.destination-two__card-overlay destination-two__card-overlay--circle -->
                                    </div><!-- /.destination-two__card-img-box -->
                                    <div class="destination-two__card-title-box">
                                        <h4 class="destination-two__card-title"><a href="javascript:void(0)">Rustic</a></h4>
                                    </div><!-- /.destination-two__card-title-box -->
                                </div><!-- /.destination-two__card -->
                            </div>

                            <div class="item">
                                <div class="destination-two__card">
                                    <div class="destination-two__card-img-box destination-two__card-img-box--round">
                                        <img src="assets/frontend/images/about/destination-2-6.webp" alt="destination" class="destination-two__card-img destination-two__card-img--round">
                                        <div class="destination-two__card-overlay destination-two__card-overlay--round">
                                            <a href="assets/frontend/images/about/destination-2-6.webp" class="destination-two__card-plus img-popup"><span class="icon-plus"></span></a>
                                        </div><!-- /.destination-two__card-overlay destination-two__card-overlay--round -->
                                    </div><!-- /.destination-two__card-img-box -->
                                    <div class="destination-two__card-title-box">
                                        <h4 class="destination-two__card-title"><a href="javascript:void(0)">Homely</a></h4>
                                    </div><!-- /.destination-two__card-title-box -->
                                </div><!-- /.destination-two__card -->
                            </div>
                            <div class="item">
                                <div class="destination-two__card">
                                    <div class="destination-two__card-img-box destination-two__card-img-box--circle">
                                        <img src="assets/frontend/images/about/destination-2-7.webp" alt="destination" class="destination-two__card-img destination-two__card-img--circle">
                                        <div class="destination-two__card-overlay destination-two__card-overlay--circle">
                                            <a href="assets/frontend/images/about/destination-2-7.webp" class="destination-two__card-plus img-popup"><span class="icon-plus"></span></a>
                                        </div><!-- /.destination-two__card-overlay destination-two__card-overlay--circle -->
                                    </div><!-- /.destination-two__card-img-box -->
                                    <div class="destination-two__card-title-box">
                                        <h4 class="destination-two__card-title"><a href="javascript:void(0)">Refreshing</a></h4>
                                    </div><!-- /.destination-two__card-title-box -->
                                </div><!-- /.destination-two__card -->
                            </div>
                            <div class="item">
                                <div class="destination-two__card">
                                    <div class="destination-two__card-img-box destination-two__card-img-box--round">
                                        <img src="assets/frontend/images/about/destination-2-8.webp" alt="destination" class="destination-two__card-img destination-two__card-img--round">
                                        <div class="destination-two__card-overlay destination-two__card-overlay--round">
                                            <a href="assets/frontend/images/about/destination-2-8.webp" class="destination-two__card-plus img-popup"><span class="icon-plus"></span></a>
                                        </div><!-- /.destination-two__card-overlay destination-two__card-overlay--round -->
                                    </div><!-- /.destination-two__card-img-box -->
                                    <div class="destination-two__card-title-box">
                                        <h4 class="destination-two__card-title"><a href="javascript:void(0)">Welcoming</a></h4>
                                    </div><!-- /.destination-two__card-title-box -->
                                </div><!-- /.destination-two__card -->
                            </div>
                            <div class="item">
                                <div class="destination-two__card">
                                    <div class="destination-two__card-img-box destination-two__card-img-box--circle">
                                        <img src="assets/frontend/images/about/destination-2-9.jpeg" alt="destination" class="destination-two__card-img destination-two__card-img--circle">
                                        <div class="destination-two__card-overlay destination-two__card-overlay--circle">
                                            <a href="assets/frontend/images/about/destination-2-9.jpeg" class="destination-two__card-plus img-popup"><span class="icon-plus"></span></a>
                                        </div><!-- /.destination-two__card-overlay destination-two__card-overlay--circle -->
                                    </div><!-- /.destination-two__card-img-box -->
                                    <div class="destination-two__card-title-box">
                                        <h4 class="destination-two__card-title"><a href="javascript:void(0)">Enchanting</a></h4>
                                    </div><!-- /.destination-two__card-title-box -->
                                </div><!-- /.destination-two__card -->
                            </div>

                            <div class="item">
                                <div class="destination-two__card">
                                    <div class="destination-two__card-img-box destination-two__card-img-box--round">
                                        <img src="assets/frontend/images/about/destination-3-0.webp" alt="destination" class="destination-two__card-img destination-two__card-img--round">
                                        <div class="destination-two__card-overlay destination-two__card-overlay--round">
                                            <a href="assets/frontend/images/about/destination-3-0.webp" class="destination-two__card-plus img-popup"><span class="icon-plus"></span></a>
                                        </div><!-- /.destination-two__card-overlay destination-two__card-overlay--round -->
                                    </div><!-- /.destination-two__card-img-box -->
                                    <div class="destination-two__card-title-box">
                                        <h4 class="destination-two__card-title"><a href="javascript:void(0)">Sustainable</a></h4>
                                    </div><!-- /.destination-two__card-title-box -->
                                </div><!-- /.destination-two__card -->
                            </div>
                            <div class="item">
                                <div class="destination-two__card">
                                    <div class="destination-two__card-img-box destination-two__card-img-box--circle">
                                        <img src="assets/frontend/images/about/destination-3-1.jpeg" alt="destination" class="destination-two__card-img destination-two__card-img--circle">
                                        <div class="destination-two__card-overlay destination-two__card-overlay--circle">
                                            <a href="assets/frontend/images/about/destination-3-1.jpeg" class="destination-two__card-plus img-popup"><span class="icon-plus"></span></a>
                                        </div><!-- /.destination-two__card-overlay destination-two__card-overlay--circle -->
                                    </div><!-- /.destination-two__card-img-box -->
                                    <div class="destination-two__card-title-box">
                                        <h4 class="destination-two__card-title"><a href="javascript:void(0)">Vibrant</a></h4>
                                    </div><!-- /.destination-two__card-title-box -->
                                </div><!-- /.destination-two__card -->
                            </div>
                            <div class="item">
                                <div class="destination-two__card">
                                    <div class="destination-two__card-img-box destination-two__card-img-box--round">
                                        <img src="assets/frontend/images/about/destination-3-2.jpeg" alt="destination" class="destination-two__card-img destination-two__card-img--round">
                                        <div class="destination-two__card-overlay destination-two__card-overlay--round">
                                            <a href="assets/frontend/images/about/destination-3-2.jpeg" class="destination-two__card-plus img-popup"><span class="icon-plus"></span></a>
                                        </div><!-- /.destination-two__card-overlay destination-two__card-overlay--round -->
                                    </div><!-- /.destination-two__card-img-box -->
                                    <div class="destination-two__card-title-box">
                                        <h4 class="destination-two__card-title"><a href="javascript:void(0)">Authentic</a></h4>
                                    </div><!-- /.destination-two__card-title-box -->
                                </div><!-- /.destination-two__card -->
                            </div>
                            <div class="item">
                                <div class="destination-two__card">
                                    <div class="destination-two__card-img-box destination-two__card-img-box--circle">
                                        <img src="assets/frontend/images/about/destination-3-3.jpeg" alt="destination" class="destination-two__card-img destination-two__card-img--circle">
                                        <div class="destination-two__card-overlay destination-two__card-overlay--circle">
                                            <a href="assets/frontend/images/about/destination-3-3.jpeg" class="destination-two__card-plus img-popup"><span class="icon-plus"></span></a>
                                        </div><!-- /.destination-two__card-overlay destination-two__card-overlay--circle -->
                                    </div><!-- /.destination-two__card-img-box -->
                                    <div class="destination-two__card-title-box">
                                        <h4 class="destination-two__card-title"><a href="javascript:void(0)">Relaxing</a></h4>
                                    </div><!-- /.destination-two__card-title-box -->
                                </div><!-- /.destination-two__card -->
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.row -->
        </div>
    </section>
    <!-- Destination End -->

    <!-- Counter One Start -->
    <section class="counter-one">
        <div class="counter-one__bg-box_about-us"></div><!-- /.counter-one__bg-box -->
        <div class="counter-one__main-content">
            <div class="container">
                <div class="counter-one__container container-fluid">
                    <div class="row">
                        <div class="col-xl-3 col-lg-3 col-6 wow animated fadeInUp" data-wow-delay="0.1s" data-wow-duration="1500ms">
                            <div class="counter-box @@extraClassName">
                                <div class="counter-box__icon">
                                    <img src="assets/frontend/images/icons/routing-icon.png" alt="destination">
                                </div><!-- /.counter-box__icon -->
                                <div class="counter-box__inner sec-title count-box">
                                    <h3 class="counter-box__count-text counter-box__count-text--one sec-title__heading count-text" data-stop="115" data-speed="1500">00</h3>
                                    <h3 class="counter-box__count-text sec-title__heading">k</h3>
                                </div><!-- /.counter-box__inner -->
                                <p class="counter-box__title">@lang('translation.tours_2024')</p>
                            </div>
                        </div><!-- /.col-xl-3 col-lg-3 col-6 -->
                        <div class="col-xl-3 col-lg-3 col-6 wow animated fadeInUp" data-wow-delay="0.3s" data-wow-duration="1500ms">
                            <div class="counter-box @@extraClassName">
                                <div class="counter-box__icon">
                                    <img src="assets/frontend/images/icons/smile-circle-icon.png" alt="destination">
                                </div><!-- /.counter-box__icon -->
                                <div class="counter-box__inner sec-title count-box">
                                    <h3 class="counter-box__count-text counter-box__count-text--one sec-title__heading count-text" data-stop="2" data-speed="1500">00</h3>
                                    <h3 class="counter-box__count-text sec-title__heading">k</h3>
                                </div><!-- /.counter-box__inner -->
                                <p class="counter-box__title">@lang('translation.customer_happy')</p>
                            </div>
                        </div><!-- /.col-xl-3 col-lg-3 col-6 -->
                        <div class="col-xl-3 col-lg-3 col-6 wow animated fadeInUp" data-wow-delay="0.5s" data-wow-duration="1500ms">
                            <div class="counter-box @@extraClassName">
                                <div class="counter-box__icon">
                                    <img src="assets/frontend/images/icons/hearts-icon.png" alt="destination">
                                </div><!-- /.counter-box__icon -->
                                <div class="counter-box__inner sec-title count-box">
                                    <h3 class="counter-box__count-text counter-box__count-text--one sec-title__heading count-text" data-stop="98.2" data-speed="1500">00</h3>
                                    <h3 class="counter-box__count-text sec-title__heading">%</h3>
                                </div><!-- /.counter-box__inner -->
                                <p class="counter-box__title">@lang('translation.satisfaction_rate')</p>
                            </div>
                        </div><!-- /.col-xl-3 col-lg-3 col-6 -->
                        <div class="col-xl-3 col-lg-3 col-6 wow animated fadeInUp" data-wow-delay="0.7s" data-wow-duration="1500ms">
                            <div class="counter-box counter-box--no-border">
                                <div class="counter-box__icon">
                                    <img src="assets/frontend/images/icons/star-icon.png" alt="destination">
                                </div><!-- /.counter-box__icon -->
                                <div class="counter-box__inner sec-title count-box">
                                    <h3 class="counter-box__count-text counter-box__count-text--one sec-title__heading count-text" data-stop="10" data-speed="1500">00</h3>
                                    <h3 class="counter-box__count-text sec-title__heading">+</h3>
                                </div><!-- /.counter-box__inner -->
                                <p class="counter-box__title">@lang('translation.service_years')</p>
                            </div>
                        </div><!-- /.col-xl-3 col-lg-3 col-6 -->
                    </div><!-- /.row -->
                </div><!-- /.counter-one__container container-fluid -->
            </div><!-- /.container -->
        </div><!-- /.counter-one__main-content -->
    </section>
    <!-- Counter One End -->

    <!-- Guide One Start -->
    <section class="guide-one section-space-bottom" id="gallery_about_us">
        <div class="container">
            <div class="sec-title text-center">

                <p class="sec-title__tagline">@lang('translation.our_photos')</p><!-- /.sec-title__tagline -->

                <h2 class="sec-title__title">@lang('translation.experience_elon')</h2><!-- /.sec-title__title -->
            </div><!-- /.sec-title --><!-- /.sec-title -->
            <h4 class="title-about-us">@lang('translation.photo_lib')</h4>
            <div class="guide-one__carousel trevlo-owl__carousel trevlo-owl__carousel--basic-nav owl-theme owl-carousel" data-owl-options='{
            "items": 3,
            "margin": 30,
            "smartSpeed": 700,
            "loop":false,
            "autoplay": 6000,
            "nav":false,
            "dots":true,
            "navText": ["<span class=\"fa fa-angle-left\"></span>","<span class=\"fa fa-angle-right\"></span>"],
            "responsive":{
                "0":{
                    "items": 1
                },
                "768":{
                    "items": 2
                },
                "992":{
                    "items": 3
                }
            }
            }'>
                <div class="guide-one__carousel-item item">
                    <div class="guide-single-">
                        <div class="guide-single__image-box">
                            <img src="assets/frontend/images/about/about-us-images-1.png" alt="assets/frontend/images/about/about-us-images-1.png" class="guide-single__image">
                        </div><!-- /.guide-single__image-box -->
                    </div><!-- /.guide-single -->
                </div><!-- /.guide-one__carousel-item item -->
                <div class="guide-one__carousel-item item">
                    <div class="guide-single-">
                        <div class="guide-single__image-box">
                            <img src="assets/frontend/images/about/about-us-images-2.png" alt="assets/frontend/images/about/about-us-images-2.png" class="guide-single__image">
                        </div><!-- /.guide-single__image-box -->
                    </div><!-- /.guide-single -->
                </div><!-- /.guide-one__carousel-item item -->
                <div class="guide-one__carousel-item item">
                    <div class="guide-single-">
                        <div class="guide-single__image-box">
                            <img src="assets/frontend/images/about/about-us-images-3.png" alt="assets/frontend/images/about/about-us-images-3.png" class="guide-single__image">
                        </div><!-- /.guide-single__image-box -->
                    </div><!-- /.guide-single -->
                </div><!-- /.guide-one__carousel-item item -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section>
    <!-- Guide One End -->

    <section class="guide-one section-space-bottom">
        <div class="container">
            <div class="sec-title text-center">

                <p class="sec-title__tagline">@lang('translation.our_address')</p><!-- /.sec-title__tagline -->

                <h2 class="sec-title__title">@lang('translation.visit_us')</h2><!-- /.sec-title__title -->
            </div><!-- /.sec-title --><!-- /.sec-title -->
            <div>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3905.160006674467!2d108.33790847594491!3d11.824064988395646!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3171415c4a847499%3A0x3bac5cf6af75a94a!2sElon%20Farm!5e0!3m2!1svi!2s!4v1737520075800!5m2!1svi!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>
@endsection
@section('scripts')

@endsection

