@extends('admin.layouts.master')
@section('title')
    Quản lý sản phẩm
@endsection
@section('css')
    <link href="{{ URL::asset('assets/css/bootstrap.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Quản lý người dùng</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="/admin/user">Danh sách người dùng</a>
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
          @if(isset($user))
              action="{{ route('admin.users.update', $user->id) }}"
          @else
              action="{{ route('admin.users.store') }}"
        @endif
    >
        @if(isset($user))
            @method('put')
        @endif
        @csrf
        <div class="mb-3 d-flex justify-content-end">
            <button class="btn btn-primary waves-effect waves-light">
                <a><i class="las la-save"></i> Lưu</a>
            </button>
        </div>
        <div class="card form-style">
            <div class="card-body">
                <div class="tab-pane active" id="home1" role="tabpanel">
                    <input type="hidden" name="created_by" value='{{\Auth::user()->id}}'>
                    <div class="col-lg-12">
                        <label class="form-label p-2">Ảnh đại diện </label>
                        <div class="card-body p-4">
                            <div class="text-center">
                                <div class="profile-user position-relative d-inline-block mx-auto h-100 w-100 mb-4" style="max-height: 200px">
                                    <img src="@if(isset($user)) {{ URL::asset($user->avatar) }} @else {{ URL::asset('assets/images/verification-img.png') }} @endif "
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
                    <div class="mb-3 row">
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="name">Tên người dùng <span class="text-danger">*</span></label>
                            <input type="text" id="name" class="form-control" value="@if(isset($user)){{$user->name}}@endif" name="name" placeholder="Nhập tên người dùng" required>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="name">Email <span class="text-danger">*</span></label>
                                <input type="text" id="name" class="form-control" value="@if(isset($user)){{$user->email}}@endif" name="email" placeholder="Nhập email" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end card-body -->
        </div><!-- end card -->
    </form>
@endsection
@section('script')

    <script src="{{ URL::asset('/assets/js/pages/profile-setting.init.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection
