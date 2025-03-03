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
                                <img src="/assets/frontend/images/about/gallery-1-1.png" alt="gallery">
                        </div><!-- /.tour-listing-details__top-carousel-image -->
                        </div><!-- /.tour-listing-details__top-carousel-item item -->
                        <div class="tour-listing-details__top-carousel-item item">
                        <div class="tour-listing-details__top-carousel-image">
                                <img src="/assets/frontend/images/about/gallery-1-2.png" alt="gallery">
                        </div><!-- /.tour-listing-details__top-carousel-image -->
                        </div><!-- /.tour-listing-details__top-carousel-item item -->
                        <div class="tour-listing-details__top-carousel-item item">
                        <div class="tour-listing-details__top-carousel-image">
                                <img src="/assets/frontend/images/about/gallery-1-3.png" alt="gallery">
                        </div><!-- /.tour-listing-details__top-carousel-image -->
                        </div><!-- /.tour-listing-details__top-carousel-item item -->
                        <div class="tour-listing-details__top-carousel-item item">
                        <div class="tour-listing-details__top-carousel-image">
                                <img src="/assets/frontend/images/about/gallery-1-4.png" alt="gallery">
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
                                <h4 class="tour-listing-details__dastination-price"><span>{{ number_format($data['price'], 0, ',', '.') }}đ</span><span class="tour-listing-details__dastination-person">/ @lang('translation.per_person')</span></h4>
                            </div><!-- /.tour-listing-details__daetination-left -->
                        </div><!-- /.col-xl-4 -->
                        <div class="col-xl-8">
                            <div class="tour-listing-details__destination-right">
                                <div class="tour-listing-details__destination-info wow animated fadeInUp" data-wow-delay="0.1s" data-wow-duration="1500ms">
                                    <img src="assets/frontend/images/about/clock-circle.svg" alt="tab">
                                    <div class="tour-listing-details__destination-info-title">
                                        <h4 class="tour-listing-details__destination-info-top">@lang('translation.duration')</h4>
                                        <h4 class="tour-listing-details__destination-info-bottom">{{ $data['duration'] }}</h4>
                                    </div>
                                </div><!-- /.tour-listing-details__destination-info -->
                                <div class="tour-listing-details__destination-info wow animated fadeInUp" data-wow-delay="0.3s" data-wow-duration="1500ms">
                                    <img src="assets/frontend/images/about/coffee-circle.svg" alt="tab">
                                    <div class="tour-listing-details__destination-info-title">
                                        <h4 class="tour-listing-details__destination-info-top">@lang('translation.activity')</h4>
                                        <h4 class="tour-listing-details__destination-info-bottom">{{ $data['activity'] }}</h4>
                                    </div>
                                </div><!-- /.tour-listing-details__destination-info -->
                                <div class="tour-listing-details__destination-info wow animated fadeInUp" data-wow-delay="0.5s" data-wow-duration="1500ms">
                                    <img src="assets/frontend/images/about/leaf-circle.svg" alt="tab">
                                    <div class="tour-listing-details__destination-info-title">
                                        <h4 class="tour-listing-details__destination-info-top">@lang('translation.nature')</h4>
                                        <h4 class="tour-listing-details__destination-info-bottom">{{ $data['nature'] }}</h4>
                                    </div>
                                </div><!-- /.tour-listing-details__destination-info -->
                                <div class="tour-listing-details__destination-info wow animated fadeInUp" data-wow-delay="0.7s" data-wow-duration="1500ms">
                                    <img src="assets/frontend/images/about/location-circle.svg" alt="tab">
                                    <div class="tour-listing-details__destination-info-title">
                                        <h4 class="tour-listing-details__destination-info-top">@lang('translation.location')</h4>
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
                    <div class="tour-listing-details__included">
                        {!! $data['content'] !!}
                    </div><!-- /.tour-listing-details__included -->
                    <div class="tour-listing-details__plan">
                        <h3 class="tour-listing-details__title tour-listing-details__plan-title">{{ $data['title_plan'] }}</h3>
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
                        <h3 class="tour-listing-details__title tour-listing-details__location-title">@lang('translation.location')</h3>
                        <div class="google-map google-map__@@extraClassName">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d605244.8227399779!2d107.687700516928!3d11.705162129376657!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3171415c4a847499%3A0x3bac5cf6af75a94a!2sElon%20Farmstay!5e0!3m2!1sen!2s!4v1737343487746!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                        <!-- /.google-map -->
                    </div><!-- /.tour-listing-details__location -->
                    <div class="tour-listing-details__amenities">
                        <h3 class="tour-listing-details__title tour-listing-details__amenities-title">@lang('translation.tour_amenities')</h3>
                        <div class="tour-listing-details__amenities-row row">
                            @foreach($data->amenities as $amenity)
                            <div class="col-xl-4 col-lg-4 col-sm-6 wow animated fadeInUp" data-wow-delay="0.1s" data-wow-duration="1500ms" style="visibility: hidden; animation-duration: 1500ms; animation-delay: 0.1s; animation-name: none;">
                                <div class="tour-listing-details__amenities-content tour-listing-details__amenities-content--one">
                                    <img src="/assets/frontend/images/amenities/amenities-{{ (int)$amenity->id - 1 }}.svg" alt="tab">
                                    <h4 class="tour-listing-details__amenities-content-title">{{$amenity->name}}</h4>
                                </div><!-- /.tour-listing-details__amenities-content -->
                            </div><!-- /.col-xl-4 col-lg-4 col-sm-6 -->
                            @endforeach
                        </div>
                    </div><!-- /.tour-listing-details__amenities-row -->
                    <div class="tour-listing-details__similar container-fluid mt-5">
                        <h3 class="tour-listing-details__title tour-listing-details__similar-title">@lang('translation.similar_tours')</h3>
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
                                                    <h4 class="tour-listing__card-price">{{ number_format($similarTour['price'], 0, ',', '.') }}đ</h4>
                                                </div><!-- /.tour-listing__card-bottom-right -->
                                            </div><!-- /.tour-listing__card-bottom -->
                                        </div><!-- /.tour-listing__card-inner-content -->
                                    </div><!-- /.tour-listing__card-content -->
                                </div><!-- /.tour-listing__card -->
                            </div><!-- /.col-md-6 -->
                            @endforeach
                        </div><!-- /.row -->
                    </div><!-- /.tour-listing-details__similar container-fluid -->
                </div><!-- /.col-xl-8 -->
                <div class="col-xl-4">
                    <aside class="tour-listing-sidebar">
                        <form action="/book-tour" method="post" id="form-booking-tour" class="tour-listing-sidebar__form tour-listing-sidebar__item wow animated fadeInUp" data-wow-delay="0.1s" data-wow-duration="1500ms">
                            @csrf
                            @method("post")
                            <input name="product_id" type="hidden" value="{{$data->id}}" />
                            <input name="price_product" type="hidden" value="{{$data->price}}" >
                            <div class="banner-form">
                                <h3 class="tour-listing-sidebar__title tour-listing-sidebar__price-ranger-title mb-3">@lang('translation.contact_information')</h3>
                                <div class="banner-form__control">
                                    <label for="name">@lang('translation.name') <span class="text-danger">*</span></label>
                                    <input required id="name" type="text" name="customer_name" placeholder="@lang('translation.your_name')">
                                    <i><img src="assets/frontend/images/about/form-name.svg" alt="tab"></i>
                                </div>
                                <div class="banner-form__control">
                                    <label for="customer_address_mail">Email <span class="text-danger">*</span></label>
                                    <input required id="customer_address_mail" type="email" name="customer_address_mail" placeholder="@lang('translation.your_email')">
                                    <i><img src="assets/frontend/images/about/form-email.svg" alt="tab"></i>
                                </div>
                                <div class="banner-form__control">
                                    <label for="phoneNumber">@lang('translation.phone_number')<span class="text-danger">*</span></label>
                                    <input required id="phoneNumber" type="text" name="customer_number_phone" placeholder="@lang('translation.your_phone')">
                                    <i><img src="assets/frontend/images/about/form-phone.svg" alt="tab"></i>
                                </div>
                            </div>
                            <div class="tour-listing-sidebar__price-ranger">
                                <h3 class="tour-listing-sidebar__title tour-listing-sidebar__price-ranger-title mb-3">@lang('translation.experience')</h3>
                                 <div class="banner-form__control">
                                    <label for="type">@lang('translation.experience')</label>
                                    <select name="type" class="selectpicker" id="type" disabled>
                                        <option value="1" {{ $data['alias'] == 'full-day-experience' ? 'selected' : '' }}>@lang('translation.full_day_tour')</option>
                                        <option value="0" {{ $data['alias'] == 'half-day-experience' ? 'selected' : '' }}>@lang('translation.half_day_tour')</option>
                                    </select>
                                    <i><img src="/assets/frontend/images/about/form-tour.svg" alt="tab"></i>
                                </div>
                                <div class="banner-form__control">
                                    <label for="date">@lang('translation.preferred_tour_date')</label>
                                    <input type="text" name="date" placeholder="Select date" id="date" class="tour-listing-details__sidebar-form-date trevlo-datepicker">
                                    <i class="icon-calendar-5"></i>
                                </div>
                                <div class="banner-form__control">
                                    <label for="adults">@lang('translation.adults')</label>
                                    <button class="banner-form__qty-minus sub">
                                        <i class="icon-minus-3"></i>
                                    </button>
                                    <input id="adults" type="number" value="2" name="adults" placeholder="2">
                                    <button class="banner-form__qty-plus add">
                                        <i class="icon-plus-3"></i>
                                    </button>
                                </div>
                                <div class="banner-form__control">
                                    <label for="youth">@lang('translation.youth_10_18')<span class="alert-form-a">*@lang('translation.discount') 50%</span></label>
                                    <button class="banner-form__qty-minus sub">
                                        <i class="icon-minus-3"></i>
                                    </button>
                                    <input id="youth" type="number" value="0" name="youth" placeholder="2">
                                    <button class="banner-form__qty-plus add">
                                        <i class="icon-plus-3"></i>
                                    </button>
                                </div>
                                <div class="banner-form__control">
                                    <label for="children">@lang('translation.children')<span class="alert-form-a">*@lang('translation.free')</span></label>
                                    <button class="banner-form__qty-minus sub">
                                        <i class="icon-minus-3"></i>
                                    </button>
                                    <input id="children" type="number" value="0" name="children" placeholder="2">
                                    <button class="banner-form__qty-plus add">
                                        <i class="icon-plus-3"></i>
                                    </button>
                                </div>
                                <div class="form-checked-box">
                                    <input type="checkbox" name="transportation" id="transportation">
                                    <label for="transportation"><span></span>@lang('translation.take_transport')</label>
                                </div>
                            </div><!-- /.price-slider -->
                            <div class="tour-listing-sidebar__amenities">
                                <h3 class="tour-listing-sidebar__title tour-listing-sidebar__amenities-title">@lang('translation.specical_request')</h3>
                                <div class="tour-listing-sidebar__amenities-box">
                                    <div class="form-checked-box">
                                        <input type="checkbox" name="special_request[]" value="dietary restrictions" id="dietary-restrictions">
                                        <label for="dietary-restrictions"><span></span>@lang('translation.dietary_restrictions')</label>
                                    </div>
                                    <div class="form-checked-box">
                                        <input type="checkbox" name="special_request[]" value="allergies" id="allergies">
                                        <label for="allergies"><span></span>@lang('translation.allergies')</label>
                                    </div>
                                    <div class="form-checked-box">
                                        <input type="checkbox" name="special_request[]" value="health concerns" id="health-concerns">
                                        <label for="health-concerns"><span></span>@lang('translation.health_concerns')</label>
                                    </div>
                                    <div class="form-checked-box">
                                        <input type="checkbox" name="special_request[]" value="others" id="others">
                                        <label for="others"><span></span>@lang('translation.others')</label>
                                    </div>
                                    <div class="banner-form__control mt-2 border-0 mb-0 form-control">
                                        <input id="special_request" disabled type="text" name="special_request_text" placeholder="Input your special request">
                                    </div>
                                </div><!-- /.tour-listing-sidebar__amenities-box -->
                            </div><!-- /.tour-listing-sidebar__amenities -->
                            <h3 class="tour-listing-sidebar__title tour-listing-sidebar__amenities-title mt-3 total_price_tour">2.580.000đ</h3>
                            <input type="hidden" name="price" class="price-hidden">
                            <div class="tour-listing-sidebar__btn-box">
                                <button type="submit" class="tour-listing-sidebar__btn trevlo-btn trevlo-btn--base">
                                    <span>@lang('translation.book_now')</span>
                                </button>
                            </div><!-- /.tour-listing-sidebar__btn-box -->
                        </form><!-- /.tour-listing-sidebar__form tour-listing-sidebar__item -->
                    </aside><!-- /.tour-listing-sidebar -->
                </div><!-- /.col-xl-4 -->

                @component('frontend.reviews.index', ['reviews' => $reviews])@endcomponent
            </div><!-- /.row -->
        </div>
    </section>
    <section class="destination-five">
        <div class="destination-five__bg" style="background-image: url(assets/images/background-detail.png);"></div>
        <!-- /.destination-five__bg -->
        <div class="container">
            <div class="destination-five__top">
                <div class="row gutter-y-40 align-items-center">
                    <div class="col-xl-6">
                        <div class="sec-title sec-title--two text-left">

                            <p class="sec-title__tagline">@lang('translation.book_now')</p><!-- /.sec-title__tagline -->

                            <h2 class="sec-title__title">@lang('translation.best_memories1') <br> @lang('translation.best_memories2')</h2><!-- /.sec-title__title -->
                        </div><!-- /.sec-title -->
                    </div><!-- /.col-xl-6 -->
                    <div class="col-xl-6">
                        <ul class="list-unstyled destination-five__filter-list owl-filter-bar">
                            <li class="item active" data-owl-filter="*">@lang('translation.all')</li>
                            <li class="item" data-owl-filter=".india">@lang('translation.coffee_activities')</li>
                            <li class="item" data-owl-filter=".maldives">@lang('translation.mulberry_silk')</li>
                            <li class="item" data-owl-filter=".mauritius">@lang('translation.homestay')</li>
                            <li class="item" data-owl-filter=".egypt">@lang('translation.coffee_time')</li>
                        </ul><!-- /.list-unstyledf -->
                    </div><!-- /.col-xl-6 -->
                </div><!-- /.row gutter-y-40 -->
            </div><!-- /.destination-five__top -->
        </div><!-- /.container -->
        <div class="container-fluid">
            <div class="destination-five__carousel trevlo-owl__carousel--filter trevlo-owl__carousel--basic-nav owl-carousel trevlo-owl__carousel--with-shadow" data-owl-filters-div=".destination-five__filter-list" data-owl-options='{
        "loop": false,
        "items": 5,
        "autoplay": true,
        "smartSpeed": 600,
        "nav": false,
        "navText": ["<span class=\"icon-left-arrow\"></span>","<span class=\"icon-right-arrow\"></span>"],
        "dots": true,
        "margin": 30,
        "responsive": {
            "0": {
                "items": 1
            },
            "500": {
                "items": 2
            },
            "768": {
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
                <div class="destination-five__card choice item india">
                    <div class="destination-five__card__inner">
                        <div class="destination-five__card__top" style="background-image: url(assets/images/memories/coffee1.png);">
                        </div><!-- /.accordian-title -->
                    </div><!-- /.destination-five__card__inner -->
                </div><!-- /.destination-five__card -->
                <div class="destination-five__card choice item india">
                    <div class="destination-five__card__inner">
                        <div class="destination-five__card__top" style="background-image: url(assets/images/memories/coffee2.png);">
                        </div><!-- /.accordian-title -->
                    </div><!-- /.destination-five__card__inner -->
                </div><!-- /.destination-five__card -->
                <div class="destination-five__card choice item india">
                    <div class="destination-five__card__inner">
                        <div class="destination-five__card__top" style="background-image: url(assets/images/memories/coffee3.png);">
                        </div><!-- /.accordian-title -->
                    </div><!-- /.destination-five__card__inner -->
                </div><!-- /.destination-five__card -->
                <div class="destination-five__card choice item india">
                    <div class="destination-five__card__inner">
                        <div class="destination-five__card__top" style="background-image: url(assets/images/memories/coffee4.png);">
                        </div><!-- /.accordian-title -->
                    </div><!-- /.destination-five__card__inner -->
                </div><!-- /.destination-five__card -->
                <div class="destination-five__card choice item india">
                    <div class="destination-five__card__inner">
                        <div class="destination-five__card__top" style="background-image: url(assets/images/memories/coffee5.png);">
                        </div><!-- /.accordian-title -->
                    </div><!-- /.destination-five__card__inner -->
                </div><!-- /.destination-five__card -->
                <div class="destination-five__card choice item india">
                    <div class="destination-five__card__inner">
                        <div class="destination-five__card__top" style="background-image: url(assets/images/memories/coffee6.png);">
                        </div><!-- /.accordian-title -->
                    </div><!-- /.destination-five__card__inner -->
                </div><!-- /.destination-five__card -->
                <div class="destination-five__card choice item india">
                    <div class="destination-five__card__inner">
                        <div class="destination-five__card__top" style="background-image: url(assets/images/memories/coffee7.png);">
                        </div><!-- /.accordian-title -->
                    </div><!-- /.destination-five__card__inner -->
                </div><!-- /.destination-five__card -->
                <div class="destination-five__card choice item maldives">
                    <div class="destination-five__card__inner">
                        <div class="destination-five__card__top" style="background-image: url(assets/images/memories/ms1.png);">
                        </div><!-- /.accordian-title -->
                    </div><!-- /.destination-five__card__inner -->
                </div><!-- /.destination-five__card -->
                <div class="destination-five__card choice item maldives">
                    <div class="destination-five__card__inner">
                        <div class="destination-five__card__top" style="background-image: url(assets/images/memories/ms2.png);">
                        </div><!-- /.accordian-title -->
                    </div><!-- /.destination-five__card__inner -->
                </div><!-- /.destination-five__card -->
                <div class="destination-five__card choice item maldives">
                    <div class="destination-five__card__inner">
                        <div class="destination-five__card__top" style="background-image: url(assets/images/memories/ms3.png);">
                        </div><!-- /.accordian-title -->
                    </div><!-- /.destination-five__card__inner -->
                </div><!-- /.destination-five__card -->
                <div class="destination-five__card choice item maldives">
                    <div class="destination-five__card__inner">
                        <div class="destination-five__card__top" style="background-image: url(assets/images/memories/ms4.png);">
                        </div><!-- /.accordian-title -->
                    </div><!-- /.destination-five__card__inner -->
                </div><!-- /.destination-five__card -->
                <div class="destination-five__card choice item maldives">
                    <div class="destination-five__card__inner">
                        <div class="destination-five__card__top" style="background-image: url(assets/images/memories/ms5.png);">
                        </div><!-- /.accordian-title -->
                    </div><!-- /.destination-five__card__inner -->
                </div><!-- /.destination-five__card -->
                <div class="destination-five__card choice item mauritius">
                    <div class="destination-five__card__inner">
                        <div class="destination-five__card__top" style="background-image: url(assets/images/memories/home1.png);">
                        </div><!-- /.accordian-title -->
                    </div><!-- /.destination-five__card__inner -->
                </div><!-- /.destination-five__card -->
                <div class="destination-five__card choice item mauritius">
                    <div class="destination-five__card__inner">
                        <div class="destination-five__card__top" style="background-image: url(assets/images/memories/home2.png);">
                        </div><!-- /.accordian-title -->
                    </div><!-- /.destination-five__card__inner -->
                </div><!-- /.destination-five__card -->
                <div class="destination-five__card choice item mauritius">
                    <div class="destination-five__card__inner">
                        <div class="destination-five__card__top" style="background-image: url(assets/images/memories/home3.png);">
                        </div><!-- /.accordian-title -->
                    </div><!-- /.destination-five__card__inner -->
                </div><!-- /.destination-five__card -->
                <div class="destination-five__card choice item mauritius">
                    <div class="destination-five__card__inner">
                        <div class="destination-five__card__top" style="background-image: url(assets/images/memories/home4.png);">
                        </div><!-- /.accordian-title -->
                    </div><!-- /.destination-five__card__inner -->
                </div><!-- /.destination-five__card -->
                <div class="destination-five__card choice item mauritius">
                    <div class="destination-five__card__inner">
                        <div class="destination-five__card__top" style="background-image: url(assets/images/memories/home5.png);">
                        </div><!-- /.accordian-title -->
                    </div><!-- /.destination-five__card__inner -->
                </div><!-- /.destination-five__card -->
                <div class="destination-five__card choice item mauritius">
                    <div class="destination-five__card__inner">
                        <div class="destination-five__card__top" style="background-image: url(assets/images/memories/home6.png);">
                        </div><!-- /.accordian-title -->
                    </div><!-- /.destination-five__card__inner -->
                </div><!-- /.destination-five__card -->
                <div class="destination-five__card choice item mauritius">
                    <div class="destination-five__card__inner">
                        <div class="destination-five__card__top" style="background-image: url(assets/images/memories/home7.png);">
                        </div><!-- /.accordian-title -->
                    </div><!-- /.destination-five__card__inner -->
                </div><!-- /.destination-five__card -->
                <div class="destination-five__card choice item mauritius">
                    <div class="destination-five__card__inner">
                        <div class="destination-five__card__top" style="background-image: url(assets/images/memories/home8.png);">
                        </div><!-- /.accordian-title -->
                    </div><!-- /.destination-five__card__inner -->
                </div><!-- /.destination-five__card -->
                <div class="destination-five__card choice item egypt">
                    <div class="destination-five__card__inner">
                        <div class="destination-five__card__top" style="background-image: url(assets/images/memories/time1.png);">
                        </div><!-- /.accordian-title -->
                    </div><!-- /.destination-five__card__inner -->
                </div><!-- /.destination-five__card -->
                <div class="destination-five__card choice item egypt">
                    <div class="destination-five__card__inner">
                        <div class="destination-five__card__top" style="background-image: url(assets/images/memories/time2.png);">
                        </div><!-- /.accordian-title -->
                    </div><!-- /.destination-five__card__inner -->
                </div><!-- /.destination-five__card -->
                <div class="destination-five__card choice item egypt">
                    <div class="destination-five__card__inner">
                        <div class="destination-five__card__top" style="background-image: url(assets/images/memories/time3.png);">
                        </div><!-- /.accordian-title -->
                    </div><!-- /.destination-five__card__inner -->
                </div><!-- /.destination-five__card -->
                <div class="destination-five__card choice item egypt">
                    <div class="destination-five__card__inner">
                        <div class="destination-five__card__top" style="background-image: url(assets/images/memories/time4.png);">
                        </div><!-- /.accordian-title -->
                    </div><!-- /.destination-five__card__inner -->
                </div><!-- /.destination-five__card -->
                <div class="destination-five__card choice item egypt">
                    <div class="destination-five__card__inner">
                        <div class="destination-five__card__top" style="background-image: url(assets/images/memories/time5.png);">
                        </div><!-- /.accordian-title -->
                    </div><!-- /.destination-five__card__inner -->
                </div><!-- /.destination-five__card -->
            </div><!-- /.destination-five__carousel -->
        </div><!-- /.container-fluid -->
    </section><!-- /.destination-five section-space -->
@endsection
@section('scripts')
<script>
    $(document).ready(() => {

        function getQueryParams() {
            let params = new URLSearchParams(window.location.search);
            let data = {};
            params.forEach((value, key) => {
                data[key] = value;
            });
            return data;
        }
        const urlParams = getQueryParams();
        console.log('urlParams', urlParams);
        $.each(urlParams, function (key, value) {
            const $element = $(`[name="${key}"]`);
            if ($element.is(':checkbox')) {
                if (value === 'yes' || value === '1') {
                    $element.prop('checked', true);
                } else {
                    $element.prop('checked', false);
                }
            } else if ($element.is('select')) {
                // Handle select dropdown
                $element.val(value);
            } else {
                // Default case: handle text, number, email, etc.
                $element.val(value);
            }
        });

        const calculate_price = () => {
            const all_values = $('#form-booking-tour').serializeArray();
            let keysToExtract = ["adults", "youth", "type", "transportation"];
            let selectedValues = {};
            all_values.forEach(item => {
                if (keysToExtract.includes(item.name)) {
                    selectedValues[item.name] = item.value;
                }
            });
            selectedValues.price = selectedValues.type.toString() === "1" ? 1800000 : 800000;
            let transport_fee = 0;
            if (selectedValues.hasOwnProperty("transportation")) {
                transport_fee = 300000;
            }
            let adults_fee = 0
            if (selectedValues.hasOwnProperty("adults")) {
                adults_fee = parseInt(selectedValues.adults) * selectedValues.price;
            }
            let youth_fee = 0;
            if (selectedValues.hasOwnProperty("youth")) {
                youth_fee = parseInt(selectedValues.youth) * selectedValues.price/2;
            }

            const total_fee = transport_fee + adults_fee + youth_fee;

            $('.total_price_tour').html(`${Number(total_fee).toLocaleString("vi-VN")}đ`)
            $('.price-hidden').val(total_fee);
        }
        $('.sub, .add').on('click', () => {
            calculate_price();
        })
        $('#type, #adults, #youth, #transportation').on('change', () => {
            calculate_price();
        })

        calculate_price();

        $('input[name="special_request[]"]').on('change', function() {
            // Kiểm tra nếu checkbox với value = "others" được chọn
            if ($('input[name="special_request[]"][value="others"]').is(':checked')) {
                $('#special_request').prop('disabled', false); // Enable input
            } else {
                $('#special_request').prop('disabled', true).val(''); // Disable input và reset value
            }
        });

    })
</script>
@endsection
