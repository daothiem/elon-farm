@extends('admin.layouts.master')
@section('title')
    Quản lý tiện ích
@endsection
@section('css')
    <link href="{{ URL::asset('assets/libs/dropzone/dropzone.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Quản lý tiện ích</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="/admin/amenity">Danh sách tiện ích</a>
                        </li>
                        <li class="breadcrumb-item">
                            @if(isset($amenity))
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
          @if(isset($amenity))
              action="{{ route('admin.amenities.update', $amenity->id) }}"
          @else
              action="{{ route('admin.amenities.store') }}"
        @endif
    >
        @if(isset($amenity))
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
                    <div class="mb-3 w-100">
                        <label class="form-label" for="name">Tên tiện ích <span class="text-danger">*</span></label>
                        <input type="text" @if(isset($amenity)) value="{{$amenity->name}}" @endif id="name" class="form-control" name="name" placeholder="Nhập tên tiện ích" required>
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
@endsection
