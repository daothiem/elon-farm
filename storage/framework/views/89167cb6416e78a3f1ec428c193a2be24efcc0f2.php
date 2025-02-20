<!doctype html >
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" data-layout="twocolumn" data-sidebar="light" data-sidebar-size="lg" data-sidebar-image="none">

<head>
    <meta charset="utf-8" />
    <title><?php echo $__env->yieldContent('title'); ?>| Admin & Elon farm</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Admin & Elon farm" name="description" />
    <meta content="dmcmedia" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo e(URL::asset('assets/frontend/images/logo-light.png')); ?>">
    <?php echo $__env->make('admin.layouts.head-css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <link rel="stylesheet"
          href=
              "https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link rel="stylesheet"
          href=
              "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity=
              "sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
          crossorigin="anonymous">
</head>

<?php $__env->startSection('body'); ?>
    <?php echo $__env->make('admin.layouts.body', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->yieldSection(); ?>
    <!-- Begin page -->
    <div id="layout-wrapper">
        <?php echo $__env->make('admin.layouts.topbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('admin.layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <?php echo $__env->yieldContent('content'); ?>
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
            <?php echo $__env->make('admin.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->

    <!-- Modal delete -->
    <div class="modal fade zoomIn" id="userInfoPopup" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="m-0">Đổi mật khẩu</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            id="btn-close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="<?php echo e(route('admin.users.changePassword')); ?>" id="change-password-form">
                        <?php echo method_field('put'); ?>
                        <?php echo csrf_field(); ?>
                        <div class="d-flex gap-2">
                            <label class="w-50 d-flex flex-column gap-2">
                                Mật khẩu cũ
                                <div class="position-relative">
                                    <input type="password" id="password" class="form-control is-input-password" style="padding-right: 33px !important;" placeholder="Nhập mật khẩu cũ" name="old_password" />
                                    <i class="bi bi-eye-slash togglePassword position-absolute cursor-pointer" style="top: 7px; right: 11px;"></i>
                                </div>

                            </label>
                            <label class="w-50 d-flex flex-column gap-2">
                                Mật khẩu mới
                                <div class="position-relative">
                                    <input type="password" class="form-control is-input-password" style="padding-right: 33px !important;" placeholder="Nhập mật khẩu mới" name="new_password" />
                                    <i class="bi bi-eye-slash togglePassword position-absolute cursor-pointer" style="top: 7px; right: 11px;"></i>
                                </div>

                            </label>
                        </div>
                        <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                            <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Đóng</button>
                            <button type="submit" class="btn w-sm btn-danger " id="reset-record">Cập nhật</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--end modal delete -->
        <!-- JAVASCRIPT -->
    <?php echo $__env->make('admin.layouts.vendor-scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

<script>
    $(document).ready(function () {
        $('.setting-profile').click(function () {
            $('#userInfoPopup').modal('show');
        })
        $('body').delegate('.togglePassword', 'click', function () {
            const element = $(this).parent().find('.is-input-password');
            const type = element.attr('type') === 'password' ? 'text' : 'password';

            element.attr('type', type);
            $(this).toggleClass('bi-eye')
        })
    })
</script>
</html>
<?php /**PATH /Users/thiemdao/Desktop/project/elon-farm/resources/views/admin/layouts/master.blade.php ENDPATH**/ ?>