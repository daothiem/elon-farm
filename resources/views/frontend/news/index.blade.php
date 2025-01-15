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
            <h2 class="page-header__title wow animated fadeInLeft" data-wow-delay="0s" data-wow-duration="1500ms">Robusta Vietnam</h2>
            <div class="page-header__breadcrumb-box">
                <ul class="trevlo-breadcrumb">
                    <li><a href="/">Home</a></li>
                    <li>Robusta Vietnam</li>
                </ul><!-- /.trevlo-breadcrumb -->
            </div><!-- /.page-header__breadcrumb-box -->
        </div><!-- /.container -->
    </section><!-- /.page-header -->

    <!-- Blog Details Page Start -->
    <div class="blog-details-page blog-details-page-right section-space-top">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7">
                    <div class="blog-details">
                        <div class="blog-card-three">
                            <div class="blog__card">
                                <div class="blog__card-img wow animated fadeInUp" data-wow-delay="0s" data-wow-duration="1500ms">
                                    <img src="{{ asset($data['avatar']) }}" alt="{{ $data['title'] }}">
                                    <div class="blog__card-date">
                                        <h4 class="blog__card-date-number">{{ \Carbon\Carbon::parse($data['created_at'])->format('d') }}</h4>
                                        <p class="blog__card-date-month">{{ \Carbon\Carbon::parse($data['created_at'])->format('M') }} {{ \Carbon\Carbon::parse($data['created_at'])->format('Y') }}</p>
                                    </div><!-- /.blog__card-date -->
                                </div><!-- /.blog__card-img -->
                                <div class="blog__card-content wow animated fadeInUp" data-wow-delay="0.1s" data-wow-duration="1500ms">
                                    <ul class="blog__card-meta">
                                        <li>
                                            <span class="blog__card-meta-icon icon-user"></span>
                                            <span class="blog__card-meta-author">By {{ $data['createdBy']['name'] }}</span>
                                        </li>
                                    </ul><!-- /.blog__card-meta -->
                                    <h3 class="blog__card-title">{{ $data['title'] }}</h3>
                                    <div class="content-news">
                                        {!! $data->content !!}
                                    </div>
                                </div><!-- /.blog-details__card-content -->
                            </div><!-- /.blog-details__card -->
                        </div><!-- /.blog-card-three -->
                    </div><!-- /.blog-details -->
                    <div class="post-info">
                        <div class="post-tag">
                            <h3 class="post-tag__title">Tags:</h3>
                            <div class="post-tag__text-box">
                                @foreach($tagNames as $item)
                                <a href="#" class="post-tag__text">{{$item}}</a>
                                @if (!$loop->last)
                                    , 
                                @endif
                                @endforeach
                            </div><!-- /.post-tag__text-box -->
                        </div><!-- /.post-tag -->
                    </div><!-- /.post-info -->
                    
                </div><!-- /.col-xl-8 col-lg-7 -->
                <div class="col-xl-4 col-lg-5">
                    <div class="sidebar-blog @@extraClassName">
                        <aside class="widget-area">
                            <div class="sidebar-blog__single sidebar-blog__single--posts wow animated fadeInUp" data-wow-delay="0.1s" data-wow-duration="1500ms">
                                <h4 class="sidebar-blog__title">Latest posts</h4><!-- /.sidebar-blog__title -->
                                <ul class="sidebar-blog__posts ">
                                    @foreach($data['newsPre']->slice(0, 7) as $item)
                                    <li class="sidebar-blog__posts-item">
                                        <div class="sidebar-blog__posts-image">
                                            <img src="{{ asset($item['avatar']) }}" alt="{{ $item['title'] }}">
                                        </div><!-- /.sidebar-blog__posts-image -->
                                        <div class="sidebar-blog__posts-content">
                                            <p class="sidebar-blog__posts-date">
                                                <i class="far fa-clock"></i>
                                                {{ \Carbon\Carbon::parse($item['created_at'])->format('d M, Y') }}
                                            </p><!-- /.sidebar-blog__posts-date -->
                                            <h4 class="sidebar-blog__posts-title"><a href="{{ $item['alias'] }}">{{ $item['title'] }}</a></h4><!-- /.sidebar-blog__posts-title -->
                                        </div><!-- /.sidebar-blog__posts-content -->
                                    </li>
                                    @endforeach
                                </ul><!-- /.sidebar-blog__posts  -->
                            </div><!-- /.sidebar-blog__single -->
                            
                            <div class="sidebar-blog__single sidebar-blog__single--tags wow animated fadeInUp" data-wow-delay="0.3s" data-wow-duration="1500ms">
                                <h4 class="sidebar-blog__title">Tags</h4><!-- /.sidebar-blog__title -->
                                <div class="sidebar-blog__tags">
                                    @foreach($tagNames as $item)
                                    <a href="#" class="trevlo-btn trevlo-btn--white-two"><span>{{$item}}</span></a>
                                    @endforeach
                                </div><!-- /.sidebar-blog__tags -->
                            </div><!-- /.sidebar-blog__single -->
                            
                        </aside><!-- /.widget-area -->
                    </div><!-- /.sidebar-blog -->
                </div><!-- /.col-xl-4 col-lg-5 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.blog-details-page -->
    <!-- Blog Details Page End -->
@endsection
@section('scripts')
@endsection
