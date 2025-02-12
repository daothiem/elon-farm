@extends('frontend.layouts.master')
@section('title')
    Elon-farm | Home page
@endsection
@section('css')

@endsection
@section('main-content')
    <!-- main-slider-start -->
        <section class="main-slider-four" id="home">
            <div class="main-slider-four__carousel trevlo-owl__carousel owl-carousel owl-theme" data-owl-options='{
		"items": 1,
		"margin": 0,
		"loop": true,
		"smartSpeed": 700,
		"animateOut": "fadeOut",
		"autoplayTimeout": 5000,
		"nav": true,
		"navText": ["<span class=\"icon-left-arrow\"></span>","<span class=\"icon-right-arrow\"></span>"],
		"dots": false,
		"autoplay": true
		}'>
                <div class="item">
                    <div class="main-slider-four__image" style="background-image: url(assets/frontend/images/backgrounds/slider-5-1.jpeg);"></div>
                    <div class="container">
                        <div class="main-slider-four__row row gutter-y-50 align-items-center justify-content-center">
                            <div class="col-xl-9 col-lg-8 w-100 px-5">
                                <div class="main-slider-four__content text-center">
                                    <h3 class="main-slider-four__title">@lang('translation.elon_with_love')</h3>
                                    <p class="main-slider-four__text mb-5">@lang('translation.elon_with_love_content')</p><!-- /.main-slider-four__text -->
                                    <div class="main-slider-five__button">
                                        <a href="/robusta-vietnam"
                                        class="trevlo-btn trevlo-btn--two trevlo-btn--base custom-slider-button">
                                            <span>@lang('translation.explore_farm')</span>
                                            <i class="trevlo-one-icon-up-right-arrow"></i>
                                        </a><!-- /.trevlo-btn -->
                                    </div><!-- /.main-slider-five__button -->
                                </div>
                            </div><!-- /.col-xl-9 col-lg-4 -->
                        </div><!-- /.row -->
                    </div>
                </div><!-- end item 1 -->
                <div class="item">
                    <div class="main-slider-four__image" style="background-image: url(assets/frontend/images/backgrounds/slider-5-2.jpeg);"></div>
                    <div class="container">
                        <div class="main-slider-four__row row gutter-y-50 align-items-center justify-content-center">
                            <div class="col-xl-9 col-lg-8 w-100 px-5">
                                <div class="main-slider-four__content text-center">
                                    <h3 class="main-slider-four__title">@lang('translation.cultivating_quality')</h3>
                                    <p class="main-slider-four__text mb-5">@lang('translation.cultivating_quality_content')</p><!-- /.main-slider-four__text -->
                                    <div class="main-slider-five__button">
                                        <a href="/robusta-vietnam"
                                        class="trevlo-btn trevlo-btn--two trevlo-btn--base custom-slider-button">
                                            <span>@lang('translation.explore_farm')</span>
                                            <i class="trevlo-one-icon-up-right-arrow"></i>
                                        </a><!-- /.trevlo-btn -->
                                    </div><!-- /.main-slider-five__button -->
                                </div>
                            </div><!-- /.col-xl-9 col-lg-4 -->
                        </div><!-- /.row -->
                    </div>
                </div><!-- end item 2 -->

                <div class="item">
                    <div class="main-slider-four__image" style="background-image: url(assets/frontend/images/backgrounds/slider-5-3.jpeg);"></div>
                    <div class="container">
                        <div class="main-slider-four__row row gutter-y-50 align-items-center justify-content-center">
                            <div class="col-xl-9 col-lg-8 w-100 px-5">
                                <div class="main-slider-four__content text-center">
                                    <h3 class="main-slider-four__title">@lang('translation.the_heart')</h3>
                                    <p class="main-slider-four__text mb-5">@lang('translation.the_heart_content')</p><!-- /.main-slider-four__text -->
                                    <div class="main-slider-five__button">
                                        <a href="/robusta-vietnam"
                                        class="trevlo-btn trevlo-btn--two trevlo-btn--base custom-slider-button">
                                            <span>@lang('translation.explore_farm')</span>
                                            <i class="trevlo-one-icon-up-right-arrow"></i>
                                        </a><!-- /.trevlo-btn -->
                                    </div><!-- /.main-slider-five__button -->
                                </div>
                            </div><!-- /.col-xl-9 col-lg-4 -->
                        </div><!-- /.row -->
                    </div>
                </div><!-- end item 3 -->

                <div class="item">
                    <div class="main-slider-four__image" style="background-image: url(assets/frontend/images/backgrounds/slider-5-4.jpeg);"></div>
                    <div class="container">
                        <div class="main-slider-four__row row gutter-y-50 align-items-center justify-content-center">
                            <div class="col-xl-9 col-lg-8 w-100 px-5">
                                <div class="main-slider-four__content text-center">
                                    <h3 class="main-slider-four__title">@lang('translation.beyond_coffee')</h3>
                                    <p class="main-slider-four__text mb-5">@lang('translation.beyond_coffee_content')</p><!-- /.main-slider-four__text -->
                                    <div class="main-slider-five__button">
                                        <a href="/robusta-vietnam"
                                        class="trevlo-btn trevlo-btn--two trevlo-btn--base custom-slider-button">
                                            <span>@lang('translation.explore_farm')</span>
                                            <i class="trevlo-one-icon-up-right-arrow"></i>
                                        </a><!-- /.trevlo-btn -->
                                    </div><!-- /.main-slider-five__button -->
                                </div>
                            </div><!-- /.col-xl-9 col-lg-4 -->
                        </div><!-- /.row -->
                    </div>
                </div><!-- end item 4 -->

                <div class="item">
                    <div class="main-slider-four__image" style="background-image: url(assets/frontend/images/backgrounds/slider-5-5.jpeg);"></div>
                    <div class="container">
                        <div class="main-slider-four__row row gutter-y-50 align-items-center justify-content-center">
                            <div class="col-xl-9 col-lg-8 w-100 px-5">
                                <div class="main-slider-four__content text-center">
                                    <h3 class="main-slider-four__title">@lang('translation.more_than_tour') </h3>
                                    <p class="main-slider-four__text mb-5">@lang('translation.more_than_tour_content')</p><!-- /.main-slider-four__text -->
                                    <div class="main-slider-five__button">
                                        <a href="/robusta-vietnam"
                                        class="trevlo-btn trevlo-btn--two trevlo-btn--base custom-slider-button">
                                            <span>@lang('translation.explore_farm')</span>
                                            <i class="trevlo-one-icon-up-right-arrow"></i>
                                        </a><!-- /.trevlo-btn -->
                                    </div><!-- /.main-slider-five__button -->
                                </div>
                            </div><!-- /.col-xl-9 col-lg-4 -->
                        </div><!-- /.row -->
                    </div>
                </div><!-- end item 5 -->

            </div><!-- banner-slider -->
            <div class="banner-form banner-form--two banner-form--three wow fadeInUp" data-wow-delay="300ms">
            <div class="container">
                <form class="banner-form__wrapper" action="/">
                    <div class="row m-0">
                        <div class="banner-form__col banner-form__col--1 margin-24">
                            <div class="banner-form__control banner-form__control--traveler d-flex gap-3">
                                <div class="banner-form__icon">
                                    <img src="assets/frontend/images/about/tour-icon.svg" alt="about">
                                </div><!-- /.banner-form__icon -->
                                <div class="flex-fill">
                                    <label for="location">Tour</label>
                                    <select name="location" class="selectpicker" id="location">
                                        <option value="fullDay">@lang('translation.full_day_tour')</option>
                                        <option value="halfDay">@lang('translation.half_day_tour')</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="banner-form__col banner-form__col--2 margin-24">
                            <div class="banner-form__control d-flex gap-3">
                                <div class="banner-form__icon">
                                    <img src="assets/frontend/images/about/date-icon.svg" alt="about">
                                </div><!-- /.banner-form__icon -->
                                <div class="flex-fill">
                                    <label for="date">@lang('translation.preferred_tour_date')</label>
                                        <input class="trevlo-multi-datepicker" id="date" type="text" name="date"
                                            placeholder="@lang('translation.select_date')">
                                </div>
                                <span class="trevlo-one-icon-chevron-down banner-form__datepicker-icon position-relative"></span>
                            </div>
                        </div>
                        <div class="banner-form__col banner-form__col--3  margin-24">
                            <div class="banner-form__control banner-form__control--traveler d-flex gap-3">
                                <div class="banner-form__icon">
                                    <img src="assets/frontend/images/about/pax-icon.svg" alt="about">
                                </div>
                                <div class="flex-fill">
                                    <label for="guests">@lang('translation.pax')</label>
                                    <input id="guests" type="number" value="2" name="guests" placeholder="2">
                                </div>
                                <div class="d-flex gap-1">
                                    <button class="banner-form__qty-minus sub minusPax position-relative">
                                        <i class="icon-minus-3"></i>
                                    </button>
                                    <button class="banner-form__qty-plus add addPax position-relative">
                                        <i class="icon-plus-3"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="banner-form__col banner-form__col--4 margin-24">
                            <div class="banner-form__control d-flex gap-3">
                                <div class="banner-form__icon">
                                    <img src="assets/frontend/images/about/transport-icon.svg" alt="about">
                                </div><!-- /.banner-form__icon -->
                                <div class="flex-fill">
                                    <label for="type">@lang('translation.transportation')</label>
                                    <select name="type" class="selectpicker" id="type">
                                        <option value="yes">@lang('translation.yes')</option>
                                        <option value="no">@lang('translation.no')</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="banner-form__col banner-form__col--5">
                            <button type="submit" aria-label="search submit" class="trevlo-btn trevlo-btn--base">
                                <span>@lang('translation.book_now')</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- banner-form -->
        </section>
        <!-- main-slider-end -->

    <section class="about-six section-space">
        <div class="container">
            <div class="row gutter-y-50">
                <div class="col-lg-6 wow fadeInLeft" data-wow-duration="1500ms">
                    <div class="about-six__image">
                        <div class="about-six__image__one">
                            <img src="assets/frontend/images/about/about-6-3.png" alt="about">
                        </div><!-- /.about-six__image__one -->
                        <div class="about-six__image__two">
                            <img src="assets/frontend/images/about/about-6-4.png" alt="about">
                            <a href="https://www.youtube.com/watch?v=h9MbznbxlLc" class="video-btn video-popup">
                                <i class="fas fa-play"></i>
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                            </a>
                        </div>
                    </div><!-- /.about-six__image -->
                </div><!-- /.col-lg-6 -->
                <div class="col-lg-6">
                    <div class="about-six__content">
                        <div class="sec-title sec-title--two text-left">

                            <p class="sec-title__tagline">@lang('translation.our_story')</p><!-- /.sec-title__tagline -->

                            <h2 class="sec-title__title">@lang('translation.we_strive')</h2>
                            <!-- /.sec-title__title -->
                        </div><!-- /.sec-title -->
                        <p class="about-six__text wow fadeInUp" data-wow-duration="1500ms">@lang('translation.located_in')</p>
                        <!-- /.about-six__text -->
                        <div class="about-six__inner d-flex flex-column align-items-center">
                            <div class="about-six__box wow fadeInUp" data-wow-duration="1500ms">
                                <div class="about-six__box__icon"><img src="assets/frontend/images/about/coffee-icon.svg" alt="about"></div>
                                <div class="about-six__box__content">
                                    <h3 class="about-six__box__title">@lang('translation.vietnam_leadership')</h3>
                                    <p class="about-six__box__text">@lang('translation.by_refining')</p>
                                </div><!-- /.about-six__box__content -->
                            </div><!-- /.about-box -->
                            <div class="about-six__box wow fadeInUp mb-3" data-wow-duration="1500ms">
                                <div class="about-six__box__icon"><img src="assets/frontend/images/about/coffee-icon.svg" alt="about"></div>
                                <div class="about-six__box__content">
                                    <h3 class="about-six__box__title">@lang('translation.connecting_people')</h3>
                                    <p class="about-six__box__text">@lang('translation.through_immersive')</p>
                                </div><!-- /.about-six__box__content -->
                            </div><!-- /.about-box -->
                            <a href="/robusta-vietnam" class="trevlo-btn trevlo-btn--two trevlo-btn--base w-50">
                                <span>@lang('translation.more_about_us')</span>
                                <i class="trevlo-one-icon-up-right-arrow"></i>
                            </a><!-- /.trevlo-btn -->
                        </div><!-- /.about-six__inner -->
                        <div class="about-six__bottom wow fadeInUp" data-wow-duration="1500ms">
                            <div class="about-six__phone">
                                <div class="about-six__phone__icon">
                                    <img src="assets/frontend/images/about/whapsapp-icon.svg" alt="about">
                                </div>
                                <div class="about-six__phone__text">
                                    <p class="about-six__phone__title">@lang('translation.chat_whatsapp')</p>
                                    <h4 class="about-six__phone__number"><a href="tel:+84969285991">(+84) 969285991</a>
                                    </h4>
                                </div>
                            </div><!-- /.about-six__phone -->
                            <div class="about-six__phone">
                                <div class="about-six__phone__icon">
                                    <img src="assets/frontend/images/about/zalo-icon.svg" alt="about">
                                </div>
                                <div class="about-six__phone__text">
                                    <p class="about-six__phone__title">@lang('translation.chat_zalo')</p>
                                    <h4 class="about-six__phone__number"><a href="tel:+84397529379">(+84) 397529379</a>
                                    </h4>
                                </div>
                            </div><!-- /.about-six__phone -->
                        </div><!-- /.about-five__bottom -->
                    </div><!-- /.about-six__content -->
                </div><!-- /.col-lg-6 -->
            </div><!-- /.row gutter-y-40 -->
        </div><!-- /.container -->
        <img src="assets/frontend/images/shapes/about-mountain-6-1.png" alt="mountain" class="about-six__mountain">
        <section class="gallery-one gallery-one--home-two position-absolute w-100">
            <div class="container">
                <div class="gallery-one__carousel trevlo-owl__carousel trevlo-owl__carousel--basic-nav owl-carousel" data-owl-options='{
            "loop": true,
            "items": 5,
            "autoplay": true,
            "smartSpeed": 600,
            "nav": false,
            "navText": ["<span class=\"icon-left-arrow\"></span>","<span class=\"icon-right-arrow\"></span>"],
            "dots": true,
            "margin": 10,
            "responsive": {
                "0": {
                    "items": 1
                },
                "576": {
                    "items": 2
                },
                "992": {
                    "items": 3
                },
                "1200": {
                    "items": 4
                },
                "1400": {
                    "items": 5
                }
            }
            }'>
                    <div class="item">
                        <div class="gallery-single">
                            <div class="gallery-single__img-box">
                            <img src="assets/frontend/images/about/gallery-1-1.png" alt="gallery">
                            </div><!-- /.gallery-single__img-box -->
                        </div><!-- /.gallery-single -->
                    </div><!-- /.item -->
                    <div class="item">
                        <div class="gallery-single">
                            <div class="gallery-single__img-box">
                            <img src="assets/frontend/images/about/gallery-1-2.png" alt="gallery">
                            </div><!-- /.gallery-single__img-box -->
                        </div><!-- /.gallery-single -->
                    </div><!-- /.item -->
                    <div class="item">
                        <div class="gallery-single">
                            <div class="gallery-single__img-box">
                            <img src="assets/frontend/images/about/gallery-1-3.png" alt="gallery">
                            </div><!-- /.gallery-single__img-box -->
                        </div><!-- /.gallery-single -->
                    </div><!-- /.item -->
                    <div class="item">
                        <div class="gallery-single">
                            <div class="gallery-single__img-box">
                            <img src="assets/frontend/images/about/gallery-1-4.png" alt="gallery">
                            </div><!-- /.gallery-single__img-box -->
                        </div><!-- /.gallery-single -->
                    </div><!-- /.item -->
                    <div class="item">
                        <div class="gallery-single">
                            <div class="gallery-single__img-box">
                            <img src="assets/frontend/images/about/gallery-1-5.png" alt="gallery">
                            </div><!-- /.gallery-single__img-box -->
                        </div><!-- /.gallery-single -->
                    </div><!-- /.item -->
                </div>
            </div>
        </section>
    </section><!-- /.about-six section-space -->
    <section class="tab-one" id="adventure">
        <div class="tab-one__bg" style="background-image: url(assets/images/shapes/tab-bg-1.png);"></div>
        <div class="container">
            <div class="sec-title--two text-left d-flex mx-4 align-items-center pb-3 border-bottom">
                <div class="flex-fill">
                    <p class="sec-title__tagline">@lang('translation.our_coffee')</p>
                    <h2 class="sec-title__title title-made-by">@lang('translation.made_by_us')</h2>
                </div>
                <a href="/robusta-vietnam" class="h-fit-content ">
                    <span>@lang('translation.read_more')</span>
                    <i class="trevlo-one-icon-up-right-arrow"></i>
                </a><!-- /.trevlo-btn -->
            </div><!-- /.sec-title -->
            <p class="about-six__box__text my-4">@lang('translation.we-are')</p>
            <div class="row tabs-box">
                <div class="col-xl-5 col-lg-5">
                    <ul class="list-unstyled tab-buttons tab-one__list">
                        <li data-tab="#tent_camping" class="tab-btn active-btn"><img src="assets/frontend/images/about/tab1-mbu.svg" alt="gallery" class="logo-img">@lang('translation.selection_of')</li>
                        <li data-tab="#adventure_travel" class="tab-btn"><img src="assets/frontend/images/about/tab2-mbu.svg" alt="gallery" class="logo-img">@lang('translation.natural_process')</li>
                        <li data-tab="#mountain_biking" class="tab-btn"><img src="assets/frontend/images/about/tab3-mbu.svg" alt="gallery" class="logo-img">@lang('translation.full-washed')</li>
                        <li data-tab="#discovery_world" class="tab-btn"><img src="assets/frontend/images/about/tab4-mbu.svg" alt="gallery" class="logo-img">@lang('translation.honey_process')</li>
                        <li data-tab="#fishing_swimming" class="tab-btn"><img src="assets/frontend/images/about/tab5-mbu.svg" alt="gallery" class="logo-img">@lang('translation.experimental_processes')</li>
                        <li data-tab="#paragliding_tours" class="tab-btn"><img src="assets/frontend/images/about/tab6-mbu.svg" alt="gallery" class="logo-img">@lang('translation.final_drying')</li>
                    </ul><!-- /.list-unstyledf -->
                </div>
                <div class="col-xl-7 col-lg-7">
                    <div class="tabs-content">
                        <div class="tab fadeInUp animated active-tab" id="tent_camping">
                            <div class="tab-one__content">
                                <div class="tab-one__content__img">
                                    <img src="assets/frontend/images/about/tab-1-1.png" alt="tab">
                                </div>
                                <h4 class="tab-one__content__title">1. @lang('translation.selection_of')</h4>
                                <p class="tab-one__content__text">
                                    @lang('translation.we_carefully')
                                </p>
                                <ul class="tab-one__content__list">
                                    <li><span class="far fa-check-circle"></span>@lang('translation.ripeness_checked')</li>
                                    <li><span class="far fa-check-circle"></span>@lang('translation.impurities_inspected')</li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="tab fadeInUp animated" id="adventure_travel">
                            <div class="tab-one__content">
                                <div class="tab-one__content__img">
                                    <img src="assets/frontend/images/about/tab-1-2.png" alt="tab">
                                </div>
                                <h4 class="tab-one__content__title">2. @lang('translation.natural_process')</h4>
                                <p class="tab-one__content__text">
                                    @lang('translation.bold_naturally')
                                </p>
                                <ul class="tab-one__content__list">
                                    <li><span class="far fa-check-circle"></span>@lang('translation.sunlight_exposure')</li>
                                    <li><span class="far fa-check-circle"></span>@lang('translation.drying_monitored')</li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="tab fadeInUp animated" id="mountain_biking">
                            <div class="tab-one__content">
                                <div class="tab-one__content__img">
                                    <img src="assets/frontend/images/about/tab-1-3.png" alt="tab">
                                </div>
                                <h4 class="tab-one__content__title">3. @lang('translation.full-washed')</h4>
                                <p class="tab-one__content__text">
                                    @lang('translation.clean_bright')
                                </p>
                                <ul class="tab-one__content__list">
                                    <li><span class="far fa-check-circle"></span>@lang('translation.fermentation_time')</li>
                                    <li><span class="far fa-check-circle"></span>@lang('translation.cleanliness_checked')</li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="tab fadeInUp animated" id="discovery_world">
                            <div class="tab-one__content">
                                <div class="tab-one__content__img">
                                    <img src="assets/frontend/images/about/tab-1-4.png" alt="tab">
                                </div>
                                <h4 class="tab-one__content__title">4. @lang('translation.honey_process')</h4>
                                <p class="tab-one__content__text">
                                    @lang('translation.sweet_smooth')
                                </p>
                                <ul class="tab-one__content__list">
                                    <li><span class="far fa-check-circle"></span>@lang('translation.ingredient_ratios')</li>
                                    <li><span class="far fa-check-circle"></span>@lang('translation.flavor_testing')</li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="tab fadeInUp animated" id="fishing_swimming">
                            <div class="tab-one__content">
                                <div class="tab-one__content__img">
                                    <img src="assets/frontend/images/about/tab-1-5.png" alt="tab">
                                </div>
                                <h4 class="tab-one__content__title">5. @lang('translation.experimental_processes')</h4>
                                <p class="tab-one__content__text">
                                    @lang('translation.at_elon_farm')
                                </p>
                                <ul class="tab-one__content__list">
                                    <li><span class="far fa-check-circle"></span>@lang('translation.ingredient_ratios')</li>
                                    <li><span class="far fa-check-circle"></span>@lang('translation.consistency_across')</li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="tab fadeInUp animated" id="paragliding_tours">
                            <div class="tab-one__content">
                                <div class="tab-one__content__img">
                                    <img src="assets/frontend/images/about/tab-1-6.png" alt="tab">
                                </div>
                                <h4 class="tab-one__content__title">6. @lang('translation.final_drying')</h4>
                                <p class="tab-one__content__text">
                                    @lang('translation.the_bean')
                                </p>
                                <ul class="tab-one__content__list">
                                    <li><span class="far fa-check-circle"></span>@lang('translation.moisture_content')</li>
                                    <li><span class="far fa-check-circle"></span>@lang('translation.final_flavor')</li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <img src="assets/frontend/images/shapes/coffee-background.svg" alt="mountain" class="about-six__coffee">
        <img src="assets/frontend/images/shapes/leaf-background.svg" alt="mountain" class="about-six__leaf">
    </section>

    <div class="client-carousel @@extraClassName">
        <div class="container">
            <h5 class="client-carousel__title"><span>@lang('translation.our_partner')</span></h5>
            <div class="client-carousel__one trevlo-owl__carousel owl-theme owl-carousel" data-owl-options='{
        "items": 5,
        "margin": 65,
        "smartSpeed": 700,
        "loop":true,
        "autoplay": 6000,
        "nav":false,
        "dots":false,
        "navText": ["<span class=\"fa fa-angle-left\"></span>","<span class=\"fa fa-angle-right\"></span>"],
        "responsive":{
            "0":{
                "items":1,
                "margin": 0
            },
            "450":{
                "items":2,
                "margin": 0
            },
            "768":{
                "items":3,
                "margin": 40
            },
            "992":{
                "items": 4,
                "margin": 40
            },
            "1200":{
                "items": 5
            }
        }
        }'>
                <div class="client-carousel__one__item">
                    <img src="assets/frontend/images/partner-1.svg" alt="Elon Farm HTML" />
                </div><!-- /.owl-slide-item-->
                <div class="client-carousel__one__item">
                    <img src="assets/frontend/images/partner-2.svg" alt="Elon Farm HTML" />
                </div><!-- /.owl-slide-item-->
                <div class="client-carousel__one__item">
                    <img src="assets/frontend/images/partner-3.svg" alt="Elon Farm HTML" />
                </div><!-- /.owl-slide-item-->
                <div class="client-carousel__one__item">
                    <img src="assets/frontend/images/partner-4.svg" alt="Elon Farm HTML" />
                </div><!-- /.owl-slide-item-->
                <div class="client-carousel__one__item">
                    <img src="assets/frontend/images/partner-5.svg" alt="Elon Farm HTML" />
                </div><!-- /.owl-slide-item-->

            </div><!-- /.thm-owl__slider -->
        </div><!-- /.container -->
    </div><!-- /.client-carousel -->
    <!-- tab-section-end -->

     <div class="blog-three section-space-top mb-5" id="blog">
        <div class="container">
            <div class="blog-three__top">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="sec-title sec-title--two text-left">

                            <p class="sec-title__tagline">@lang('translation.latest_blog')</p><!-- /.sec-title__tagline -->

                            <h2 class="sec-title__title">@lang('translation.latest_news')</h2><!-- /.sec-title__title -->
                        </div><!-- /.sec-title -->
                    </div><!-- /.col-lg-8 -->
                    <div class="col-lg-4">
                        <div class="blog-three__button">
                            <a href="#" class="h-fit-content ">
                                <span>@lang('translation.all_blog')</span>
                                <i class="trevlo-one-icon-up-right-arrow"></i>
                            </a><!-- /.trevlo-btn -->
                        </div><!-- /.blog-three__button -->
                    </div><!-- /.col-lg-4 -->
                </div><!-- /.row -->
            </div><!-- /.blog-three__top -->
            <div class="row gutter-y-30">
                @if(isset($news[0]))
                <div class="col-lg-6 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                    <div class="blog-three__card blog-three__card--one">
                        <div class="blog-three__card__image">
                            <img src="{{ asset($news[0]['avatar']) }}" alt="{{ $news[0]['title'] }}">
                            <div class="blog-three__card__date">
                                <span class="blog-three__card__date__day">{{ \Carbon\Carbon::parse($news[0]['created_at'])->format('d') }}</span>
                                <span class="blog-three__card__date__month">{{ \Carbon\Carbon::parse($news[0]['created_at'])->format('M') }}</span>
                            </div>
                        </div><!-- /.blog-three__card__image -->
                        <div class="blog-three__card__content">
                            <ul class="list-unstyled blog-three__card__meta">
                                <li>
                                    <a href="/{{ $news[0]['alias'] }}">
                                        <span class="blog-three__card__meta__icon">
                                            <i class="trevlo-one-icon-user"></i>
                                        </span>
                                        @lang('translation.by') {{ $news[0]['createdBy']['name'] }}
                                    </a>
                                </li>
                            </ul>
                            <h3 class="blog-three__card__title"><a href="/{{ $news[0]['alias'] }}">{{ $news[0]['title'] }}</a></h3><!-- /.blog-three__card__title -->
                        </div><!-- /.blog-three__card__content -->
                    </div><!-- /.blog-three__card -->
                </div><!-- /.col-lg-6 -->
                @endif
                <div class="col-lg-6">
                    <div class="blog-three__inner">
                        <div class="blog-three__inner__card">
                            @foreach(array_slice($news->toArray(), 1, 2) as $item)
                            <div class="blog-three__card blog-three__card--two wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="100ms">
                                <div class="blog-three__card__image">
                                    <img src="{{ asset($item['avatar']) }}" alt="{{ $item['title'] }}">
                                </div><!-- /.blog-three__card__image -->
                                <div class="blog-three__card__content">
                                    <ul class="list-unstyled blog-three__card__meta">
                                        <li>
                                            <a href="/{{ $item['alias'] }}">
                                                <span class="blog-three__card__meta__icon">
                                                    <i class="trevlo-one-icon-user"></i>
                                                </span>
                                                @lang('translation.by') {{ $item['created_by']['name'] ?? 'Unknown' }}
                                            </a>
                                        </li>
                                    </ul>
                                    <h3 class="blog-three__card__title"><a href="/{{ $item['alias'] }}">{{ $item['title'] }}</a></h3><!-- /.blog-three__card__title -->
                                    <div class="blog-three__card__date">
                                        <span class="blog-three__card__date__day">{{ \Carbon\Carbon::parse($item['created_at'])->format('d') }}</span>
                                        <span class="blog-three__card__date__month">{{ \Carbon\Carbon::parse($item['created_at'])->format('M') }}</span>
                                    </div>
                                </div><!-- /.blog-three__card__content -->
                            </div><!-- /.blog-three__card -->
                            @endforeach
                        </div><!-- /.blog-three__inner__card -->
                    </div><!-- /.blog-three__inner -->
                </div><!-- /.col-lg-6 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.blog-three section-space-top -->

    <section class="testimonial-three section-space-bottom" id="testimonials">
        <div class="testimonial-three__bg" style="background-image: url(assets/images/shapes/testimonial-bg-3-1.png);">
        </div><!-- /.testimonial-three__bg -->
        <div class="container">
            <div class="sec-title sec-title--two text-center">

                <p class="sec-title__tagline">@lang('translation.our_feedback')</p><!-- /.sec-title__tagline -->

                <h2 class="sec-title__title">@lang('translation.what_people_say')</h2><!-- /.sec-title__title -->
            </div><!-- /.sec-title -->
            <!-- /.sec-title -->
            <div class="testimonial-three__carousel trevlo-owl__carousel trevlo-owl__carousel--basic-nav trevlo-owl__carousel--with-shadow owl-theme owl-carousel" data-owl-options='{
        "items": 3,
        "margin": 30,
        "smartSpeed": 700,
        "loop":true,
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
            "1200":{
                "items": 3,
                "dots": false
            }
        }
        }'>
                <div class="item wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                    <div class="testimonials-card-three">
                        <div class="testimonials-card-three__image">
                            <img src="assets/frontend/images/about/blog-1.png" alt="tab">
                        </div>
                        <div class="testimonials-card-three__inner">
                            <div class="testimonials-card-three__quote-icon">
                                <span class="trevlo-one-icon-quote"></span>
                            </div><!-- /.testimonials-card-three__quote-icon -->
                            <div class="testimonials-card-three__identity">
                                <h5 class="testimonials-card-three__identity__name">Anna Thompson</h5>
                                <p class="testimonials-card-three__identity__designation">Yorkshire, UK</p>
                            </div><!-- /.testimonials-card-three__identity -->
                            <p class="testimonials-card-three__quote">@lang('translation.anna_thompson')</p><!-- /.testimonials-card-three__quote -->
                            <div class="trevlo-ratings">
                                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                            </div>
                        </div><!-- /.testimonials-card-three__inner -->
                    </div><!-- /.testimonials-card-three -->
                </div><!-- /.owl-slide-item-->
                <div class="item wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="100ms">
                    <div class="testimonials-card-three">
                        <div class="testimonials-card-three__image">
                            <img src="assets/frontend/images/about/blog-1.png" alt="tab">
                        </div>
                        <div class="testimonials-card-three__inner">
                            <div class="testimonials-card-three__quote-icon">
                                <span class="trevlo-one-icon-quote"></span>
                            </div><!-- /.testimonials-card-three__quote-icon -->
                            <div class="testimonials-card-three__identity">
                                <h5 class="testimonials-card-three__identity__name">Liam Anderson</h5>
                                <p class="testimonials-card-three__identity__designation">Victoria, Australia</p>
                            </div><!-- /.testimonials-card-three__identity -->
                            <p class="testimonials-card-three__quote">@lang('translation.liam_anderson')</p><!-- /.testimonials-card-three__quote -->
                            <div class="trevlo-ratings">
                                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                            </div>
                        </div><!-- /.testimonials-card-three__inner -->
                    </div><!-- /.testimonials-card-three -->
                </div><!-- /.owl-slide-item-->
                <div class="item wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="200ms">
                    <div class="testimonials-card-three">
                        <div class="testimonials-card-three__image">
                            <img src="assets/frontend/images/about/blog-1.png" alt="tab">
                        </div>
                        <div class="testimonials-card-three__inner">
                            <div class="testimonials-card-three__quote-icon">
                                <span class="trevlo-one-icon-quote"></span>
                            </div><!-- /.testimonials-card-three__quote-icon -->
                            <div class="testimonials-card-three__identity">
                                <h5 class="testimonials-card-three__identity__name">Michael Carter</h5>
                                <p class="testimonials-card-three__identity__designation">Ontario, Canada</p>
                            </div><!-- /.testimonials-card-three__identity -->
                            <p class="testimonials-card-three__quote">@lang('translation.michael_carter')</p><!-- /.testimonials-card-three__quote -->
                            <div class="trevlo-ratings">
                                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                            </div>
                        </div><!-- /.testimonials-card-three__inner -->
                    </div><!-- /.testimonials-card-three -->
                </div><!-- /.owl-slide-item-->
            </div><!-- /.thm-owl__slider -->
        </div><!-- /.container -->
    </section><!-- /.testimonial-three section-space-bottom -->

    <section class="tour-listing-four section-space" id="tour">
        <div class="container">
            <div class="tour-listing-four__top">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="sec-title sec-title--two text-left">

                            <p class="sec-title__tagline">@lang('translation.our_tours')</p><!-- /.sec-title__tagline -->

                            <h2 class="sec-title__title">@lang('translation.select_tour')</h2><!-- /.sec-title__title -->
                        </div><!-- /.sec-title -->
                    </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->
            </div><!-- /.tour-listing-four__top -->
            <div class="tour-listing-four__inner">
                @foreach($tours as $tour)
                <div class="tour-listing-four__row">
                    <div class="tour-listing-four__content tour-listing-four__col wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                        <div class="tour-listing-four__ratings">
                            <div class="trevlo-ratings">
                                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                            </div>
                            <p class="tour-listing-four__ratings__text">4.9 (5)</p>
                        </div>
                        <h3 class="tour-listing-four__title"><a href="/{{ $tour['alias'] }}">{{ $tour['name'] }}</a>
                        </h3>
                        <p class="tour-listing-four__text">{!! $tour['description'] !!}</p><!-- /.tour-listing-four__text -->
                    </div>
                    <ul class="tour-listing-four__list tour-listing-four__col wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="100ms">
                        <li>
                            <div class="tour-listing-four__list__icon">
                                <i class="icon-clock-1"></i>
                            </div><!-- /.tour-listing-four__list__icon -->
                            @lang('translation.duration') <span>{{ $tour['duration'] }}</span>
                        </li>
                        <li>
                            <div class="tour-listing-four__list__icon">
                                <i class="trevlo-one-icon-paper-plane"></i>
                            </div><!-- /.tour-listing-four__list__icon -->
                            @lang('translation.tour_type') <span>{{ $tour['activity'] }}</span>
                        </li>
                        <li>
                            <div class="tour-listing-four__list__icon">
                                <i class="trevlo-one-icon-maps-and-flags"></i>
                            </div><!-- /.tour-listing-four__list__icon -->
                            @lang('translation.location') <span>{{ $tour['location'] }}</span>
                        </li>
                    </ul><!-- /.tour-listing-four__list -->
                    <div class="tour-listing-four__image tour-listing-four__col wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="200ms">
                        <div class="tour-listing-four__image__inner" style="background-image: url({{ asset($tour['images']) }});">
                            <div class="tour-listing-four__image__left">
                                <h3 class="tour-listing-four__image__title">@lang('translation.from')</h3>
                                <!-- /.tour-listing-four__image__title -->
                                <h3 class="tour-listing-four__image__price">{{ number_format($tour['price'], 0, ',', '.') }}đ</h3>
                                <!-- /.tour-listing-four__image__price -->
                            </div><!-- /.tour-listing-four__image__left -->
                            <a href="tour-listing-details-right.html" class="tour-listing-four__image__btn trevlo-btn trevlo-btn--white">
                                <i class="trevlo-one-icon-up-right-arrow"></i>
                            </a><!-- /.tour-listing-four__image__btn -->
                        </div><!-- /.tour-listing-four__image__inner -->
                    </div><!-- /.tour-listing-four__image -->
                </div><!-- /.tour-listing-four__row -->
                @endforeach
            </div><!-- /.tour-listing-four__inner -->
        </div><!-- /.container -->
    </section><!-- /.tour-listing-four section-space -->

    <section class="why-choose-five section-space">
        <div class="container">
            <div class="row gutter-y-40">
                <div class="col-lg-5 d-flex flex-column">
                    <div class="why-six__image__two mb-3">
                        <img src="assets/frontend/images/about/why-video.png" alt="about">
                        <a href="https://www.youtube.com/watch?v=h9MbznbxlLc" class="video-btn video-popup">
                            <i class="fas fa-play"></i>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </a>
                    </div>
                    <div class="trevlo-accrodion why-choose-five__faq" data-grp-name="why-choose-five__faq">
                        <div class="accrodion active wow animated fadeInUp" data-wow-delay="0s" data-wow-duration="1500ms">
                            <div class="accrodion-title">
                                <h4>@lang('translation.get_airport')</h4>
                            </div>
                            <div class="accrodion-content" style="display: none;">
                                <div class="inner">
                                    <p>@lang('translation.dalat_airport')</p>
                                </div>
                            </div>
                        </div>

                        <div class="accrodion wow animated fadeInUp" data-wow-delay="0.1s" data-wow-duration="1500ms">
                            <div class="accrodion-title">
                                <h4>@lang('translation.participate_activities')</h4>
                            </div>
                            <div class="accrodion-content">
                                <div class="inner">
                                    <p>@lang('translation.yes_activities')</p>
                                </div>
                            </div>
                        </div>

                        <div class="accrodion wow animated fadeInUp" data-wow-delay="0.2s" data-wow-duration="1500ms">
                            <div class="accrodion-title">
                                <h4>@lang('translation.are_meals')</h4>
                            </div>
                            <div class="accrodion-content" style="display: none;">
                                <div class="inner">
                                    <p>@lang('translation.yes_meal')</p>
                                </div>
                            </div>
                        </div>
                        <div class="accrodion wow animated fadeInUp" data-wow-delay="0.3s" data-wow-duration="1500ms">
                            <div class="accrodion-title">
                                <h4>@lang('translation.other_activities')</h4>
                            </div>
                            <div class="accrodion-content" style="display: none;">
                                <div class="inner">
                                    <p>@lang('translation.yes_other')</p>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.why-choose-five__faq -->
                </div><!-- /.col-lg-6 -->
                <div class="col-lg-7">
                    <div class="why-choose-five__content">
                        <div class="sec-title sec-title--two text-left">

                            <p class="sec-title__tagline">@lang('translation.get_know')</p><!-- /.sec-title__tagline -->

                            <h2 class="sec-title__title">@lang('translation.why_should_choose') <br> Elon Farm?</h2><!-- /.sec-title__title -->
                        </div><!-- /.sec-title -->
                        <div class="why-choose-five__text-box wow fadeInUp" data-wow-duration="1500ms">
                            <p class="why-choose-five__text">@lang('translation.why_choose_title')</p><!-- /.why-choose-five__text -->
                        </div><!-- /.why-choose-five__text-box -->
                        <div class="why-choose-five__inner">
                            <div class="why-choose-five__item wow fadeInUp" data-wow-duration="1500ms">
                                <div class="why-choose-five__item__left">
                                    <div class="why-choose-five__item__icon">
                                        <img src="assets/frontend/images/about/icon-why-choose.svg" alt="tab">
                                    </div><!-- /.why-choose-five__item__icon -->
                                    <h3 class="why-choose-five__item__title">@lang('translation.high_quality_robusta')</h3>
                                    <!-- /.why-choose-five__item__title -->
                                </div><!-- /.why-choose-five__item__left -->
                                <div class="why-choose-five__item__right">
                                    <p class="why-choose-five__item__text">@lang('translation.we_are_dedicated')</p><!-- /.why-choose-five__item__text -->
                                </div><!-- /.why-choose-five__item__right -->
                            </div><!-- /.why-choose-five__item -->
                            <div class="why-choose-five__item wow fadeInUp" data-wow-duration="1500ms">
                                <div class="why-choose-five__item__left">
                                    <div class="why-choose-five__item__icon">
                                        <img src="assets/frontend/images/about/icon-why-choose.svg" alt="tab">
                                    </div><!-- /.why-choose-five__item__icon -->
                                    <h3 class="why-choose-five__item__title">@lang('translation.natural_beauty')</h3>
                                    <!-- /.why-choose-five__item__title -->
                                </div><!-- /.why-choose-five__item__left -->
                                <div class="why-choose-five__item__right">
                                    <p class="why-choose-five__item__text">@lang('translation.nested_in')</p><!-- /.why-choose-five__item__text -->
                                </div><!-- /.why-choose-five__item__right -->
                            </div><!-- /.why-choose-five__item -->
                            <div class="why-choose-five__item wow fadeInUp" data-wow-duration="1500ms">
                                <div class="why-choose-five__item__left">
                                    <div class="why-choose-five__item__icon">
                                        <img src="assets/frontend/images/about/icon-why-choose.svg" alt="tab">
                                    </div><!-- /.why-choose-five__item__icon -->
                                    <h3 class="why-choose-five__item__title">@lang('translation.cultural_immersion')</h3>
                                    <!-- /.why-choose-five__item__title -->
                                </div><!-- /.why-choose-five__item__left -->
                                <div class="why-choose-five__item__right">
                                    <p class="why-choose-five__item__text">@lang('translation.our_tours_not')</p><!-- /.why-choose-five__item__text -->
                                </div><!-- /.why-choose-five__item__right -->
                            </div><!-- /.why-choose-five__item -->
                            <div class="why-choose-five__item wow fadeInUp" data-wow-duration="1500ms">
                                <div class="why-choose-five__item__left">
                                    <div class="why-choose-five__item__icon">
                                        <img src="assets/frontend/images/about/icon-why-choose.svg" alt="tab">
                                    </div><!-- /.why-choose-five__item__icon -->
                                    <h3 class="why-choose-five__item__title">@lang('translation.commit_sustainability')</h3>
                                    <!-- /.why-choose-five__item__title -->
                                </div><!-- /.why-choose-five__item__left -->
                                <div class="why-choose-five__item__right">
                                    <p class="why-choose-five__item__text">@lang('translation.we_prioritize')</p><!-- /.why-choose-five__item__text -->
                                </div><!-- /.why-choose-five__item__right -->
                            </div><!-- /.why-choose-five__item -->
                        </div><!-- /.why-choose-five__inner -->
                    </div><!-- /.why-choose-five__content -->
                </div><!-- /.col-lg-6 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.why-choose-five section-space -->

    <section class="why-choose-three">
        <div class="why-choose-three__bg" style="background-image: url(assets/images/shapes/why-choose-3-bg.png);"></div>
        <!-- /.why-choose__bg -->
        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <div class="why-choose-three__content">
                        <div class="sec-title text-left">
                            <p class="sec-title__tagline text-white">@lang('translation.our_tour')</p><!-- /.sec-title__tagline -->
                            <h2 class="sec-title__title text-white">@lang('translation.our_tour1')<br> @lang('translation.our_tour2')</h2><!-- /.sec-title__title -->
                        </div><!-- /.sec-title --><!-- /.sec-title -->
                        <p class="why-choose-three__content__text text-white">
                            @lang('translation.there_are_many')
                        </p>
                        <a href="/list-tour" class="trevlo-btn book-button">
                            <span>@lang('translation.book_now')</span>
                            <i class="trevlo-one-icon-up-right-arrow"></i>
                        </a><!-- /.trevlo-btn -->
                    </div>
                </div>
                <div class="col-xl-6 wow slideInRight" data-wow-delay="200ms">
                    <div class="trevlo-stretch-element-inside-column">
                        <div class="why-choose-three__image">
                            <img src="assets/frontend/images/about/why-choose.png" alt="tab">
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container -->
    </section><!-- /.why-choose-three -->
@endsection
@section('scripts')

@endsection
