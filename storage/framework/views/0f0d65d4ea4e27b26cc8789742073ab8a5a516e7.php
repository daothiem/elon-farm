<?php $__env->startSection('title'); ?>
    Quản lý sản phẩm
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(URL::asset('assets/css/bootstrap.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(URL::asset('/assets/css/select2/select2.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(URL::asset('assets/libs/dropzone/dropzone.min.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">

    <link href="<?php echo e(URL::asset('assets/libs/filepond/filepond.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(URL::asset('assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Quản lý tour</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="/admin/tour">Danh sách tour</a>
                        </li>
                        <li class="breadcrumb-item">
                            <?php if(isset($product)): ?>
                                <a>Chỉnh sửa</a>
                            <?php else: ?>
                                <a>Tạo mới</a>
                            <?php endif; ?>

                        </li>
                    </ol>
                </div>
            </div>

        </div>
    </div>
    <form method="POST" id="form-action" enctype="multipart/form-data"
          <?php if(isset($product)): ?>
              action="<?php echo e(route('admin.products.update', $product->id)); ?>"
          <?php else: ?>
              action="<?php echo e(route('admin.products.store')); ?>"
            <?php endif; ?>
    >
        <?php if(isset($product)): ?>
            <?php echo method_field('put'); ?>
        <?php endif; ?>
        <?php echo csrf_field(); ?>
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
                               value="<?php if(isset($product)): ?><?php echo e($product->id); ?><?php endif; ?>">
                        <input name="deleted_product_plan_id" type="hidden">
                        <input type="hidden" name="created_by" value='<?php echo e(\Auth::user()->id); ?>'>
                        <div class="row">
                            <div class="col-lg-8 offset-lg-2">
                                <input
                                        type="file" name="gallery[]" multiple accept="image/png, image/gif, image/jpeg"
                                />
                                <p class="help-block"><?php echo e($errors->first('gallery.*')); ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div
                                style="border: 1px solid rgba(0, 0, 0, .125);
                                border-radius: 0.25rem;" class="col-12 col-sm-12 col-xl-7"
                            >
                                <div class="mb-3 pt-3">
                                    <label class="form-label" for="name">Tên sản phẩm <span class="text-danger">*</span></label>
                                    <input type="text" id="name" class="form-control"
                                           value="<?php if(isset($product)): ?><?php echo e($product->name); ?><?php endif; ?>" name="name"
                                           placeholder="Nhập tiêu đề" required>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-12">
                                        <label class="form-label" for="alias">Đường dẫn</label>
                                        <input type="text" id="alias"
                                               value="<?php if(isset($product)): ?><?php echo e($product->alias); ?><?php endif; ?>"
                                               class="form-control" name="alias" readonly required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-12">
                                        <label class="form-label" for="priceText">Giá tiền</label>
                                        <input type="text" class="form-control class-price" value="<?php if(isset($product)): ?><?php echo e(number_format($product->price)); ?><?php endif; ?>" placeholder="Chỉ nhập số" required>
                                        <input type="hidden" class="form-control price-hidden" value="<?php if(isset($product)): ?><?php echo e($product->price); ?><?php endif; ?>" name="price" placeholder="Chỉ nhập số" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-3">
                                        <label class="form-label" for="duration">Duration</label>
                                        <input type="text" id="duration" class="form-control"
                                               value="<?php if(isset($product)): ?><?php echo e($product->duration); ?><?php endif; ?>" name="duration"
                                               placeholder="vd: 2 days">
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-3">
                                        <label class="form-label" for="activity">Hoạt động</label>
                                        <input type="text" id="activity" class="form-control"
                                               value="<?php if(isset($product)): ?><?php echo e($product->activity); ?><?php endif; ?>" name="activity"
                                               placeholder="vd: Coffee Experience">
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-3">
                                        <label class="form-label" for="nature">Nature</label>
                                        <input type="text" id="nature" class="form-control"
                                               value="<?php if(isset($product)): ?><?php echo e($product->nature); ?><?php endif; ?>" name="nature"
                                               placeholder="vd: Adventure & Fun">
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-3">
                                        <label class="form-label" for="nature">Location</label>
                                        <input type="text" id="location" class="form-control"
                                               value="<?php if(isset($product)): ?><?php echo e($product->location); ?><?php endif; ?>" name="location"
                                               placeholder="vd: Elon Farm, Lam Ha, Lam Dong, Vietnam">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-12">
                                        <div class="mb-3 mb-lg-0">
                                            <label for="choices-sex-input" class="form-label">Tiện ích</label>
                                            <select class="form-select select2_select-categories" name="amenity_ids[]" id="amenity_ids">
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3 gap-3">
                                    <div class="col-lg-12">
                                        <div>
                                            <label for="datepicker-deadline-input" class="form-label">Từ khóa</label>
                                            <select id="select-tags" class="form-control select2_select-tags"
                                                    multiple="multiple" name="tags[]"></select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <label class="form-label" for="google_map">Link google map </label>
                                        <input type="text" id="google_map" class="form-control" value="<?php if(isset($product)): ?><?php echo e($product->map_google_address); ?><?php endif; ?>" name="map_google_address" placeholder="Nhập link url map" required>
                                    </div>
                                    <div class="col-lg-12">
                                        <label class="form-label" for="project-title-input">Mô tả ngắn</label>
                                        <textarea
                                                type="text"
                                                class="form-control"
                                                id="description"
                                                name="description"
                                                placeholder="Nhập mô tả" required
                                        >
                                            <?php if(isset($product)): ?>
                                                <?php echo $product->description; ?>

                                            <?php endif; ?>
                                        </textarea>
                                    </div>
                                    <div class="col-lg-12">
                                        <label class="form-label" for="content">Giới thiệu chi tiết tour</label>
                                        <textarea type="text" class="form-control" id="content" name="content"
                                                  placeholder="Nhập nội dung giới thiệu sản phẩm">
                                        <?php if(isset($product)): ?>
                                                <?php echo $product->content; ?>

                                            <?php endif; ?>
                                    </textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-xl-5">
                                <div class="row mb-3">
                                    <div class="col-12">
                                        <label class="form-label" for="alias">Tiêu đề kế hoạch</label>
                                        <input type="text"
                                               placeholder="Điền tiêu đề kế hoạch"
                                               value="<?php if(isset($product)): ?><?php echo e($product->title_plan); ?><?php endif; ?>"
                                               class="form-control" name="title_plan" required>
                                    </div>
                                </div>
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

                                    <?php if(isset($product)): ?>
                                        <?php $__currentLoopData = $product->tourPlans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $tourPlan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="row border-bottom-dash mt-3" id="row-<?php echo e($key); ?>">
                                                <input type="hidden" name="plans[<?php echo e($key); ?>][id]" value="<?php echo e($tourPlan->id); ?>">
                                                <div class="col-12 col-lg-12">
                                                    <div>
                                                        <label for="name-plan" class="form-label">Tên plan <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control"
                                                               value="<?php echo e($tourPlan->name); ?>" name="plans[<?php echo e($key); ?>][name]"
                                                               placeholder="Nhập tên plan" required>
                                                    </div>
                                                </div>
                                                <div class="col-11 col-lg-11">
                                                    <div>
                                                        <label for="name-plan" class="form-label">Nội dung</label>
                                                        <textarea
                                                                type="text"
                                                                class="form-control"
                                                                id="content_<?php echo e($key); ?>"
                                                                name="plans[<?php echo e($key); ?>][content]"
                                                                placeholder="Nhập mô tả"
                                                        >
                                                            <?php echo $tourPlan->content; ?>

                                                        </textarea>
                                                    </div>
                                                </div>
                                                <div class="col-1 col-sm-1 d-flex justify-content-center align-items-center">
                                                    <div>
                                                        <button type="button" class="btn btn-danger delete-color" data-row="<?php echo e($key); ?>" data-product_color_id="<?php echo e($tourPlan->id); ?>">
                                                            <i class="bi bi-trash"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                        <div class="row border-bottom-dash" id="row-0">
                                            <div class="col-12 col-lg-12">
                                                <div>
                                                    <label for="name-color" class="form-label">Tên plan <span class="text-danger">*</span></label>
                                                    <input type="text" id="name-color" class="form-control"
                                                           value=""
                                                           name="plans[0][name]"
                                                           placeholder="Nhập tên plan" required>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-12 mt-3">
                                                <div class="mb-3 mb-lg-0">
                                                    <label class="form-label" for="content_plan">Nội dung</label>
                                                    <textarea
                                                            type="text"
                                                            class="form-control"
                                                            id="content_plan"
                                                            name="plans[0][content]"
                                                            placeholder="Nhập mô tả"
                                                    >
                                                    </textarea>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane" id="profile1" role="tabpanel">
                        <div class="mb-3">
                            <label class="form-label" for="project-title-input">Meta Title</label>
                            <textarea type="text" class="form-control" id="meta_title" name="meta_title"
                                      placeholder="Nhập mô tả"><?php if(isset($product)): ?>
                                    <?php echo e($product->meta_title); ?>

                                <?php endif; ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="project-title-input">Meta description</label>
                            <textarea type="text" class="form-control" id="meta_description" name="meta_description"
                                      placeholder="Nhập mô tả"><?php if(isset($product)): ?>
                                    <?php echo $product->meta_description; ?>

                                <?php endif; ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="project-title-input">Meta key word</label>
                            <textarea type="text" class="form-control" id="meta_key_word" name="meta_key_word"
                                      placeholder="Nhập mô tả"><?php if(isset($product)): ?>
                                    <?php echo $product->meta_key_word; ?>

                                <?php endif; ?></textarea>
                        </div>
                    </div>
                </div>
            </div><!-- end card-body -->
        </div><!-- end card -->
    </form>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(URL::asset('/assets/js/pages/profile-setting.init.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('/assets/js/app.min.js')); ?>"></script>
    <script src="https://cdn.ckeditor.com/4.5.11/full-all/ckeditor.js"></script>
    <script src="<?php echo e(URL::asset('/assets/js/select2/select2.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('/assets/js/ckeditor/ckeditor.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/js/filepond/filepond-plugin-image-resize.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/libs/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/libs/filepond/filepond.min.js')); ?>"></script>

    <script type="text/javascript">
        const options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=' + document.querySelector('meta[name="csrf-token"]').content,
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token=' + document.querySelector('meta[name="csrf-token"]').content
        };
        $(document).ready(function () {
            CKEDITOR.disableAutoInline = true;
            CKEDITOR.config.versionCheck = false;
            CKEDITOR.config.disableNativeSpellChecker = false;
            CKEDITOR.replace('content', options);
            let isCreate = <?php echo json_encode($isCreate); ?>;
            if (isCreate) {
                CKEDITOR.replace('content_plan', options);
            }
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
            $('.sync-comment').click(function () {
                getPreview({productId: productId}).then((data) => {
                    dataProduct = data
                });
            })

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
                multiple: true,
                placeholder: 'Chọn tiện ích',
                data: <?php echo json_encode($amenitiesAll); ?>

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
        let rowCounter = <?php echo json_encode($rowCounter); ?>;
        $(document).ready(function () {
            for (let i = 0; i < rowCounter; i++) {
                CKEDITOR.replace('content_'+i, options);
            }
            $(document).on('click', '.add-color', function () {
                rowCounter++;
                const uniqueId = `row-${rowCounter}`;
                // Tạo một row mới
                var newRow = `
            <div class="row mt-3 border-bottom-dash" id="${uniqueId}">
                <div class="col-11 col-lg-12">
                    <div>
                        <label for="name-color" class="form-label">Tên plan</label>
                        <input type="text" class="form-control"
                               value="" name="plans[${rowCounter}][name]"
                               placeholder="Nhập tên plan" required>
                    </div>
                </div>
                <div class="col-11 col-lg-11">
                    <div class="mb-3 mt-3 mb-lg-0">
                        <label class="form-label" for="priceText">Nội dung</label>
                        <textarea
                                id="content_${rowCounter}"
                                type="text"
                                class="form-control"
                                name="plans[${rowCounter}][content]"
                                placeholder="Nhập mô tả"
                        >
                        </textarea>
                    </div>
                </div>
                 <div class="col-1 col-sm-1 d-flex justify-content-center align-items-center">
                    <div>
                        <button type="button" class="btn btn-danger delete-color" data-row="${rowCounter}">
                            <i class="bi bi-trash"></i>
                        </button>
                    </div>
                </div>
            </div>`;

                // Thêm row mới vào cuối thẻ div .list-color
                $('.list-color').append(newRow);

                CKEDITOR.replace('content_'+rowCounter, options);
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
                    let currentValue = $('input[name="deleted_product_plan_id"]').val();
                    let idArray = currentValue ? currentValue.split(',') : [];

                    if (!idArray.includes(product_color.toString())) {
                        idArray.push(product_color);
                    }

                    $('input[name="deleted_product_plan_id"]').val(idArray.join(','));
                }
            })

        });
    </script>

    <script>
        FilePond.registerPlugin(FilePondPluginImagePreview);
        //FilePond.create(document.querySelector('input[name="gallery[]"]'), {chunkUploads: true});
        $(document).ready(function () {
            const productId = $('#product_id').val();
            let dataImage = '';
            if (productId.length) {
                getImagesProduct(productId).then((data) => {
                    dataImage = data;
                });


            }
            setTimeout(() => {
                FilePond.create(
                    document.querySelector('input[name="gallery[]"]'),
                    {
                        multiple: true,
                        chunkUploads: true,
                        labelIdle: 'Kéo và thả ảnh của bạn hoặc chọn từ thư mục',
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
                    url: "/api/upload-image/products",
                    headers: {
                        'X-CSRF-TOKEN': "<?php echo e(@csrf_token()); ?>",
                    },
                }
            });
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/thiemdao/Desktop/project/elon-farm/resources/views/admin/product/create.blade.php ENDPATH**/ ?>