@extends('admin.layouts.master')
@section('title')
    Quản lý nhân viên
@endsection
@section('css')
    <link href="{{ URL::asset('assets/libs/dropzone/dropzone.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Quản lý nhân viên</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="/admin/nhan-vien">Danh sách nhan vien</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a><i class="las la-save"></i> Lưu</a>
                        </li>
                    </ol>
                </div>
            </div>

        </div>
    </div>

    <form method="POST" id="form-action" enctype="multipart/form-data"
          @if(isset($staff))
              action="{{ route('admin.staffs.update', $staff->id) }}"
          @else
              action="{{ route('admin.staffs.store') }}"
        @endif
    >
        @if(isset($staff))
            @method('put')
        @endif
        @csrf
        <div class="mb-3 d-flex justify-content-end">
            <button class="btn btn-primary waves-effect waves-light">
                @if(isset($staff))
                    <a>Chỉnh sửa</a>
                @else
                    <a>Thêm mới</a>
                @endif
            </button>
        </div>

        <div class="card card-body">
            <input type="hidden" name="created_by" value='{{\Auth::user()->id}}'>
            {{--<div class="col-lg-12">
                <label class="form-label p-2">Ảnh đại diện</label>
                <div class="card-body p-4">
                    <div class="text-center">
                        <div class="profile-user position-relative d-inline-block mx-auto h-100 w-100 mb-4" style="max-height: 200px">
                            <img src="@if(isset($staff)) {{ URL::asset($staff->avatar) }} @else {{ URL::asset('assets/images/verification-img.png') }} @endif "
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
            </div>--}}

            <div class="d-flex gap-4">
                <div class="mb-3 w-50">
                    <label class="form-label" for="title">Tên nhân viên <span class="text-danger">*</span></label>
                    <input type="text" @if(isset($staff)) value="{{$staff->name}}" @endif id="name" class="form-control" name="name" placeholder="Nhập tên nhân viên" required>
                </div>
                <div class="mb-3 w-50">
                    <label class="form-label" for="phoneNumber">Số điện thoại <span class="text-danger">*</span></label>
                    <input type="text" id="phoneNumber" class="form-control" @if(isset($staff)) value="{{$staff->phoneNumber}}" @endif name="phoneNumber" required  placeholder="Nhập số điện thoại">
                </div>
            </div>
            <div class="row mb-3">
                <div class="mb-3 w-50">
                    <label class="form-label" for="position">Vị trí công tác</label>
                    <input type="text" id="position" class="form-control" @if(isset($staff)) value="{{$staff->position}}" @endif name="position" placeholder="Nhập vị trí đang công tác">
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3 mb-lg-0">
                                <label class="form-label" for="project-title-input">Số thứ tự</label>
                                <input maxlength="10" type="number" value="@if(isset($staff)){{$staff->ordering}}@else 0 @endif" name="ordering" id="ordering" class="form-control"
                                       placeholder="Nhập vị trí">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="gender" class="form-label">Giới tính</label>
                            <select class="form-select" name="gender" id="gender">
                                <option @if(!isset($staff) || $staff->gender == null) selected @endif>Chọn giới tính</option>
                                <option value="nam" @if(isset($staff) && $staff->gender === 'nam') selected @endif>Nam</option>
                                <option value="nu" @if(isset($staff) && $staff->gender === 'nu') selected @endif>Nữ</option>
                            </select>
                        </div>
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

@endsection
