@extends('frontend.layouts.master')
@section('title')
@endsection
@section('css')
    <link href="{{ asset('/assets/frontend/modules/news/css/newsf83b.css?v=1872017') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('/assets/frontend/modules/news/css/detail.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('/assets/frontend/modules/news/css/comment.css') }}" rel="stylesheet" type="text/css"/>

    <script type="text/javascript" src="{{ URL::asset('/assets/frontend/modules/news/js/detail.js') }}"></script>

@endsection
@section('main-content')

    <section class="page-header">
        <div class="page-header__bg"></div>
        <!-- /.page-header__bg -->
        <div class="container">
            <h2 class="page-header__title wow animated fadeInLeft" data-wow-delay="0s" data-wow-duration="1500ms">@lang('translation.all_blog_title')</h2>
            <div class="page-header__breadcrumb-box">
                <ul class="trevlo-breadcrumb">
                    <li><a href="/">@lang('translation.home')</a></li>
                    <li>@lang('translation.all_blog_title')</li>
                </ul><!-- /.trevlo-breadcrumb -->
            </div><!-- /.page-header__breadcrumb-box -->
        </div><!-- /.container -->
    </section><!-- /.page-header -->

    <!-- Blog List Page Start -->
    <div class="blog-list-page section-space">
        <div class="container">
            <div class="blog-list-page__row row">
                <div class="col-lg-8">
                    <div class="blog-list__inner-container">
                        <div class="row gutter-y-50">
                            @foreach($news as $item)
                            <div class="col-12 wow animated fadeInUp" data-wow-delay="0s" data-wow-duration="1500ms">
                                <div class="blog-card-three blog-list-card">
                                    <div class="blog__card">
                                        <a href="/{{ $item['alias'] }}" class="blog__card-img">
                                            <img src="{{ asset($item['avatar']) }}" alt="{{ $item['title'] }}" style="max-height: 379px">
                                            <div class="blog__card-date">
                                                <h4 class="blog__card-date-number">{{ \Carbon\Carbon::parse($item['created_at'])->format('d') }}</h4>
                                                <p class="blog__card-date-month">{{ \Carbon\Carbon::parse($item['created_at'])->format('M, Y') }}</p>
                                            </div><!-- /.blog__card-date -->
                                        </a><!-- /.blog__card-img -->
                                        <div class="blog__card-content">
                                            <ul class="blog__card-meta">
                                                <li>
                                                    <span class="blog__card-meta-icon icon-user"></span>
                                                    <span class="blog__card-meta-author">@lang('translation.by') {{ $item['createdBy']['name'] }}</span>
                                                </li>
                                            </ul><!-- /.blog__card-meta -->
                                            <h3 class="blog__card-title"><a href="/{{ $item['alias'] }}">{{ $item['title'] }}</a></h3>
                                            <p class="blog__card-text">{{ $item['description'] }}</p>
                                            <a href="/{{ $item['alias'] }}" class="log__card-btn trevlo-btn trevlo-btn--white-two"><span>@lang('translation.read_more_only')</span></a>
                                        </div><!-- /.blog-details__card-content -->
                                    </div><!-- /.blog-details__card -->
                                </div><!-- /.blog-card-three -->
                            </div><!-- /.col-12 -->
                            @endforeach
                        </div><!-- /.row -->
                    </div><!-- /.blog-list__inner-container -->
                </div><!-- /.col-lg-78-->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.blog-list-page -->
    <!-- Blog List Page End -->
@endsection
@section('scripts')
@endsection
