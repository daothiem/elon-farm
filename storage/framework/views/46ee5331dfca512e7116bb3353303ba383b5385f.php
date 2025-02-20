<?php $__env->startSection('title'); ?> Quản lý tour <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(URL::asset('assets/libs/dropzone/dropzone.min.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <link href="<?php echo e(URL::asset('/assets/css/select2/select2.min.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="card rounded-3">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h6 class="mb-0">Danh sách tour</h6>
            <a href="/admin/create/tour" class="btn btn-dark waves-effect waves-light w-sm pt-2 pb-2">Thêm mới</a>
        </div>
    </div>
    <div class="mt-2" style="padding: 0 !important;">
        <?php if(session('success')): ?>
            <div class="alert alert-success" style="margin-bottom: 0.2rem !important;">
                <?php echo app('translator')->get(session('success')); ?>
            </div>
        <?php endif; ?>
        <?php if(session('error')): ?>
            <div class="alert alert-danger">
                <?php echo app('translator')->get(session('error')); ?>
            </div>
        <?php endif; ?>
    </div>
    <div class="card mt-2">
        <div class="card-body">
            <form action="/admin/tour" method="get">
                <?php $__currentLoopData = request()->query(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($key != 'name' && $key != 'root_id'): ?>
                        <input type="hidden" name="<?php echo e($key); ?>" value="<?php echo e($value); ?>">
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <div class="form-search row align-items-end">
                    <div class="col-12 col-md-3">
                        <label for="search-name" class="m-0">Tên</label>
                        <input class="form-control" value="<?php if(isset($input['name'])): ?><?php echo e($input['name']); ?><?php endif; ?>" placeholder="Nhập tên tour" name="name" id="search-name"/>
                    </div>
                    <div class="col-4 col-md-2 mt-2">
                        <button type="submit" class="btn btn-primary btn-search"><i class="bx bx-search fs-17"></i>Tìm kiếm</button>
                    </div>
                    <div class="col-3 col-md-4 d-flex align-items-center justify-content-end gap-3">
                        <div>
                            <label for="ordering" class="form-label" style="clear: both; display: inline-block">Sắp xếp thứ tự </label>
                            <select class="form-select select_ordering" name="ordering" id="ordering">
                                <option value="ASC" <?php if((isset($input['ordering']) && $input['ordering'] === 'ASC') || !isset($input['ordering'])): ?> selected <?php endif; ?>>Tăng dần</option>
                                <option value="DESC" <?php if((isset($input['ordering']) && $input['ordering'] === 'DESC')): ?> selected <?php endif; ?>>Giảm dần</option>
                            </select>
                        </div>
                    </div>
                </div>
            </form>
            <div class="table-responsive table-card mt-3 mb-1">
                <table class="table align-middle table-nowrap" id="customerTable">
                    <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th  data-sort="customer_name">Tên sản phẩm</th>
                        <th  data-sort="address">Đường dẫn</th>
                        <th  data-sort="action">Thao tác</th>
                    </tr>
                    </thead>
                    <tbody class="list form-check-all">
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="customer_name"><?php echo e(++$index); ?></td>
                            <td class="customer_name"><?php echo e($item->name); ?></td>
                            <td class="customer_name"><?php echo e($item->alias); ?></td>
                            <td>
                                <div class="d-flex gap-2">
                                    <div class="edit">
                                        <button onclick="window.location='/admin/<?php echo e($item->id); ?>/tour'" class="btn btn-sm btn-success edit-item-btn" >Cập nhật</button>
                                    </div>
                                    <div class="remove">
                                        <button
                                            value="<?php echo e($item->id); ?>"
                                            class="btn btn-sm btn-danger remove-item-btn"
                                        >Xoá</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <div class="noresult" style="<?php if(isset($data) && count($data) === 0): ?> display: grid <?php else: ?> display: none <?php endif; ?>">
                    <div class="text-center">
                        <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                   colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px">
                        </lord-icon>
                        <h5 class="mt-2">Không tìm thấy bản ghi nào.</h5>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-right">
                <?php echo $data->links('pagination::bootstrap-4'); ?>

            </div>
        </div>
    </div>

    <!-- Modal delete -->
    <div class="modal fade zoomIn" id="deleteRecordModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            id="btn-close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="form-delete">
                        <?php echo method_field('delete'); ?>
                        <?php echo csrf_field(); ?>
                        <input type="hidden" id="record_id">
                        <div class="mt-2 text-center">
                            <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                                       colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                            <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-4">
                                <h4>Bạn đã chắc chắn ?</h4>
                                <p class="text-muted mx-4 mb-0">Bạn chắc chắn muốn Xoá bản ghi này?</p>
                            </div>
                        </div>
                        <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                            <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Đóng</button>
                            <button type="button" class="btn w-sm btn-danger " id="delete-record">Xoá</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--end modal delete -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(URL::asset('assets/libs/prismjs/prismjs.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/libs/dropzone/dropzone.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/js/pages/project-create.init.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('/assets/js/app.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/libs/prismjs/prismjs.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/libs/list.pagination.js/list.pagination.js.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('/assets/js/select2/select2.min.js')); ?>"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.5.11/full-all/ckeditor.js"></script>
    <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
    <script src="<?php echo e(URL::asset('backend/assets/js/checkUrl.js')); ?>"></script>
    <script>
        $(document).ready(function () {
            $('.remove-item-btn').click(function (e) {
                e.preventDefault();
                $('#record_id').val($(this).val())
                $('#deleteRecordModal').modal('show');
            });

            $('#delete-record').click(function () {
                const item_id = $('#record_id').val()
                const form = $('#form-delete');
                form.attr('action', '/admin/'+ item_id+'/tour');
                form.submit();
            });
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/thiemdao/Desktop/project/elon-farm/resources/views/admin/product/index.blade.php ENDPATH**/ ?>