@extends('admin.layouts.master')
@section('title')
    Quản lý dịch vụ
@endsection
@section('css')
    <link href="{{ URL::asset('assets/libs/dropzone/dropzone.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Quản lý dịch vụ</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="/admin/dich-vu">Danh sách dịch vụ</a>
                        </li>
                        <li class="breadcrumb-item">
                            @if(isset($service))
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
          @if(isset($service))
              action="{{ route('admin.services.update', $service->id) }}"
          @else
              action="{{ route('admin.services.store') }}"
            @endif
    >
        @if(isset($service))
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
                    <label class="form-label" for="name">Tên dịch vụ <span class="text-danger">*</span></label>
                    <input type="text" @if(isset($service)) value="{{$service->name}}" @endif id="name" class="form-control" name="name" placeholder="Nhập tiêu đề" required>
                </div>
                <div class="mb-3 w-50">
                    <label class="form-label" for="alias">Đừng dẫn</label>
                    <input type="text" id="alias" class="form-control" @if(isset($service)) value="{{$service->alias}}" @endif name="alias" readonly required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-6">
                    <div class="mb-3 mb-lg-0">
                        <label for="type" class="form-label">Phân loại sản phẩm </label>
                        <select class="form-select" name="type" id="type">
                            <option value="" @if(!isset($service)) selected @endif>Vui lòng chọn</option>
                            <option value="1" @if(isset($service) && $service->type == 1) selected @endif>Hỗ trợ khách hàng</option>
                            <option value="2" @if(isset($service) && $service->type == 2) selected @endif>Giới thiệu Sfone97</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3 mb-lg-0">
                        <label class="form-label" for="project-title-input">Số thứ tự</label>
                        <input maxlength="10" type="number" value="@if(isset($service)){{$service->ordering}}@else 0 @endif"  name="ordering" id="ordering" class="form-control"
                               placeholder="Nhập vị trí">
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label" for="content">Giới thiệu về dịch vụ</label>
                <textarea type="text" class="form-control" id="content" name="content"
                          placeholder="Nhập nội dung giới thiệu sản phẩm">
                    @if(isset($service))
                        {!! $service->content !!}
                    @endif
                </textarea>
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
    <script src="{{ URL::asset('assets/js/checkUrl.js') }}"></script>
    <script src="https://cdn.ckeditor.com/4.5.11/full-all/ckeditor.js"></script>


    <script type="text/javascript">
        $(document).ready(function () {
            var options = {
                filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=' + document.querySelector('meta[name="csrf-token"]').content,
                filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token=' + document.querySelector('meta[name="csrf-token"]').content
            };

            CKEDITOR.disableAutoInline = true;
            CKEDITOR.config.versionCheck = false;
            CKEDITOR.config.disableNativeSpellChecker = false;
            CKEDITOR.replace('content', options);

            $('#name').focusout(async function (e) {
                let alias = ChangeToSlug($('#name').val());
                let res = await checkURL({
                    'alias': alias,
                    'module': 'Product'
                })
                if (!res) $('#alias').val(alias);
                else $('#alias').val(alias + `-${res}`)
            });
        })
    </script>
@endsection
