@extends('admin.layouts.master')
@section('title')
    Quản lý khách hàng
@endsection
@section('css')
    <link href="{{ URL::asset('assets/libs/dropzone/dropzone.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Quản lý khách hàng</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="/admin/khach-hang">Danh sách khách hàng</a>
                        </li>
                        <li class="breadcrumb-item">
                            @if(isset($customer))
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
          @if(isset($customer))
              action="{{ route('admin.customers.update', $customer->id) }}"
          @else
              action="{{ route('admin.customers.store') }}"
            @endif
    >
        @if(isset($customer))
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
            <div class="col-lg-12">
                <label class="form-label p-2">Ảnh khách hàng</label>
                <div class="card-body p-4">
                    <div class="text-center">
                        <div class="profile-user position-relative d-inline-block mx-auto h-100 w-100 mb-4" style="max-height: 200px">
                            <img src="@if(isset($customer)) {{ URL::asset($customer->image) }} @else {{ URL::asset('assets/images/verification-img.png') }} @endif "
                                 class="h-100 img-thumbnail user-profile-image" alt="user-profile-image"
                                 style="max-height: 200px"
                            >
                            <div class="avatar-xs p-0 rounded-circle profile-photo-edit">
                                <input id="profile-img-file-input" name="thumbnail" type="file" class="profile-img-file-input" accept="image/png, image/gif, image/jpeg">
                                <label for="profile-img-file-input" class="profile-photo-edit avatar-xs">
                                        <span class="avatar-title rounded-circle bg-light text-body">
                                            <i class="ri-camera-fill"></i>
                                        </span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-10 col-sm-10">
                    <div class="gap-4">
                        <label class="form-label" for="customer_name">Tên khách hàng <span class="text-danger">*</span></label>
                        <input type="text" @if(isset($customer)) value="{{$customer->name}}" @endif id="customer_name" class="form-control" name="name" placeholder="Nhập tên khách hàng" required>
                    </div>
                </div>
                <div class="col-2 col-sm-2">
                    <div class="mb-3 mb-lg-0">
                        <label class="form-label" for="project-title-input">Số thứ tự</label>
                        <input type="number" value="@if(isset($customer)){{$customer->ordering}}@else 0 @endif"  name="ordering" id="ordering" class="form-control"
                               placeholder="Nhập vị trí">
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-lg-6">
                    <div class="mb-3 mb-lg-0">
                        <label class="form-label" for="address">Địa chỉ</label>
                        <input type="text" value="@if(isset($customer)){{$customer->address}}@endif" name="address" id="address" class="form-control"
                               placeholder="Nhập địa chỉ khách hàng">
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="mb-3 mb-lg-0">
                        <label class="form-label" for="phone_number">Phone number</label>
                        <input type="text" value="@if(isset($customer)){{$customer->phone_number}}@endif" name="phone_number" id="phone_number" class="form-control"
                               placeholder="Nhập số điện thoại">
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
@endsection
