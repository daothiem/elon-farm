<div class="product-details__reviews">
    <div class="container">
        <h3 class="product-details__reviews-title product-details__top-title"><span>{{count($reviews)}}</span> Reviews</h3>
        <div class="product-details__reviews-comment">
            @foreach(array_slice($reviews, 0, 3) as $review)
                <div class="product-details__reviews-comment-box">
                    <div class="product-details__reviews-image wow animated fadeInUp" data-wow-delay="0.1s" data-wow-duration="1500ms">
                        <img src="{{$review['avatar']}}" alt="{{$review['first_name']}} {{$review['host_name']}}">
                    </div><!-- /."product-details__reviews-image -->
                    <div class="product-details__reviews-content wow animated fadeInUp" data-wow-delay="0.3s" data-wow-duration="1500ms">
                        <div class="product-details__reviews-inner-content">
                            <div class="product-details__reviews-info">
                                <h3 class="product-details__reviews-name">{{$review['first_name']}} {{$review['host_name']}}</h3>
                                <div class="product-details__reviews-date">
                                    <p class="product-details__reviews-date-text">{{$review['localized_date']}}</p>
                                </div>
                            </div><!-- /.product-details__reviews-info -->
                            {{--<div class="trevlo-ratings">
                                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                            </div>--}}
                        </div><!-- /.product-details__reviews-inner-content -->
                        <p class="product-details__reviews-text">{!! $review['content'] !!}</p>
                    </div><!-- /.product-details__reviews-content -->
                </div><!-- /.product-details__reviews-comment-box -->
            @endforeach
        </div><!-- /.product-details__reviews-comment -->
        <div class="d-flex align-items-center justify-content-center pt-10">
            <a href="https://www.airbnb.com.vn/experiences/805010?_set_bev_on_new_domain=1736222683_EANWI1NzQwYzUyMD" class="show_more_link" target="_blank">@lang('translation.show_more_reviews')</a>
        </div>
    </div><!-- /.container -->

</div><!-- /.product-details__review -->
