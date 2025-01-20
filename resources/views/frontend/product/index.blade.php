@extends('frontend.layouts.master')
@section('title')
@endsection
@section('css')

    {{--<link rel="stylesheet" href="{{ asset('/assets/frontend/modules/product/js/sliderPro/css/examples.css') }}">
    <script type="text/javascript" src="{{ URL::asset('/assets/frontend/modules/product/js/productf80d.js?v=1675325662') }}"></script>--}}
    <link rel="stylesheet" href="{{ asset('/assets/frontend/modules/product/css/product2b98.css?v=1695650186') }}">
    <link rel="stylesheet" href="{{ asset('/assets/frontend/modules/product/js/fotorama/fotorama.css?v=1695650186') }}">
    <link rel="stylesheet" href="{{ asset('/assets/frontend/js/fancybox/jquery.fancybox.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/frontend/js/fancybox/helpers/jquery.fancybox-thumbs.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/frontend/modules/product/css/detailbfa9.css?v=1688292241') }}">
    <link rel="stylesheet" href="{{ asset('/assets/frontend/modules/product/js/easyzoom/css/easyzoom.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/frontend/modules/product/js/sliderPro/css/examples.css') }}">


    <script type="text/javascript"
            src="{{ URL::asset('/assets/frontend/modules/product/js/productf80d.js?v=1675325662') }}"></script>
    <script type="text/javascript"
            src="{{ URL::asset('/assets/frontend/modules/product/js/fotorama/fotorama.js') }}"></script>
    <script type="text/javascript"
            src="{{ URL::asset('/assets/frontend/js/fancybox/jquery.fancybox.pack.js') }}"></script>
    <script type="text/javascript"
            src="{{ URL::asset('/assets/frontend/js/fancybox/helpers/jquery.fancybox-thumbs.js') }}"></script>
    <script type="text/javascript"
            src="{{ URL::asset('/assets/frontend/modules/product/js/detail8b94.js?v=1668241950') }}"></script>
    <script type="text/javascript"
            src="{{ URL::asset('/assets/frontend/modules/product/js/easyzoom/easyzoom.js') }}"></script>
    <script type="text/javascript"
            src="{{ URL::asset('/assets/frontend/modules/product/js/sliderPro/js/jquery.sliderPro.min.js') }}"></script>

