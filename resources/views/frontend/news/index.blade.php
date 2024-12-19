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
    <nav aria-label="breadcrumb" class="div_breadcrumb">
        <div class="container">
            <div class="row">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                    <li><a href="{{$data->news_category->alias}}">{{$data->news_category->title}}</a></li>
                    <li><span>{{$data->title}}</span></li>
                </ol>
            </div>
        </div>
    </nav>

    <div id="vnt-container" class="container">
        <div id="vnt-content">

            <div class="row">
                <div class="box_category_news">
                    <div class="container">
                        <div class="row">
                            @foreach($data->new_categories as $category)
                                <a href='{{$category->alias}}'><span>{{$category->title}}</span></a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="boxDetail">
                    <div class="header_news">
                        <h1 class="title">{{$data->title}}</h1>
                        <div class="date_social clearfix">
                            <div class="col-sm-8 info_post_detail">
                                <span class="avatar_circle">
                                    <img src="vnt_upload/member/avatar/logo_user.png" alt='Avatar admin'/>
                                </span>
                                BY
                                <b class='admin_name'>locday123</b>
                                <span class="view">
                                    <i class="fa fa-eye" aria-hidden="true"></i> {{count($data->news_category->news)}}</span> -
                                <a href="{{$data->news_category->alias}}"><span class="cat_name">{{$data->news_category->title}}</span>
                                </a>
                                <span class="date_post">Thứ tư, 27/09/2024, </span>
                            </div>
                            <div class="col-sm-4 p-top-15" style="text-align: right;">
                                <div class="fb-like"
                                     data-href="https://www.vienquangmobile.com/iphone-15-pro-pro-max-co-nhung-mau-nao"
                                     data-layout="button_count" data-action="like" data-size="small"
                                     data-show-faces="false" data-share="true"></div>

                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <img class="cover" src="vnt_upload/news/id-1796/iphone-15-pro-pro-max-color.jpg"/>
                    </div>
                    <div class="content-news">
                        {!! $data->content !!}
                    </div>

                    <div id="otherNews">
                        <h3 class="title_other_news"><b>Bài viết liên quan </b></h3>
                        <div class="row_other_news clearfix">
                            @foreach($data->news_category->news as $new)
                                <div class='col-md-4 col-xs-6 news-bottom'>
                                    <a
                                            href="{{$new->alias}}"
                                            ref="nofollow">
                                        <img
                                                src="{{$new->avater}}"
                                                alt='{{$new->title}}'
                                                title={{$new->title}}
                                        />
                                        <h4>{{$new->title}}</h4>
                                        <span class='note'>
                                            <span class='date_post'>{{date_format($data->created_at, 'd/m/Y')}}</span>
                                            <span class='view'>1159</span>
                                        </span>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <script type="text/javascript">
                        $(document).ready(function () {

                            //full width for facebook comment
                            $(".fb-comments").attr("data-width", $(".fb-comments").parent().width());
                            $(window).on('resize', function () {
                                resizeFacebookComments();
                            });

                            function resizeFacebookComments() {
                                var src = $('.fb-comments iframe').attr('src').split('width='),
                                    width = $(".fb-comments").parent().width();
                                $('.fb-comments iframe').attr('src', src[0] + 'width=' + width);
                            }


                        });

                    </script>
                </div>
            </div>


            <div class="clear"></div>
        </div>
    </div>
@endsection
@section('scripts')
@endsection
