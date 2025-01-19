@extends('frontend.layouts.master')
@section('title')
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('/assets/frontend/assets/css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/frontend/assets/css/news.css') }}">
@endsection
@section('main-content')
    <section class="page-header">
        <div class="page-header__bg1"></div>
        <!-- /.page-header__bg -->
        <div class="container">
            <h2 class="page-header__title wow animated fadeInLeft" data-wow-delay="0s" data-wow-duration="1500ms">Tours List</h2>
            <div class="page-header__breadcrumb-box">
                <ul class="trevlo-breadcrumb">
                    <li><a href="/">Home</a></li>
                    <li>Tours List</li>
                </ul><!-- /.trevlo-breadcrumb -->
            </div><!-- /.page-header__breadcrumb-box -->
        </div><!-- /.container -->
    </section><!-- /.page-header -->
    <section class="tour-listing-one tour-listing section-space">
       
        <div class="container">
             <div class="sec-title sec-title--two text-left">
                <p class="sec-title__tagline">Our Tours</p><!-- /.sec-title__tagline -->
                <h2 class="sec-title__title">Select your desired tour</h2><!-- /.sec-title__title -->
            </div>
            <div class="row">
                @foreach($products as $item)
                <div class="col-xl-4 col-md-4 wow animated fadeInUp" data-wow-delay="0.5s" data-wow-duration="1500ms">
                    <div class="tour-listing__card">
                        <a href="tour-listing-details-right.html" class="tour-listing__card-image-box">
                            <img src="{{ asset($item['images']) }}" alt="{{ $item['alias'] }}" class="tour-listing__card-image">
                            <div class="tour-listing__card-btn-group">
                                <div class="tour-listing__card-featured">Featured</div>
                            </div><!-- /.tour-listing__card-btn-group -->
                            <div class="tour-listing__card-image-overlay"></div><!-- /.tour-listing__card-image-overlay -->
                        </a><!-- /.tour-listing__card-image-box -->
                        <a href="javascript:void(0);" class="tour-listing__card-wishlist"><span class="icon-heart"></span></a>
                        <div class="tour-listing__card-content">
                            <div class="tour-listing__card-camera-group">
                                <a href="javascript:void(0);" class="tour-listing__card-camera-btn">
                                    <span class="icon-photo-camera-1"></span>
                                </a>
                                <a href="javascript:void(0);" class="tour-listing__card-camera-btn video-popup">
                                    <span class="icon-video-camera-1-1"></span>
                                </a>
                            </div><!-- /.tour-listing__card-camera-group -->
                            <h3 class="tour-listing__card-title"><a href="tour-listing-details-right.html">{{ $item['name'] }}</a></h3>
                            <p class="tour-listing__card-text text-small">{{ $item['subtitle'] }}</p>
                            <div class="tour-listing__card-inner-content">
                                <div class="tour-listing__card-review-box">
                                    <span class="icon-star"></span>
                                    <p class="tour-listing__card-review-text text-small">4.5 (30 Reviews)</p>
                                </div><!-- /.tour-listing__card-review-box -->
                                <div class="tour-listing__card-location-box">
                                    <span class="icon-location-1"></span>
                                    <p class="tour-listing__card-location-text text-small">{{ $item['location'] }}</p>
                                </div><!-- /.tour-listing__card-location-box -->
                                <div class="tour-listing__card-divider"></div><!-- /.tour-listing__card-divider -->
                                <div class="tour-listing__card-bottom">
                                    <div class="tour-listing__card-bottom-left">
                                        <div class="tour-listing__card-day">
                                            <span class="icon-clock-1"></span>
                                            <p class="tour-listing__card-day-text text-small">{{ $item['duration'] }}</p>
                                        </div><!-- /.tour-listing__card-day -->
                                    </div><!-- /.tour-listing__card-bottom-left -->
                                    <div class="tour-listing__card-bottom-right">
                                        <h4 class="tour-listing__card-price">{{ number_format($item['price'], 0, ',', '.') }}₫</h4>
                                    </div><!-- /.tour-listing__card-bottom-right -->
                                </div><!-- /.tour-listing__card-bottom -->
                            </div><!-- /.tour-listing__card-inner-content -->
                        </div><!-- /.tour-listing__card-content -->
                    </div><!-- /.tour-listing__card -->
                </div><!-- /.col-xl-4 col-md-6 -->
                @endforeach
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section>
    <!-- Tour Listing Page One End -->
@endsection
@section('scripts')

@endsection