@endsection
@section('main-content')
    <section class="tour-listing-details tour-listing-details-right">
        <div class="tour-listing-details__top-carousel">
                <div class="background-header"></div>
                <div class="tour-listing-details__top-carousel-wrapper trevlo-owl__carousel owl-theme owl-carousel"  data-owl-options='{
        "items": 4,
        "margin": 20,
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
            "768":{
                "items": 2
            },
            "992":{
                "items": 3
            },
            "1300":{
                "items": 4,
                "dots": false
            }
        }
        }'>
                        <div class="tour-listing-details__top-carousel-item item">
                        <div class="tour-listing-details__top-carousel-image">
                                <img src="assets/frontend/images/about/gallery-1-5.png" alt="gallery">
                                <div class="tour-listing-details__top-carousel-overlay">
                                </div><!-- /.tour-listing-details__top-carousel-overlay -->
                        </div><!-- /.tour-listing-details__top-carousel-image -->
                        </div><!-- /.tour-listing-details__top-carousel-item item -->
                        <div class="tour-listing-details__top-carousel-item item">
                        <div class="tour-listing-details__top-carousel-image">
                                <img src="assets/frontend/images/about/gallery-1-5.png" alt="gallery">
                                <div class="tour-listing-details__top-carousel-overlay">
                                </div><!-- /.tour-listing-details__top-carousel-overlay -->
                        </div><!-- /.tour-listing-details__top-carousel-image -->
                        </div><!-- /.tour-listing-details__top-carousel-item item -->
                        <div class="tour-listing-details__top-carousel-item item">
                        <div class="tour-listing-details__top-carousel-image">
                                <img src="assets/frontend/images/about/gallery-1-5.png" alt="gallery">
                                <div class="tour-listing-details__top-carousel-overlay">
                                </div><!-- /.tour-listing-details__top-carousel-overlay -->
                        </div><!-- /.tour-listing-details__top-carousel-image -->
                        </div><!-- /.tour-listing-details__top-carousel-item item -->
                        <div class="tour-listing-details__top-carousel-item item">
                        <div class="tour-listing-details__top-carousel-image">
                                <img src="assets/frontend/images/about/gallery-1-5.png" alt="gallery">
                                <div class="tour-listing-details__top-carousel-overlay">
                                </div><!-- /.tour-listing-details__top-carousel-overlay -->
                        </div><!-- /.tour-listing-details__top-carousel-image -->
                        </div><!-- /.tour-listing-details__top-carousel-item item -->
                </div><!-- /.tour-listing-details__top-carousel-wrapper -->
        </div><!-- /.tour-listing-details__top-carousel -->
        <div class="tour-listing-details__destination">
                <div class="container">
                    <div class="tour-listing-details__destination-row row">
                        <div class="col-xl-4 wow animated fadeInLeft" data-wow-delay="0.1s" data-wow-duration="1500ms">
                            <div class="tour-listing-details__destination-left">
                                <h3 class="tour-listing-details__dastination-title">{{ $data['name'] }}</h3>
                                <h4 class="tour-listing-details__dastination-price"><span>{{ number_format($data['price'], 0, ',', '.') }}₫</span><span class="tour-listing-details__dastination-person">/ Per Person</span></h4>
                            </div><!-- /.tour-listing-details__daetination-left -->
                        </div><!-- /.col-xl-4 -->
                        <div class="col-xl-8">
                            <div class="tour-listing-details__destination-right">
                                <div class="tour-listing-details__destination-info wow animated fadeInUp" data-wow-delay="0.1s" data-wow-duration="1500ms">
                                    <img src="assets/frontend/images/about/clock-circle.svg" alt="tab">
                                    <div class="tour-listing-details__destination-info-title">
                                        <h4 class="tour-listing-details__destination-info-top">Duration</h4>
                                        <h4 class="tour-listing-details__destination-info-bottom">{{ $data['duration'] }}</h4>
                                    </div>
                                </div><!-- /.tour-listing-details__destination-info -->
                                <div class="tour-listing-details__destination-info wow animated fadeInUp" data-wow-delay="0.3s" data-wow-duration="1500ms">
                                    <img src="assets/frontend/images/about/coffee-circle.svg" alt="tab">
                                    <div class="tour-listing-details__destination-info-title">
                                        <h4 class="tour-listing-details__destination-info-top">Activity</h4>
                                        <h4 class="tour-listing-details__destination-info-bottom">{{ $data['activity'] }}</h4>
                                    </div>
                                </div><!-- /.tour-listing-details__destination-info -->
                                <div class="tour-listing-details__destination-info wow animated fadeInUp" data-wow-delay="0.5s" data-wow-duration="1500ms">
                                    <img src="assets/frontend/images/about/leaf-circle.svg" alt="tab">
                                    <div class="tour-listing-details__destination-info-title">
                                        <h4 class="tour-listing-details__destination-info-top">Nature</h4>
                                        <h4 class="tour-listing-details__destination-info-bottom">{{ $data['nature'] }}</h4>
                                    </div>
                                </div><!-- /.tour-listing-details__destination-info -->
                                <div class="tour-listing-details__destination-info wow animated fadeInUp" data-wow-delay="0.7s" data-wow-duration="1500ms">
                                    <img src="assets/frontend/images/about/location-circle.svg" alt="tab">
                                    <div class="tour-listing-details__destination-info-title">
                                        <h4 class="tour-listing-details__destination-info-top">Location</h4>
                                        <h4 class="tour-listing-details__destination-info-bottom">{{ $data['location'] }}</h4>
                                    </div>
                                </div><!-- /.tour-listing-details__destination-info -->
                            </div><!-- /.tour-listing-details__destination-right -->
                        </div><!-- /.col-xl-8 -->
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </div><!-- /.tour-listing-details__destination -->
            <div class="container">
                <div class="tour-listing-details__row row">
                    <div class="col-xl-8">
                        <div class="tour-listing-details__overview">
                            <div class="wow animated fadeIn animated" data-wow-delay="0.1s" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0.1s; animation-name: fadeIn;">
                                <h3 class="tour-listing-details__title tour-listing-details__overview-title">Overview</h3>
                            </div>
                        </div><!-- /.tour-listing-details__explore -->
                        <div class="tour-listing-details__included">
                            {!! $data['content'] !!}
                        </div><!-- /.tour-listing-details__included -->
                        <div class="tour-listing-details__plan">
                            <h3 class="tour-listing-details__title tour-listing-details__plan-title">Tour Plan For {{ $data['name'] }} ({{ $data['duration'] }})</h3>
                            <div class="trevlo-accrodion tour-listing-details__faq" data-grp-name="tour-listing-details__faq">
                                @foreach($data['tour_plan'] as $item)
                                <div class="accrodion wow animated fadeInUp animated active" data-wow-delay="0.1s" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0.1s; animation-name: fadeInUp;">
                                    <div class="accrodion-title">
                                        <h4><span>{{ $item['name'] }}</span></h4>
                                    </div>
                                    <div class="accrodion-content" style="">
                                        <div class="inner">
                                            {!! $item['content'] !!}
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div><!-- /.tour-listing-details__plan -->
                        <div class="tour-listing-details__location">
                            <h3 class="tour-listing-details__title tour-listing-details__location-title">Location</h3>
                            <div class="google-map google-map__@@extraClassName">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d605244.8227399779!2d107.687700516928!3d11.705162129376657!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3171415c4a847499%3A0x3bac5cf6af75a94a!2sElon%20Farmstay!5e0!3m2!1sen!2s!4v1737343487746!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                            <!-- /.google-map -->
                        </div><!-- /.tour-listing-details__location -->
                        <div class="tour-listing-details__amenities">
                            <h3 class="tour-listing-details__title tour-listing-details__amenities-title">Tour Amenities</h3>
                            <div class="tour-listing-details__amenities-row row">
                                @foreach($data->amenities as $amenity)
                                <div class="col-xl-4 col-lg-4 col-sm-6 wow animated fadeInUp" data-wow-delay="0.1s" data-wow-duration="1500ms" style="visibility: hidden; animation-duration: 1500ms; animation-delay: 0.1s; animation-name: none;">
                                    <div class="tour-listing-details__amenities-content tour-listing-details__amenities-content--one">
                                        <img src="assets/frontend/images/amenities/amenities-{{ (int)$amenity->id - 1 }}.svg" alt="tab">
                                        <h4 class="tour-listing-details__amenities-content-title">{{$amenity->name}}</h4>
                                    </div><!-- /.tour-listing-details__amenities-content -->
                                </div><!-- /.col-xl-4 col-lg-4 col-sm-6 -->
                                @endforeach
                        </div><!-- /.tour-listing-details__amenities-row -->
                        <div class="tour-listing-details__similar container-fluid mt-5">
                            <h3 class="tour-listing-details__title tour-listing-details__similar-title">Similar Tour</h3>
                            <div class="row">
                                @foreach($data['similar_tour'] as $similarTour)
                                <div class="col-md-6 wow animated fadeInUp animated" data-wow-delay="0.1s" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0.1s; animation-name: fadeInUp;">
                                    <div class="tour-listing__card">
                                        <a href="/{{ $similarTour['alias'] }}" class="tour-listing__card-image-box">
                                            <img src="{{ asset($similarTour['images']) }}" alt="{{ $similarTour['alias'] }}" class="tour-listing__card-image">
                                            <div class="tour-listing__card-btn-group">
                                                <div class="tour-listing__card-featured">Featured</div>
                                            </div><!-- /.tour-listing__card-btn-group -->
                                        </a><!-- /.tour-listing__card-image-box -->
                                        <a href="/{{ $similarTour['alias'] }}" class="tour-listing__card-wishlist"><span class="icon-heart"></span></a>
                                        <div class="tour-listing__card-content">
                                            <div class="tour-listing__card-camera-group">
                                                <a href="https://www.youtube.com/watch?v=h9MbznbxlLc" class="tour-listing__card-camera-btn video-popup">
                                                    <span class="icon-video-camera-1-1"></span>
                                                </a>
                                            </div><!-- /.tour-listing__card-camera-group -->
                                            <h3 class="tour-listing__card-title"><a href="/{{ $similarTour['alias'] }}">{{ $similarTour['name'] }}</a></h3>
                                            <p class="tour-listing__card-text text-small">{{ $similarTour['subtitle'] }}</p>
                                            <div class="tour-listing__card-inner-content">
                                                <div class="tour-listing__card-review-box">
                                                    <span class="icon-star"></span>
                                                    <p class="tour-listing__card-review-text text-small">4.5 (30 Reviews)</p>
                                                </div><!-- /.tour-listing__card-review-box -->
                                                <div class="tour-listing__card-location-box">
                                                    <span class="icon-location-1"></span>
                                                    <p class="tour-listing__card-location-text text-small">{{ $similarTour['location'] }}</p>
                                                </div><!-- /.tour-listing__card-location-box -->
                                                <div class="tour-listing__card-divider"></div><!-- /.tour-listing__card-divider -->
                                                <div class="tour-listing__card-bottom">
                                                    <div class="tour-listing__card-bottom-left">
                                                        <div class="tour-listing__card-day">
                                                            <span class="icon-clock-1"></span>
                                                            <p class="tour-listing__card-day-text text-small">{{ $similarTour['duration'] }}</p>
                                                        </div><!-- /.tour-listing__card-day -->
                                                        
                                                    </div><!-- /.tour-listing__card-bottom-left -->
                                                    <div class="tour-listing__card-bottom-right">
                                                        <h4 class="tour-listing__card-price">{{ number_format($similarTour['price'], 0, ',', '.') }}₫</h4>
                                                    </div><!-- /.tour-listing__card-bottom-right -->
                                                </div><!-- /.tour-listing__card-bottom -->
                                            </div><!-- /.tour-listing__card-inner-content -->
                                        </div><!-- /.tour-listing__card-content -->
                                    </div><!-- /.tour-listing__card -->
                                </div><!-- /.col-md-6 -->
                                @endforeach
                            </div><!-- /.row -->
                        </div><!-- /.tour-listing-details__similar container-fluid -->
                        
                        </div><!-- /.tour-listing-details__amenities -->
                    </div><!-- /.col-xl-8 -->
                    <div class="col-xl-4">
                        <aside class="tour-listing-sidebar">
                            <form action="#" class="tour-listing-sidebar__form tour-listing-sidebar__item wow animated fadeInUp" data-wow-delay="0.1s" data-wow-duration="1500ms">
                                <div class="banner-form">
                                    <h3 class="tour-listing-sidebar__title tour-listing-sidebar__price-ranger-title mb-3">Contact Information</h3>
                                    <div class="banner-form__control">
                                        <label for="name">Name</label>
                                        <input id="name" type="text" name="name" placeholder="Your name...">
                                        <i><img src="assets/frontend/images/about/form-name.svg" alt="tab"></i>
                                    </div>
                                    <div class="banner-form__control">
                                        <label for="email">Email</label>
                                        <input id="email" type="email" name="email" placeholder="Your email...">
                                        <i><img src="assets/frontend/images/about/form-email.svg" alt="tab"></i>
                                    </div>
                                    <div class="banner-form__control">
                                        <label for="phoneNumber">Phone number</label>
                                        <input id="phoneNumber" type="text" name="phoneNumber" placeholder="Your phone number...">
                                        <i><img src="assets/frontend/images/about/form-phone.svg" alt="tab"></i>
                                    </div>
                                </div>
                                <div class="tour-listing-sidebar__price-ranger">
                                    <h3 class="tour-listing-sidebar__title tour-listing-sidebar__price-ranger-title mb-3">Tour</h3>
                                     <div class="banner-form__control">
                                        <label for="type">Tour</label>
                                        <select name="type" class="selectpicker" id="type">
                                            <option value="full-day">Full-Day tour</option>
                                            <option value="half-day">Half-Day tour</option>
                                        </select>
                                        <i><img src="assets/frontend/images/about/form-tour.svg" alt="tab"></i>
                                    </div>
                                    <div class="banner-form__control">
                                        <label for="date">Preferred Tour Date</label>
                                        <input class="trevlo-multi-datepicker" id="date" type="text" name="date" placeholder="Select Date">
                                        <i class="icon-calendar-5"></i>
                                    </div>
                                    <div class="banner-form__control">
                                        <label for="adults">Adults</label>
                                        <button class="banner-form__qty-minus sub">
                                            <i class="icon-minus-3"></i>
                                        </button>
                                        <input id="adults" type="number" value="2" name="adults" placeholder="2">
                                        <button class="banner-form__qty-plus add">
                                            <i class="icon-plus-3"></i>
                                        </button>
                                    </div>
                                    <div class="banner-form__control">
                                        <label for="youth">Youth (10-18 years) <span class="alert-form-a">*DISCOUNT 50%</span></label>
                                        <button class="banner-form__qty-minus sub">
                                            <i class="icon-minus-3"></i>
                                        </button>
                                        <input id="youth" type="number" value="2" name="youth" placeholder="2">
                                        <button class="banner-form__qty-plus add">
                                            <i class="icon-plus-3"></i>
                                        </button>
                                    </div>
                                    <div class="banner-form__control">
                                        <label for="children">Children (under 10) <span class="alert-form-a">*FREE</span></label>
                                        <button class="banner-form__qty-minus sub">
                                            <i class="icon-minus-3"></i>
                                        </button>
                                        <input id="children" type="number" value="2" name="children" placeholder="2">
                                        <button class="banner-form__qty-plus add">
                                            <i class="icon-plus-3"></i>
                                        </button>
                                    </div>
                                    <div class="form-checked-box">
                                        <input type="checkbox" name="transportation" id="transportation">
                                        <label for="transportation"><span></span>Transportation (300,000 VND/way from Da Lat City or nearby areas)</label>
                                    </div>
                                </div><!-- /.price-slider -->
                                <div class="tour-listing-sidebar__amenities">
                                    <h3 class="tour-listing-sidebar__title tour-listing-sidebar__amenities-title">Specical Request</h3>
                                    <div class="tour-listing-sidebar__amenities-box">
                                        <div class="form-checked-box">
                                            <input type="checkbox" name="dietary-restrictions" id="dietary-restrictions">
                                            <label for="dietary-restrictions"><span></span>Dietary restrictions</label>
                                        </div>
                                        <div class="form-checked-box">
                                            <input type="checkbox" name="allergies" id="allergies">
                                            <label for="allergies"><span></span>Allergies</label>
                                        </div>
                                        <div class="form-checked-box">
                                            <input type="checkbox" name="health-concerns" id="health-concerns">
                                            <label for="health-concerns"><span></span>Health concerns</label>
                                        </div>
                                        <div class="form-checked-box">
                                            <input type="checkbox" name="others" id="others">
                                            <label for="others"><span></span>Others</label>
                                        </div>
                                    </div><!-- /.tour-listing-sidebar__amenities-box -->
                                </div><!-- /.tour-listing-sidebar__amenities -->
                                <h3 class="tour-listing-sidebar__title tour-listing-sidebar__amenities-title mt-3">2.580.000đ</h3>
                                <div class="tour-listing-sidebar__btn-box">
                                    <button type="submit" class="tour-listing-sidebar__btn trevlo-btn trevlo-btn--base">
                                        <span>Book Now</span>
                                    </button>
                                </div><!-- /.tour-listing-sidebar__btn-box -->
                            </form><!-- /.tour-listing-sidebar__form tour-listing-sidebar__item -->
                        </aside><!-- /.tour-listing-sidebar -->
                    </div><!-- /.col-xl-4 -->
                </div><!-- /.row -->
            </div>
    </section>
@endsection
@section('scripts')

@endsection
