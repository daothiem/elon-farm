@extends('admin.layouts.master')
@section('title')
    Quản lý chương trình khuyến mãi
@endsection
@section('css')
    <link href="{{ URL::asset('assets/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('/assets/css/select2/select2.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/libs/dropzone/dropzone.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">

    <link href="{{ URL::asset('assets/libs/filepond/filepond.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Quản lý chương trình khuyến mãi</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="/admin/promotion">Danh sách chương trình KM</a>
                        </li>
                        <li class="breadcrumb-item">
                            @if(isset($promotion))
                                <a>Chỉnh sửa</a>
                            @else
                                <a>Tạo mới</a>
                            @endif
                        </li>
                    </ol>
                </div>
            </div>

        </div>
    </div>

    <form method="POST" id="form-action" enctype="multipart/form-data"
          @if(isset($promotion))
              action="{{ route('admin.promotions.update', $promotion->id) }}"
          @else
              action="{{ route('admin.promotions.store') }}"
            @endif
    >
        @if(isset($promotion))
            @method('put')
        @endif
        @csrf
        <div class="mb-3 d-flex justify-content-end">
            <button class="btn btn-primary waves-effect waves-light">
                <a><i class="las la-save"></i> Lưu</a>
            </button>
        </div>

        <div class="card card-body">
            <input type="hidden" name="created_by" value='{{\Auth::user()->id}}'>

            <div class="d-flex gap-4">
                <div class="mb-3 w-50">
                    <label class="form-label" for="name">Tên <span class="text-danger">*</span></label>
                    <input type="text" @if(isset($promotion)) value="{{$promotion->name}}" @endif id="name" class="form-control" name="name" placeholder="Nhập tên chương trình KM" required>
                </div>
                <div class="mb-3 w-50">
                    <label class="form-label" for="code">Mã chương trình KM</label>
                    <input type="text" @if(isset($promotion)) value="{{$promotion->code}}" @endif id="code" class="form-control" name="code" placeholder="Nhập mã chương trình KM">
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label class="form-label" for="from_date">Thời gian bắt đầu <span class="text-danger">*</span></label>
                        <input type="date" class="form-control" id="from_date" name="from_date" value="@if(isset($promotion)){{date('Y-m-d', strtotime($promotion->from_date))}}@endif" required>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label class="form-label" for="to_date">Thời gian kết thúc <span class="text-danger">*</span></label>
                        <input type="date" class="form-control" id="to_date" name="to_date" value="@if(isset($promotion)){{date('Y-m-d', strtotime($promotion->to_date))}}@endif" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3 col-6">
                    <div class="mb-3 mb-lg-0">
                        <label class="form-label" for="priceText">Số tiền lớn nhất có thể áp dụng </label>
                        <input type="text" class="form-control class-max_discount" value="@if(isset($promotion)){{ number_format($promotion->max_discount) }}@endif" placeholder="Chỉ nhập số">
                        <input type="hidden" class="form-control" value="@if(isset($promotion)){{ $promotion->price }}@endif" name="max_discount" placeholder="Chỉ nhập số">
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="mb-3 mb-lg-0">
                        <label class="form-label" for="priceText">Chỉ áp dụng cho đơn lớn hơn</label>
                        <input type="text" class="form-control class-min_total" value="@if(isset($promotion)){{ number_format($promotion->min_total) }}@endif" placeholder="Chỉ nhập số">
                        <input type="hidden" class="form-control" value="@if(isset($promotion)){{ $promotion->min_total }}@endif" name="min_total" placeholder="Chỉ nhập số">
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="mb-3 mb-lg-0">
                        <label class="form-label" for="priceText">Cố định số tiền KM</label>
                        <input type="text" class="form-control class-fixed_price" value="@if(isset($promotion)){{ number_format($promotion->fixed_price) }}@endif" placeholder="Chỉ nhập số">
                        <input type="hidden" class="form-control" value="@if(isset($promotion)){{ $promotion->fixed_price }}@endif" name="fixed_price" placeholder="Chỉ nhập số">
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="mb-3 mb-lg-0">
                        <label class="form-label" for="priceText">Khuyến mãi theo phần trăm</label>
                        <input type="number" max="100" class="form-control" value="@if(isset($promotion)){{ $promotion->fixed_percent }}@endif" name="fixed_percent" placeholder="Chỉ nhập số">
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@section('script')
    <script src="{{ URL::asset('/assets/js/pages/profile-setting.init.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/prismjs/prismjs.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/dropzone/dropzone.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/project-create.init.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/prismjs/prismjs.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/list.pagination.js/list.pagination.js.min.js') }}"></script>
    <script src="{{ URL::asset('backend/assets/js/checkUrl.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('body').delegate('.class-max_discount','keyup',function() {
                const val = $(this).val();
                const money = convertMoney(val);
                $(this).parent().find('input[name="max_discount"]').val(val.replaceAll(',', ''));
                $(this).val(money);
            });
            $('body').delegate('.class-min_total','keyup',function() {
                const val = $(this).val();
                const money = convertMoney(val);
                $(this).parent().find('input[name="min_total"]').val(val.replaceAll(',', ''));
                $(this).val(money);
            });
            $('body').delegate('.class-fixed_price','keyup',function() {
                const val = $(this).val();
                const money = convertMoney(val);
                $(this).parent().find('input[name="fixed_price"]').val(val.replaceAll(',', ''));
                $(this).val(money);
            });
        })
    </script>
@endsection
