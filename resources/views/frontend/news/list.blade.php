@extends('frontend.layouts.master')
@section('title')
@endsection
@section('css')
    <link href="{{ asset('/assets/frontend/modules/news/css/newscbcf.css?v=23062018') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('/assets/frontend/modules/news/js/news.js') }}" rel="stylesheet" type="text/css"/>
@endsection
@section('main-content')
    <nav aria-label="breadcrumb" class="div_breadcrumb">
        <div class="container">
            <div class="row">
                <ol class="breadcrumb">
                    @foreach($data->new_categories as $category)
                    <li class="breadcrumb-item">
                        <a href='{{$category->alias}}'>
                            {{--<span>{{$category->title}}</span>--}}
                            {{$category->title}}
                        </a>
                    </li>
                    @endforeach
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
            <div class="title_cat row">
                <h1>{{$data->title}}</h1>
            </div>

            <div class="row row-tin-tuc">
                <div class="column Column1">
                    <div id="List_View" class="paging-default clearfix">
                        @foreach($data->news as $new)
                            <div class="item-main">
                                <div class="pic">
                                    <a href="/{{$new->alias}}">
                                        <img
                                                src="{{$new->avatar}}"
                                                alt='{{$new->title}}'
                                                title='{{$new->title}}'
                                        />
                                    </a>
                                </div>
                                <h3>
                                    <a href="/{{$new->alias}}">{$new->title}}</a>
                                </h3>
                                <div class="short">{{{$new->description}}}}
                                </div>
                                <div class="info_post">
                                    <p>BY locday123
                                        <span class="view">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                        626</span> - <a href="/{{$new->news_category->alias}}" class="icon_cat">{{$new->news_category->title}}</a></p>
                                    <p class="date_post"><span>27-09-2024</span></p>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <input type="hidden" value="11" name="cat_id" id="catID">
                    <input type="hidden" value="9" name="size" id="size">
                    <input type="hidden" value="2" name="view" id="view">
                    <input type="hidden" value="7" name="totalpage" id="totalpage">
                    <span id="view_more"><a href="javascript:;" id="load_more" class="viewmore hidden" data-view="2"
                                            data-catid="11" data-page="2" data-size="9" data-totalpage="7">Xem thêm <i
                                    class="glyphicon glyphicon-triangle-bottom"></i></a></span>
                    <div id="loading" class="hidden">
                        <div class="loader" id="loader-4">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>
                <div class="column Column2"></div>
            </div>


            <div class="clear"></div>
        </div>
    </div>
@endsection
@section('scripts')
@endsection
