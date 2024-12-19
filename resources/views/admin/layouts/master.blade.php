<!doctype html >
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-layout="twocolumn" data-sidebar="light" data-sidebar-size="lg" data-sidebar-image="none">

<head>
    <meta charset="utf-8" />
    <title>@yield('title')| Velzon - Admin & Printing Việt Cường</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Printing Việt Cường admin" name="description" />
    <meta content="dmcmedia" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('assets/images/logo-print.png')}}">
    @include('admin.layouts.head-css')
    <meta name="csrf-token" content="{{ csrf_token() }}">

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

@section('body')
    @include('admin.layouts.body')
@show
    <!-- Begin page -->
    <div id="layout-wrapper">
        @include('admin.layouts.topbar')
        @include('admin.layouts.sidebar')
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    @yield('content')
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
            @include('admin.layouts.footer')
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
                    <form method="POST" action="{{ route('admin.users.changePassword') }}" id="change-password-form">
                        @method('put')
                        @csrf
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
    @include('admin.layouts.vendor-scripts')
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
