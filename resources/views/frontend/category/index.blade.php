@extends('frontend.layouts.master')
@section('title')
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('/assets/frontend/modules/product/css/product2b98.css?v=1695650186') }}">

    <script type="text/javascript" src="{{ URL::asset('modules/product/js/productdd4a.js?v=16082020') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('modules/product/js/filter.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            var owl = $('.owl-banner_carousel');
            owl.owlCarousel({
                margin: 20,
                nav: false,
                dots: false,
                loop: false,
                navText: [ "<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>" ],
                responsive: {
                    0: {
                        items: 2
                    },
                    600: {
                        items: 3
                    },
                    1000: {
                        items: 4
                    }
                }
            })
        });
    </script>

@endsection
@section('main-content')


@endsection
@section('scripts')
@endsection
