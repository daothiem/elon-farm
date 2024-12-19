@extends('admin.layouts.master')
@section('title')
    Quản lý thông tin cơ bản
@endsection
@section('css')
    <link href="{{ URL::asset('assets/libs/dropzone/dropzone.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Quản lý thông tin cơ bản</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="/admin">Dashboard</a>
                        </li>
                    </ol>
                </div>
            </div>

        </div>
    </div>

    <form method="POST" id="form-action" enctype="multipart/form-data"
          action="{{ route('admin.about_us.update') }}"
    >
        @method('put')
        @csrf
        <div class="mb-3 d-flex justify-content-end">
            <button class="btn btn-primary waves-effect waves-light">
                <a><i class="las la-save"></i> Lưu</a>
            </button>
        </div>

        <div class="card card-body">
            <input type="hidden" name="created_by" value='{{\Auth::user()->id}}'>
            <div class="row">
                <div class="col-12 col-md-6">
                    <label class="form-label p-2">Ảnh logo trên PC</label>
                    <div class="card-body p-4">
                        <div class="text-center">
                            <div class="profile-user position-relative d-inline-block mx-auto h-100 w-100 mb-4">
                                <img src="{{URL::asset($data->logo_pc)}}"
                                     class="h-100 img-thumbnail color-image-image" alt="user-profile-image"
                                     style="max-height: 70px"
                                     id="preview-color-image-input-1"
                                >
                                <div class="avatar-xs p-0 rounded-circle profile-photo-edit">
                                    <input id="color-image-input-1" name="logo_pc" type="file"
                                           class="profile-img-file-input file-1"
                                           accept="image/*"
                                    >
                                    <label for="color-image-input-1" class="profile-photo-edit avatar-xs">
                                            <span class="avatar-title rounded-circle bg-light text-body">
                                                <i class="ri-camera-fill"></i>
                                            </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <label class="form-label p-2">Ảnh logo trên mobile</label>
                    <div class="card-body p-4">
                        <div class="text-center">
                            <div class="profile-user position-relative d-inline-block mx-auto h-100 w-100 mb-4">
                                <img src="{{URL::asset($data->logo_mobile)}}"
                                     class="h-100 img-thumbnail color-image-image" alt="user-profile-image"
                                     style="max-height: 70px"
                                     id="preview-color-image-input-2"
                                >
                                <div class="avatar-xs p-0 rounded-circle profile-photo-edit">
                                    <input id="color-image-input-2" name="logo_mobile" type="file"
                                           class="profile-img-file-input file-2"
                                           accept="image/*"
                                    >
                                    <label for="color-image-input-2" class="profile-photo-edit avatar-xs">
                                        <span class="avatar-title rounded-circle bg-light text-body">
                                            <i class="ri-camera-fill"></i>
                                        </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex gap-4">
                <div class="mb-3 w-50">
                    <label class="form-label" for="phone_number">Số điện thoại <span class="text-danger">*</span></label>
                    <input type="text" @if(isset($data)) value="{{$data->phone_number}}" @endif id="phone_number" class="form-control" name="phone_number" placeholder="Nhập số điện thoại">
                </div>
                <div class="mb-3 w-50">
                    <label class="form-label" for="address">Địa chỉ</label>
                    <input type="text" @if(isset($data)) value="{{$data->address}}" @endif id="address" class="form-control" name="address" placeholder="Nhập địa chỉ">
                </div>
            </div>

            <div class="d-flex gap-4">
                <div class="mb-3 w-50">
                    <label class="form-label" for="working_time">Thời gian mở cửa</label>
                    <input type="text" @if(isset($data)) value="{{$data->working_time}}" @endif id="working_time" class="form-control" name="working_time" placeholder="Nhập thời gian mở của từ ~ đến mấy giờ hàng ngày">
                </div>
                <div class="mb-3 w-50">
                    <label class="form-label" for="map">Map</label>
                    <input type="text" @if(isset($data)) value="{{$data->map}}" @endif id="map" class="form-control" name="map" placeholder="Nhập iframe map">
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
        $('document').ready(function () {
            $(document).on('change', '.profile-img-file-input', function () {
                const input = $(this); // Input hiện tại
                const uniqueId = input.attr('id').replace('file-', ''); // Lấy ID duy nhất từ input
                const file = input[0].files[0]; // Lấy file

                if (file) {
                    const reader = new FileReader(); // FileReader để đọc file

                    reader.onload = function (e) {
                        // Gán src cho ảnh tương ứng
                        $(`#preview-${uniqueId}`) // Chọn ảnh bằng ID duy nhất
                            .attr('src', e.target.result) // Gán src bằng kết quả file
                            .show(); // Hiển thị ảnh
                    };

                    reader.readAsDataURL(file); // Đọc file dưới dạng URL

                    $(`#color-image-input-${uniqueId}`).val(input.val());

                }
            });
        })
    </script>
@endsection
