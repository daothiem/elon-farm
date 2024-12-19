@extends('admin.layouts.master')
@section('title')
    Quản lý danh mục sản phẩm
@endsection
@section('css')
    <link href="{{ URL::asset('assets/libs/dropzone/dropzone.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <link href="{{ URL::asset('/assets/css/select2/select2.min.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Quản lý menu</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="/admin/menu">Danh sách danh menu</a>
                        </li>
                        <li class="breadcrumb-item">
                            @if(isset($menu))
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

    <form method="POST" id="form-action"
          @if(isset($menu))
              action="{{ route('admin.menus.update', $menu->id) }}"
          @else
              action="{{ route('admin.menus.store') }}"
        @endif
    >
        @if(isset($menu))
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
                    <label class="form-label" for="title">Tiêu đề <span class="text-danger">*</span></label>
                    <input type="text" @if(isset($menu)) value="{{$menu->title}}" @endif id="title" class="form-control" name="title" placeholder="Nhập tiêu đề" required>
                </div>
                <div class="mb-3 w-50">
                    <label class="form-label" for="url">URL</label>
                    <input type="text" id="url" placeholder="Nhập đường dẫn khi người dùng click" class="form-control" @if(isset($menu)) value="{{$menu->url}}" @endif name="url">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-6">
                    <div class="mb-3 mb-lg-0">
                        <label for="parent_id" class="form-label">Danh mục cha</label>
                        <select class="form-select select2_select-parent" name="parent_id" id="parent_id">
                            {!! $menu_html !!}
                        </select>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3 mb-lg-0">
                        <label class="form-label" for="project-title-input">Số thứ tự</label>
                        <input maxlength="10" type="number" value="@if(isset($menu)){{$menu->ordering}}@else 0 @endif"  name="ordering" id="ordering" class="form-control"
                               placeholder="Nhập vị trí">
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
    <script src="{{ URL::asset('/assets/js/select2/select2.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('.select2_select-parent').select2({
                multiple: false,
                placeholder: 'Chọn menu cha',
            });

            $('#title').focusout(async function (e) {
                let alias = ChangeToSlug($('#title').val());
                let res = await checkURL({
                    'alias': alias,
                    'module': 'NewsCategory'
                })
                if (!res) $('#alias').val(alias);
                else $('#alias').val(alias + `-${res}`)
            })
        })
    </script>
@endsection
