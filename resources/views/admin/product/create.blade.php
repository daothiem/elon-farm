@extends('admin.layouts.master')
@section('title')
    Quản lý sản phẩm
@endsection
@section('css')
    <link href="{{ URL::asset('assets/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('/assets/css/select2/select2.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/libs/dropzone/dropzone.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">

    <link href="{{ URL::asset('assets/libs/filepond/filepond.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css') }}"
          rel="stylesheet">
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Quản lý sản phẩm</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="/admin/san-pham">Danh sách sản phẩm</a>
                        </li>
                        <li class="breadcrumb-item">
                            @if(isset($product))
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
          @if(isset($product))
              action="{{ route('admin.products.update', $product->id) }}"
          @else
              action="{{ route('admin.products.store') }}"
            @endif
    >
        @if(isset($product))
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
                <!-- Nav tabs -->
                <ul class="nav nav-tabs nav-tabs-custom nav-success nav-justified mb-3" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#home1" role="tab">
                            Thông tin cơ bản
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#profile1" role="tab">
                            Cấu hình SEO
                        </a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content text-muted">
                    <div class="tab-pane active" id="home1" role="tabpanel">
                        <input type="hidden" id="product_id" name="product_id"
                               value="@if(isset($product)){{$product->id}}@endif">
                        <input name="deleted_product_color_id" type="hidden">
                        <input type="hidden" name="created_by" value='{{\Auth::user()->id}}'>
                        <div class="col-lg-12">
                            <label class="form-label p-2">Ảnh đại diện sản phẩm</label>
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <div class="profile-user position-relative d-inline-block mx-auto h-100 w-100 mb-4"
                                         style="max-height: 200px">
                                        <img src="@if(isset($product)) {{ URL::asset($product->avatar) }} @else {{ URL::asset('assets/images/verification-img.png') }} @endif "
                                             class="h-100 img-thumbnail user-profile-image" alt="user-profile-image"
                                             style="max-height: 200px"
                                        >
                                        <div class="avatar-xs p-0 rounded-circle profile-photo-edit">
                                            <input id="profile-img-file-input" name="thumbnail" type="file"
                                                   class="profile-img-file-input"
                                                   accept="image/png, image/gif, image/jpeg"
                                            >
                                            <label for="profile-img-file-input" class="profile-photo-edit avatar-xs">
                                        <span class="avatar-title rounded-circle bg-light text-body">
                                            <i class="ri-camera-fill"></i>
                                        </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <label class="form-label p-2">Gallery</label>
                             <div class="row">
                                 <div class="col-lg-8 offset-lg-2">
                                     <input
                                         type="file" name="gallery[]" multiple accept="image/png, image/gif, image/jpeg"
                                     />
                                     <p class="help-block">{{ $errors->first('gallery.*') }}</p>
                                 </div>
                             </div>--}}

                        </div>
                        {{--<div class="row">
                            <div class="col-lg-8 offset-lg-2">
                                <input
                                        type="file" name="gallery[]" multiple accept="image/png, image/gif, image/jpeg"
                                />
                                <p class="help-block">{{ $errors->first('gallery.*') }}</p>
                            </div>
                        </div>--}}
                        <div class="row">
                            <div
                                style="border: 1px solid rgba(0, 0, 0, .125);
                                border-radius: 0.25rem;" class="col-12 col-sm-12 col-xl-7"
                            >
                                <div class="mb-3">
                                    <label class="form-label" for="name">Tên sản phẩm <span class="text-danger">*</span></label>
                                    <input type="text" id="name" class="form-control"
                                           value="@if(isset($product)){{$product->name}}@endif" name="name"
                                           placeholder="Nhập tiêu đề" required>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-9">
                                        <label class="form-label" for="alias">Đường dẫn</label>
                                        <input type="text" id="alias"
                                               value="@if(isset($product)){{$product->alias}}@endif"
                                               class="form-control" name="alias" readonly required>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-check form-switch form-switch-md mb-3 text-center d-flex flex-column align-items-start p-0"
                                             dir="ltr">
                                            <label class="form-label" for="news-index">Sp Nổi bật</label>
                                            <input type="checkbox" style="left: 0 !important;"
                                                   class="form-check-input m-0"
                                                   @if(isset($product) && $product->is_hot) checked @endif name="is_hot"
                                                   id="news-index">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-8">
                                        <div class="mb-3 mb-lg-0">
                                            <label class="form-label" for="subtitle">Phụ đề</label>
                                            <input type="text" name="subtitle" id="subtitle"
                                                   value="@if(isset($product)){{$product->subtitle}}@endif"
                                                   class="form-control" placeholder="Nhập phụ tiêu đề">
                                        </div>
                                    </div>
                                    {{--<div class="col-2">
                                        <div class="mb-3 mb-lg-0">
                                            <label class="form-label" for="priceText">Giá tiền</label>
                                            <input type="text" class="form-control class-price" value="@if(isset($product)){{ number_format($product->price) }}@endif" placeholder="Chỉ nhập số" required>
                                            <input type="hidden" class="form-control" value="@if(isset($product)){{ $product->price }}@endif" name="price" placeholder="Chỉ nhập số" required>
                                        </div>
                                    </div>--}}
                                    <div class="col-lg-4">
                                        <div class="mb-3 mb-lg-0">
                                            <label class="form-label" for="project-title-input">Vị trí</label>
                                            <input maxlength="10" type="number" name="ordering" id="ordering"
                                                   value="@if(isset($product)){{$product->ordering}}@endif"
                                                   class="form-control" placeholder="Nhập vị trí">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-5">
                                        <div class="mb-3 mb-lg-0">
                                            <label for="choices-sex-input" class="form-label">Danh mục <span
                                                        class="text-danger">*</span></label>
                                            <select class="form-select select2_select-categories" name="category_id"
                                                    id="category_id" required>
                                                {!! $category_html !!}
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <div>
                                            <label for="datepicker-deadline-input" class="form-label">Từ khóa</label>
                                            <select id="select-tags" class="form-control select2_select-tags"
                                                    multiple="multiple" name="tags[]"></select>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="project-title-input">Mô tả</label>
                                    <textarea type="text" class="form-control" id="description" name="description"
                                              placeholder="Nhập mô tả" required>@if(isset($product))
                                            {!! $product->description !!}
                                        @endif</textarea>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="content">Giới thiệu sản phẩm</label>
                                    <textarea type="text" class="form-control" id="content" name="content"
                                              placeholder="Nhập nội dung giới thiệu sản phẩm">@if(isset($product))
                                            {!! $product->content !!}
                                        @endif</textarea>
                                </div>
                                {{--<div class="mb-3">
                                    <label class="form-label" for="content">Hướng dẫn sử dụng</label>
                                    <textarea type="text" class="form-control" id="note" name="note"
                                              placeholder="Nhập nội dụng lưu ý với sản phẩm">@if(isset($product))
                                            {!! $product->note !!}
                                        @endif</textarea>
                                </div>--}}
                            </div>
                            <div class="col-12 col-sm-12 col-xl-5">
                                <div
                                    style="border: 1px solid rgba(0, 0, 0, .125);
                                    border-radius: 0.25rem; padding: 0 15px 15px 15px"
                                    class="list-color w-100"
                                >
                                    <div class="text-right mt-2">
                                        <button class="btn btn-primary add-color" type="button">
                                            <i class="bi bi-clipboard-plus"></i>
                                        </button>
                                    </div>

                                    @if(isset($product))
                                        @foreach($product->colors as $key => $color)
                                            <div class="row border-bottom-dash mt-3" id="row-{{$key}}">
                                                <input type="hidden" name="colors[{{$key}}][id]" value="{{$color->id}}">
                                                <div class="col-6 col-lg-6 col-xl-4">
                                                    <div>
                                                        <label for="name-color" class="form-label">Tên màu</label>
                                                        <input type="text" id="name-color" class="form-control"
                                                               value="{{$color->name}}" name="colors[{{$key}}][name]"
                                                               placeholder="Nhập tên" required>
                                                    </div>
                                                </div>
                                                <div class="col-6 col-lg-6 col-xl-4">
                                                    <div class="mb-3 mb-lg-0">
                                                        <label class="form-label" for="priceText">Giá tiền</label>
                                                        <input type="text" class="form-control class-price" value="{{ number_format($color->price) }}" placeholder="Chỉ nhập số" required>
                                                        <input type="hidden" class="form-control price-hidden" value="{{$color->price}}" name="colors[{{$key}}][price]" placeholder="Chỉ nhập số" required>
                                                    </div>
                                                </div>
                                                <div class="col-6 col-lg-6 col-xl-4">
                                                    <div class="mb-3 mb-lg-0">
                                                        <label class="form-label" for="priceText">Giá tiền discount</label>
                                                        <input type="text" class="form-control class-price" value="{{ number_format($color->price_discount) }}" placeholder="Chỉ nhập số" required>
                                                        <input type="hidden" class="form-control price-hidden" value="{{$color->price_discount}}" name="colors[{{$key}}][price_discount]" placeholder="Chỉ nhập số" required>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-12">
                                                    <div class="row">
                                                        <div class="col-9 col-sm-9">
                                                            <label class="form-label p-2">Ảnh sản phẩm</label>
                                                            <div class="card-body p-2 container-image">
                                                                <div class="text-center">
                                                                    <div class="profile-user position-relative d-inline-block mx-auto h-100 w-100 mb-4">
                                                                        <img src="{{URL::asset($color->image)}}"
                                                                             class="h-100 img-thumbnail color-image-image" alt="user-profile-image"
                                                                             style="max-height: 70px"
                                                                             id="preview-color-image-input-{{$key}}"
                                                                        >
                                                                        <div class="avatar-xs p-0 rounded-circle profile-photo-edit">
                                                                            <input id="color-image-input-{{$key}}" name="colors[{{$key}}][image]" type="file"
                                                                                   class="profile-img-file-input file-{{$key}}"
                                                                                   accept="image/png, image/gif, image/jpeg"
                                                                            >
                                                                            <label for="color-image-input-{{$key}}" class="profile-photo-edit avatar-xs">
                                                                                <span class="avatar-title rounded-circle bg-light text-body">
                                                                                    <i class="ri-camera-fill"></i>
                                                                                </span>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-3 col-sm-3 d-flex justify-content-center align-items-center">
                                                            <div>
                                                                <button type="button" class="btn btn-danger delete-color" data-row="{{$key}}" data-product_color_id="{{$color->id}}">
                                                                    <i class="bi bi-trash"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="row border-bottom-dash" id="row-0">
                                            <div class="col-6 col-lg-6 col-xl-4">
                                                <div>
                                                    <label for="name-color" class="form-label">Tên màu</label>
                                                    <input type="text" id="name-color" class="form-control"
                                                           value=""  name="colors[0][name]"
                                                           placeholder="Nhập tên" required>
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-6 col-xl-4">
                                                <div class="mb-3 mb-lg-0">
                                                    <label class="form-label" for="priceText">Giá tiền</label>
                                                    <input type="text" class="form-control class-price" value="0" placeholder="Chỉ nhập số" required>
                                                    <input type="hidden" class="form-control price-hidden" value="0" name="colors[0][price]" placeholder="Chỉ nhập số" required>
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-6 col-xl-4">
                                                <div class="mb-3 mb-lg-0">
                                                    <label class="form-label" for="priceText">Giá tiền discount</label>
                                                    <input type="text" class="form-control class-price" value="" placeholder="Chỉ nhập số" required>
                                                    <input type="hidden" class="form-control price-hidden" value="" name="colors[0][price_discount]" placeholder="Chỉ nhập số" required>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-12">
                                                <label class="form-label p-2">Ảnh sản phẩm</label>
                                                <div class="card-body p-2 container-image">
                                                    <div class="text-center">
                                                        <div class="profile-user position-relative d-inline-block mx-auto h-100 w-100 mb-4">
                                                            <img src=""
                                                                 class="h-100 img-thumbnail color-image-image" alt="user-profile-image"
                                                                 style="max-height: 70px"
                                                                 id="preview-color-image-input-0"
                                                            >
                                                            <div class="avatar-xs p-0 rounded-circle profile-photo-edit">
                                                                <input id="color-image-input-0" name="colors[0][image]" type="file"
                                                                       class="profile-img-file-input file-0"
                                                                       accept="image/png, image/gif, image/jpeg">
                                                                <label for="color-image-input-0" class="profile-photo-edit avatar-xs">
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
                                    @endif

                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane" id="profile1" role="tabpanel">
                        <div class="mb-3">
                            <label class="form-label" for="project-title-input">Meta Title</label>
                            <textarea type="text" class="form-control" id="meta_title" name="meta_title"
                                      placeholder="Nhập mô tả">@if(isset($product))
                                    {{$product->meta_title}}
                                @endif</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="project-title-input">Meta description</label>
                            <textarea type="text" class="form-control" id="meta_description" name="meta_description"
                                      placeholder="Nhập mô tả">@if(isset($product))
                                    {!!$product->meta_description!!}
                                @endif</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="project-title-input">Meta key word</label>
                            <textarea type="text" class="form-control" id="meta_key_word" name="meta_key_word"
                                      placeholder="Nhập mô tả">@if(isset($product))
                                    {!! $product->meta_key_word !!}
                                @endif</textarea>
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
    <script src="https://cdn.ckeditor.com/4.5.11/full-all/ckeditor.js"></script>
    <script src="{{ URL::asset('/assets/js/select2/select2.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ URL::asset('assets/js/filepond/filepond-plugin-image-resize.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/filepond/filepond.min.js') }}"></script>

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
            CKEDITOR.replace('note', options);
            CKEDITOR.replace('description', options);

            $('#name').focusout(async function (e) {
                let alias = ChangeToSlug($('#name').val());
                let res = await checkURL({
                    'alias': alias,
                    'module': 'Product'
                })
                if (!res) $('#alias').val(alias);
                else $('#alias').val(alias + `-${res}`)
            });

            const productId = $('#product_id').val();
            let dataProduct = ''
            getData('/api/options/Product/tags', productId).then((data) => {
                dataProduct = data
            });

            setTimeout(() => {
                $('.select2_select-tags').select2({
                    tags: true,
                    placeholder: 'Có thể chọn nhiều tags',
                    data: dataProduct['data'],

                    insertTag: async function (data, tag) {
                        //data = tags.data['data'];
                        data.push(tag);
                    }
                });
            }, 400)

            $('.select2_select-tags').on('select2:select', async function (e) {
                if (typeof e.params.data['disabled'] === 'undefined') {
                    const tags = await insertTag(e.params.data);
                    dataProduct = tags['data'];
                }
            });

            $('.select2_select-categories').select2({
                multiple: false,
                placeholder: 'Chọn danh mục sản phẩm',
            });

            $('body').delegate('.class-price', 'keyup', function () {
                const val = $(this).val();
                const money = convertMoney(val);
                $(this).parent().find('.price-hidden').val(val.replaceAll(',', ''));
                $(this).val(money);
            });
        })
    </script>
    <script>
        let rowCounter = {!! json_encode($rowCounter) !!};
        $(document).ready(function () {
            $(document).on('click', '.add-color', function () {
                rowCounter++;
                const uniqueId = `row-${rowCounter}`;
                // Tạo một row mới
                var newRow = `
            <div class="row mt-3 border-bottom-dash" id="${uniqueId}">
                <div class="col-6 col-lg-6 col-xl-4">
                    <div>
                        <label for="name-color" class="form-label">Tên màu</label>
                        <input type="text" id="name-color" class="form-control"
                               value="" name="colors[${rowCounter}][name]"
                               placeholder="Nhập tên" required>
                    </div>
                </div>
                <div class="col-6 col-lg-6 col-xl-4">
                    <div class="mb-3 mb-lg-0">
                        <label class="form-label" for="priceText">Giá tiền</label>
                        <input type="text" class="form-control class-price" value="" placeholder="Chỉ nhập số" required>
                        <input type="hidden" class="form-control price-hidden" value="" name="colors[${rowCounter}][price]" placeholder="Chỉ nhập số" required>
                    </div>
                </div>
                <div class="col-6 col-lg-6 col-xl-4">
                    <div class="mb-3 mb-lg-0">
                        <label class="form-label" for="priceText">Giá tiền discount</label>
                        <input type="text" class="form-control class-price" value="0" placeholder="Chỉ nhập số" required>
                        <input type="hidden" class="form-control price-hidden" value="0" name="colors[${rowCounter}][price_discount]" placeholder="Chỉ nhập số" required>
                    </div>
                </div>

                <div class="col-12 col-lg-12">
                    <div class="row">
                        <div class="col-9 col-sm-9">
                               <label class="form-label p-2">Ảnh sản phẩm</label>
                                <div class="card-body p-2 container-image">
                                    <div class="text-center">
                                        <div class="profile-user position-relative d-inline-block mx-auto h-100 w-100 mb-4">
                                            <img src=""
                                                 class="h-100 img-thumbnail color-image-image" alt="user-profile-image"
                                                 style="max-height: 70px"
                                                 id="preview-color-image-input-${uniqueId}"
                                            >
                                            <div class="avatar-xs p-0 rounded-circle profile-photo-edit">
                                                <input id="color-image-input-${uniqueId}" name="colors[${rowCounter}][image]" type="file"
                                                       class="profile-img-file-input file-${uniqueId}"
                                                       accept="image/png, image/gif, image/jpeg">
                                                <label for="color-image-input-${uniqueId}" class="profile-photo-edit avatar-xs">
                                                    <span class="avatar-title rounded-circle bg-light text-body">
                                                        <i class="ri-camera-fill"></i>
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="col-3 col-sm-3 d-flex justify-content-center align-items-center">
                            <div>
                                <button type="button" class="btn btn-danger delete-color" data-row="${rowCounter}">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>

                        </div>
                    </div>

                </div>
            </div>`;

                // Thêm row mới vào cuối thẻ div .list-color
                $('.list-color').append(newRow);
            });

            // Xử lý sự kiện thay đổi file
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

            $('body').delegate('.delete-color', 'click', function () {
                const product_color = $(this).data('product_color_id');
                const data_row = $(this).data('row');
                $(`#row-${data_row}`).remove();
                if (typeof product_color !== 'undefined') {
                    let currentValue = $('input[name="deleted_product_color_id"]').val();
                    let idArray = currentValue ? currentValue.split(',') : [];

                    if (!idArray.includes(product_color.toString())) {
                        idArray.push(product_color);
                    }

                    $('input[name="deleted_product_color_id"]').val(idArray.join(','));
                }
            })

        });
    </script>
@endsection
