@extends('admin.layouts.master')
@section('title')
    Quản lý sản phẩm
@endsection
@section('css')
    <link href="{{ URL::asset('assets/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('/assets/css/select2/select2.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/libs/dropzone/dropzone.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="{{ URL::asset('assets/libs/@simonwep/@simonwep.min.css') }}" />
    <link href="{{ URL::asset('assets/libs/filepond/filepond.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Quản lý nhận xét sản phẩm</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="/admin/product-review">Danh sách nhận xét sản phẩm</a>
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
          @if(isset($productReview))
              action="{{ route('admin.product_reviews.update', $productReview->id) }}"
          @else
              action="{{ route('admin.product_reviews.store') }}"
        @endif
    >
        @if(isset($productReview))
            @method('put')
        @endif
        @csrf
        <div class="mb-3 d-flex justify-content-end">
            <button class="btn btn-primary waves-effect waves-light">
                @if(isset($productReview))
                    <a>Chỉnh sửa</a>
                @else
                    <a>Thêm mới</a>
                @endif
            </button>
        </div>
        <div class="card form-style">
            <div class="card-body">
                <input type="hidden" id="product_review_id" name="product_review_id" value="@if(isset($productReview)){{$productReview->id}}@endif">
                <input type="hidden" name="created_by" value='{{\Auth::user()->id}}'>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <input
                            type="file" name="gallery[]" multiple accept="image/png, image/gif, image/jpeg"
                        />
                        <p class="help-block">{{ $errors->first('gallery.*') }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3">
                        <label class="form-label" for="name">Tên người đánh giá <span class="text-danger">*</span></label>
                        <input type="text" id="name" class="form-control" value="@if(isset($productReview)){{$productReview->comment_by}}@endif" name="comment_by" placeholder="Nhập tên sản phẩm" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="project-title-input">Mô tả <span class="text-danger">*</span></label>
                        <textarea rows="5" type="text" class="form-control" id="description" name="description" placeholder="Nhập mô tả" required>@if(isset($productReview)){!! $productReview->description !!}@endif</textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-4">
                        <div class="mb-3 mb-lg-0">
                            <label for="choices-sex-input" class="form-label">Sản phẩm được đánh giá</label>
                            <select class="form-select select2_select-product" name="product_id" id="product_id" required>
                                {!! $product_html !!}
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3 mb-lg-0">
                            <label class="form-label" for="project-title-input">Vị trí</label>
                            <input maxlength="10" type="number" name="ordering" id="ordering" value="@if(isset($productReview)){{$productReview->ordering}}@endif" class="form-control" placeholder="Nhập vị trí">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3 mb-lg-0 d-flex flex-column">
                            <label class="form-label" for="project-title-input">Đánh giá sản phẩm</label>
                            <div dir="ltr">
                                <div id="rater-onhover" data-rating="@if(isset($productReview)) {{$productReview->rate}} @else 5 @endif" class="align-middle"></div>
                                <span class="ratingnum badge bg-info align-middle ms-2"></span>
                                <input type="text" class="ratingnum-input" value="@if(isset($productReview)) {{$productReview->rate}} @else 5 @endif" hidden="" name="rate">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="content">Nội dung</label>
                    <textarea type="text" class="form-control" id="content" name="discription" placeholder="Nhập nội dung">@if(isset($productReview)) {!! $productReview->discription !!} @endif</textarea>
                </div>
            </div><!-- end card-body -->
        </div><!-- end card -->
    </form>
@endsection
@section('script')
    <script src="{{ URL::asset('/assets/libs/rater-js/rater-js.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/rating.init.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/checkUrl.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/select2/select2.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/filepond/filepond-plugin-image-resize.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/filepond/filepond.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>

    <script>
        FilePond.registerPlugin(FilePondPluginImagePreview);
        //FilePond.create(document.querySelector('input[name="gallery[]"]'), {chunkUploads: true});
        $(document).ready(function () {
            $('.select2_select-product').select2({
                multiple: false,
                placeholder: 'Chọn sản phẩm được đánh giá',
            });

            const productReviewId = $('#product_review_id').val();
            let dataImage = '';
            if (productReviewId.length) {
                getImagesProductReview(productReviewId).then((data) => {
                    dataImage = data;
                });


            }
            setTimeout(() => {
                FilePond.create(
                    document.querySelector('input[name="gallery[]"]'),
                    {
                        multiple: true,
                        chunkUploads: true,
                        labelIdle: 'Kéo và thả ảnh của bạn hoặc chọn từ thư mục (52*52)',
                        imagePreviewHeight: 170,
                        imageCropAspectRatio: 0.5,
                        imageResizeTargetWidth: 200,
                        imageResizeTargetHeight: 200,
                        styleLoadIndicatorPosition: 'center bottom',
                        styleProgressIndicatorPosition: 'right bottom',
                        styleButtonRemoveItemPosition: 'left bottom',
                        styleButtonProcessItemPosition: 'right bottom',
                        maxFileSize: '7MB',
                        acceptedFileTypes: ['image/png', 'image/jpeg'],
                        files: dataImage['data'],
                    }
                );
            }, 200)
            FilePond.setOptions({
                server: {
                    //load: '/api/upload-image/products',
                    url: "/api/upload-image/productReviews",
                    headers: {
                        'X-CSRF-TOKEN': "{{ @csrf_token() }}",
                    },
                }
            });
        })
    </script>
@endsection
