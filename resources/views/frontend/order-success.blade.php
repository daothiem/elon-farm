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
       <div class="container-order my-5 text-center">
        <div class="mb-4 order-success">
            <div class="success-icon">
                <img src="/assets/frontend/images/order-success.svg" alt="Elon Farm HTML" />
            </div>
            <h2 class="mt-2">@lang('translation.booking_confirmed')</h2>
            <p>@lang('translation.thank_book_1') <br/>
@lang('translation.thank_book_2') </p>
        </div>

        <div class="confirmation-card mx-auto p-4" style="max-width: 600px;">
            <h2 class="text-center mb-3"><strong>@lang('translation.booking_details')</strong></h2>

            <h6 class="text-start highlight-text">@lang('translation.customer')</h6>
            <p class="text-start">@lang('translation.name'): <strong>{{$order->customer_name}}</strong></p>
            <p class="text-start">Email: <strong>{{$order->customer_address_mail}}</strong></p>
            <p class="text-start">@lang('translation.phone_number'): <strong>{{$order->customer_number_phone}}</strong></p>

            <h6 class="text-start highlight-text">Tour</h6>
            <p class="text-start">Tour: <strong>{{$order->product->name}}</strong></p>
            <p class="text-start">@lang('translation.preferred_tour_date'): <strong>{{$order->date}}</strong></p>
            <p class="text-start">@lang('translation.adults'): <strong>{{$order->adults}}</strong></p>
            <p class="text-start">@lang('translation.youth_10_18'): <strong>{{$order->youth}}</strong></p>
            <p class="text-start">@lang('translation.children'): <strong>{{$order->children}}</strong></p>
            <p class="text-start">@lang('translation.transportation'): <strong>{{$order->is_transportation ? 'Yes' : 'No'}}</strong></p>

            <h6 class="text-start highlight-text">@lang('translation.specical_request')</h6>
            @foreach(explode(',', $order->special_request) as $special)
                <p class="text-start">@lang('translation.request'): <strong>{{$special}}</strong></p>
            @endforeach
        </div>

        <div class="mx-auto mt-4 text-muted alert-success">
            <p><strong>@lang('translation.dont-forget')</strong></p>
            <p>@lang('translation.dont-forget-mess')</p>
        </div>
    </div>
    </section>
@endsection
